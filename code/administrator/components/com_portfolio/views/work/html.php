<?php
/**
 * @version     $Id: dashboard.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package		View
 * @subpackage  Work
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Work View class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		View
 * @subpackage  Work
 */
class ComPortfolioViewWorkHtml extends ComDefaultViewHtml
{
    /**
     * Return the views output
     *
     * @return string   The output of the view
     */
    public function display()
    {
        $item   = $this->getModel()->getItem();
        $files  = array();
        $images = array();
        
        if (!$item->isNew()) {
            $files  = $this->getService('com://admin/portfolio.model.files')->work($item->id)->getList();
            $images = $this->getService('com://admin/portfolio.model.images')->work($item->id)->getList();
        }
        
        $this->assign('files', $files);
        $this->assign('images', $images);

        return parent::display();
    }
}