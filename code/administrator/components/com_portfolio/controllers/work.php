<?php
/**
 * @version     $Id: work.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package		Controller
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Work Controller class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Controller
 */
class ComPortfolioControllerWork extends ComDefaultControllerDefault 
{
	/**
    * Initializes the default configuration for the object
    *
    * @param   object  An optional KConfig object with configuration options.
    * @return void
    */
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
          'behaviors'  =>  array('fileable')
        ));

        parent::_initialize($config);
    }

    /**
     * Constructor
     *
     * @param   object  An optional KConfig object with configuration options
     */
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->registerCallback(array('before.apply', 'before.save'), array($this, 'uploadIcon'));
    }

    /**
     * Upload an icon for a work
     * 
     * @param   KCommandContext A command context object
     * @return  void
     */
    public function uploadIcon(KCommandContext $context)
    {

        $icon = KRequest::get('files.icon', 'raw');

        if (!$icon['name']) return;

        //Prepare MediaHelper
        JLoader::register('MediaHelper', JPATH_ROOT.'/components/com_media/helpers/media.php');

        // is it an image
        if(!MediaHelper::isImage($icon['name'])) {
            JError::raiseWarning(21, sprintf(JText::_("%s failed to upload because it's not an image."), $icon['name']));
            return;
        }

        // are we allowed to upload this filetype
        if(!MediaHelper::canUpload($icon, $error)) {
            JError::raiseWarning(21, sprintf(JText::_("%s failed to upload because %s"), $icon['name'], lcfirst($error)));
            return;
        }

        $slug   = $this->getService('koowa:filter.slug');
        $path   = 'images/com_portfolio/work/'.$slug->sanitize($context->data->title).'/icon/';
        $ext    = JFile::getExt($icon['name']);
        $name   = JFile::makeSafe($slug->sanitize($context->data->title).'.'.$ext);

        JFile::upload($icon['tmp_name'], JPATH_ROOT.'/'.$path.$name);

        $context->data->icon = $path.$name;
    }
}