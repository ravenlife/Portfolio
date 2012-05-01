<?php
/**
 * @version     $Id: dashboard.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package     Controller
 * @subpackage  Behavior
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Fileable Controller behavior
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category    Portfolio
 * @package     Controller
* @subpackage   Behavior
 */
class ComPortfolioControllerBehaviorFileable extends KControllerBehaviorAbstract 
{
    /**
     * Method for determining what files we wish to delete on delete action
     *
     * @param    KCommandContext     The active command context
     * @return   void
     */
    protected function _beforeDelete(KCommandContext $context)
    {
        $caller = $context->caller->getIdentifier()->name;
        $item   = $this->getModel()->getItem();
 
        // if we are the file controller
        if ($caller == 'file' || $caller == 'image') {
            $this->_delete(array($item));
        } else {
            $files = $this->getService('com://admin/portfolio.model.files')->work($item->id)->getList();
            $this->_delete($files);
            $files->delete();
            $images = $this->getService('com://admin/portfolio.model.images')->work($item->id)->getList();
            $this->_delete($images);
            $images->delete();
        } 
    }

    /**
     * Method for uploading files on apply
     * 
     * @param   KCommandContext A command context object
     * @return  void
     */
    protected function _afterApply(KCommandContext $context)
    {
        $this->_afterSave($context);
    }

    /**
     * Method for uploading files on save
     * 
     * @param   KCommandContext A command context object
     * @return  void
     */
    public function _afterSave(KCommandContext $context)
    {
        //Prepare MediaHelper
        JLoader::register('MediaHelper', JPATH_ROOT.'/components/com_media/helpers/media.php');
        $item = $this->getModel()->getItem();

        KRequest::set('files.icon', null);
        foreach(KRequest::get('files', 'raw') as $key => $file) {
            if ($file['error'] != UPLOAD_ERR_OK || !$file) continue;

            // are we allowed to upload this filetype
            if(!MediaHelper::canUpload($file, $error)) {
                JError::raiseWarning(21, sprintf(JText::_("%s failed to upload because %s"), $file['name'], lcfirst($error)));
                return;
            }

            $slug = $this->getService('koowa:filter.slug');
            $ext  = JFile::getExt($file['name']);
            $name = $slug->sanitize(JFile::stripExt($file['name'])).'-'.time().'.'.$ext;
            $name = JFile::makeSafe($name);

            $path = 'images/com_portfolio/work/'.$slug->sanitize($context->data->title).'/';

            // if this is an image, check we are allowed to upload it
            if (strpos($key, 'image') === false) {
                $path .= 'files/';
                $row   = $this->getService('com://admin/portfolio.database.row.file');
            } else {
                if (!MediaHelper::isImage($file['name'])) {
                    JError::raiseWarning(21, sprintf(JText::_("%s failed to upload because it's not an image."), $file['name']));
                    return;
                }
                $path .= 'images/';
                $row   = $this->getService('com://admin/portfolio.database.row.image');

                $this->generateThumb($file, JPATH_ROOT.'/'.$path.'thumb-'.$name);
            }

            JFile::upload($file['tmp_name'], JPATH_ROOT.'/'.$path.$name);

            $row->setData(array('directory' => $path, 'filename' => $name, 'work_id' => $item->id))->save();
        }
    }


    /**
     * Method for deleting from the filesystem
     */
    protected function _delete($files)
    {
        foreach ($files as $file) 
        {
            $path = JPATH_ROOT.'/'.$file->directory.$file->filename;
            if ($file->directory && $file->filename && JFile::exists($path)) {
                if (JFile::delete($path)) JFactory::getApplication()->enqueueMessage( sprintf(JText::_('%s deleted from the filesystem'), $file->filename) );
            }

            //if this is an image check for a thumbnail too
            if ($file->getTable()->getName() == 'portfolio_images') {
                $path = JPATH_ROOT.'/'.$file->directory.'thumb-'.$file->filename;
                if ($file->directory && $file->filename && JFile::exists($path)) {
                    if (JFile::delete($path)) JFactory::getApplication()->enqueueMessage( sprintf(JText::_('%s deleted from the filesystem'), 'thumb-'.$file->filename) );
                }
            }
        }
    }


    /**
     * A fairly basic method for generating an image thumbnail
     * Note: the image is name is appeded with thumb- in order to differenciate when we display it
     *
     * Edited version of Salman Arshad's method
     * @author  Salman Arshad <http://911-need-code-help.blogspot.co.uk/2008/10/resize-images-using-phpgd-library.html>
     */
    public function generateThumb($image, $path)
    {
        // get our image dimentions
        list($width, $height, $type ) = getimagesize($image['tmp_name']);

        // determine the image create method
        switch ($type)
        {
            case IMAGETYPE_GIF:
                $create = 'imagecreatefromgif';
            break;

            case IMAGETYPE_JPEG:
                $create = 'imagecreatefromjpeg';
            break;

            case IMAGETYPE_PNG:
                $create = 'imagecreatefrompng';
            break;
        }

        // determine the image save method
        switch (JFile::getExt($image['name']))
        {
            case 'jpg':
            case 'jpeg':
                $save = 'imagejpeg';
            break;
            case 'gif':
                $save = 'imagegif';
            break;
            case 'png':
                $save = 'imagepng';
            break;
        }

        // if we have no create method or it doesnt exist throw an error
        if (empty($create) || !function_exists($create))
            throw new KException('Image type "'.$image['type'].'" not allowed as the required function is missing.');

        // if we have no save method or it doesnt exist throw an error
        if (empty($save) || !function_exists($save))
            throw new KException('image type not allowed');

        // create the image
        $image          = $create($image['tmp_name']);
        $thumb_width    = '128px';
        $thumb_height   = '128px';
        $source_ratio   = $width / $height; 
        $thumb_ratio    = $thumb_width / $thumb_height; 

        // determine  the new size of the thumbnail
        if ($source_ratio > $thumb_ratio) {
            $temp_width     = (int)($height * $thumb_ratio); 
            $temp_height    = $height; 
            $source_x       = (int)(($width - $temp_width) / 2); 
            $source_y       = 0; 
        } else {
            $temp_width     = $width; 
            $temp_height    = (int)($width / $thumb_ratio); 
            $source_x       = 0; 
            $source_y       = (int)(($height - $temp_height) / 2); 
        } 

        $thumb_x          = 0; 
        $thumb_y          = 0; 
        $width           = $temp_width; 
        $height          = $temp_height;

        // create the thumbnail, crop and resize it
        $thumb = imagecreatetruecolor($thumb_width, $thumb_height); 
        imagecopyresampled($thumb, $image, $thumb_x, $thumb_y, $source_x, $source_y, $thumb_width, $thumb_height, $width, $height);

        // save the thumbnail
        $save($thumb, $path);

        imagedestroy($image);
        imagedestroy($thumb);
    }
}