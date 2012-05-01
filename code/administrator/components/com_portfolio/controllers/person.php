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
 * Person Controller class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Controller
 */
class ComPortfolioControllerPerson extends ComDefaultControllerDefault 
{
	/**
	 * Constructor
	 *
	 * @param 	object 	An optional KConfig object with configuration options
	 */
	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->registerCallback(array('before.apply', 'before.save'), array($this, 'uploadAvatar'));
	}

	/**
	 * Upload the users avatar
	 * 
	 * @param	KCommandContext	A command context object
	 * @return 	void
	 */
	public function uploadAvatar(KCommandContext $context)
	{

		$avatar = KRequest::get('files.avatar', 'raw');

		if (!$avatar['name']) return;

		//Prepare MediaHelper
		JLoader::register('MediaHelper', JPATH_ROOT.'/components/com_media/helpers/media.php');

		// is it an image
		if(!MediaHelper::isImage($avatar['name'])) {
			JError::raiseWarning(21, sprintf(JText::_("%s failed to upload because it's not an image."), $avatar['name']));
			return;
		}

		// are we allowed to upload this filetype
		if(!MediaHelper::canUpload($avatar, $error)) {
			JError::raiseWarning(21, sprintf(JText::_("%s failed to upload because %s"), $avatar['name'], lcfirst($error)));
			return;
		}

		// @todo put in some max file size checks

		$path 	= 'images/com_portfolio/avatars/'.$context->data->user_id.'/';
		$ext   	= JFile::getExt($avatar['name']);
        $name  	= JFile::makeSafe($this->getService('koowa:filter.slug')->sanitize($context->data->title).'.'.$ext);

        JFile::upload($avatar['tmp_name'], JPATH_ROOT.'/'.$path.$name);

        $context->data->avatar = $path.$name;
	}
}