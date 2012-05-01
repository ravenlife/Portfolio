<?php
/**
 * @version     $Id: select.php 50 2011-10-12 11:17:59Z richie $
 * @category    Portfolio
 * @package     Helper
 * @subpackage  Select
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Paginator template helper class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category    Portfolio
 * @package     Helper
 * @subpackage  Select
 */
class ComPortfolioTemplateHelperPaginator extends ComDefaultTemplateHelperPaginator
{
    /**
     * this sucks but again we need the correct language strings
     * 
     * @param   array   An optional array with configuration options
     * @return  string  Html
     * @see     http://developer.yahoo.com/ypatterns/navigation/pagination/
     */
    public function pagination($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'total'      => 0,
            'display'    => 4,
            'offset'     => 0,
            'limit'      => 0,
            'show_limit' => true,
		    'show_count' => true
        ));
        
        $this->_initialize($config);
        
        $html   = '<div class="container">';
        $html  .= '<div class="pagination">';
        if($config->show_limit) {
            $html .= '<div class="limit">'.JText::_('COM_PORTFOLIO_DISPLAY_NUM').' '.$this->limit($config).'</div>';
        }
        $html .=  $this->_pages($this->_items($config));
        if($config->show_count) {
            $html .= '<div class="limit"> '.JText::_('COM_PORTFOLIO_PAGE').' '.$config->current.' '.JText::_('COM_PORTFOLIO_OF').' '.$config->count.'</div>';
        }
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }
    
    /**
     * this sucks but again we need the correct language strings
     *
     * @param   araay   An array of page data
     * @return  string  Html
     */
    protected function _pages($pages)
    {
        $class = $pages['first']->active ? '' : 'off';
        $html  = '<div class="button2-right '.$class.'"><div class="start">'.$this->_link($pages['first'], 'COM_PORTFOLIO_FIRST').'</div></div>';
        
        $class = $pages['previous']->active ? '' : 'off';
        $html  .= '<div class="button2-right '.$class.'"><div class="prev">'.$this->_link($pages['previous'], 'COM_PORTFOLIO_PREV').'</div></div>';
        
        $html  .= '<div class="button2-left"><div class="page">';
        foreach($pages['pages'] as $page) {
            $html .= $this->_link($page, $page->page);
        }
        $html .= '</div></div>';
        
        $class = $pages['next']->active ? '' : 'off';
        $html  .= '<div class="button2-left '.$class.'"><div class="next">'.$this->_link($pages['next'], 'COM_PORTFOLIO_NEXT').'</div></div>';
        
        $class = $pages['last']->active ? '' : 'off';
        $html  .= '<div class="button2-left '.$class.'"><div class="end">'.$this->_link($pages['last'], 'COM_PORTFOLIO_LAST').'</div></div>';

        return $html;
    }
}