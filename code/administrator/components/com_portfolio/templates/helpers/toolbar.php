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
 * Toolbar template helper class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category    Portfolio
 * @package     Helper
 * @subpackage  Select
 */
class ComPortfolioTemplateHelperToolbar extends ComDefaultTemplateHelperToolbar
{   
    /**
     * Render the toolbar title
     * more sucky language string overrides
     * 
     * @param   array   An optional array with configuration options
     * @return  string  Html
     */
    public function title($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'toolbar' => null
        ));
        
        $html = '<div class="header pagetitle icon-48-'.$config->toolbar->getIcon().'">';
        
        if (version_compare(JVERSION,'1.6.0','ge')) {
            $html .= '<h2>'.JText::_(str_replace(' ', '_', $config->toolbar->getTitle())).'</h2>';
        } else {
            $html .= JText::_($config->toolbar->getTitle());
        }
        
        $html .= '</div>';
        
        return $html;
    }

    /**
     * this sucks but we need to override this in order to use correct language strings
     *
     * @param   array   An optional array with configuration options
     * @return  string  Html
     */
    public function command($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'command' => NULL
        ));
        
        $command = $config->command;
        
         //Add a toolbar class
        $command->attribs->class->append(array('toolbar'));
        
        //Create the id
        $id = 'toolbar-'.$command->id;
       
        $command->attribs->class = implode(" ", KConfig::unbox($command->attribs->class));
            
        $html  = '<td class="button" id="'.$id.'">';
        $html .= '  <a '.KHelperArray::toString($command->attribs).'>';
        $html .= '      <span class="'.$command->icon.'" title="'.JText::_($command->title).'"></span>';
        $html .= JText::_('COM_PORTFOLIO_'.$command->label);
        $html .= '   </a>';
        $html .= '</td>';
        
        return $html;
    }
}