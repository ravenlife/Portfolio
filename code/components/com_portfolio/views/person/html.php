<?php
/**
 * @version     $Id: dashboard.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package     View
 * @subpackage  Work
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Person View class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category    Portfolio
 * @package     View
 * @subpackage  Work
 */
class ComPortfolioViewPersonHtml extends ComPortfolioViewHtml
{
	public function display()
	{
        $item = $this->getModel()->getItem();
        $this->assign('works', $this->getService('com://admin/portfolio.model.works')->person($item->id)->getList());

		return parent::display();
	}
}