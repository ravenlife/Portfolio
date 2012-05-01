<?php
/**
 * @version     $Id: select.php 50 2011-10-12 11:17:59Z richie $
 * @category    Portfolio
 * @package		Helper
 * @subpackage	Select
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Select template helper class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Helper
 * @subpackage	Select
 */
 class ComPortfolioTemplateHelperSelect extends KTemplateHelperSelect
{
	/**
	 * Generates an HTML radio list, Overriding Koowa to remove the <br>
	 *
	 * @param 	array 	An optional array with configuration options
	 * @return	string	Html
	 */
	public function radiolist( $config = array())
	{
		$html = parent::radiolist($config);

		$html = explode(PHP_EOL, $html);
		unset($html[2]);
		unset($html[5]);

		return implode(PHP_EOL, $html);
	}
}