<?php
/**
 * @version     $Id: html.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package		View
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Dashboard View Class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		View
 */
class ComPortfolioViewDashboardHtml extends ComDefaultViewHtml
{
	public function display()
	{
		//Set the joomla menu to visible
        KRequest::set('get.hidemainmenu', 0);
		return parent::display();
	}
}