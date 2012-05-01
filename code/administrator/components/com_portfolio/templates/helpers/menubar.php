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
 * Menubar template helper class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category    Portfolio
 * @package     Helper
 * @subpackage  Select
 */
class ComPortfolioTemplateHelperMenubar extends ComDefaultTemplateHelperMenubar
{
    /**
     * This sucks but we need to override this in order to use correct lanugage strings
     *
     * @param   array   An optional array with configuration options
     * @return  string  Html
     */
    public function command($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
        	'command' => null
        ));
        
        $command = $config->command;
        
        //Add a nolink class if the command is disabled
        if($command->disabled) {
            $command->attribs->class->append(array('nolink'));
        }
        
        if($command->active) {
             $command->attribs->class->append(array('active'));
        }
        
        //Explode the class array
        $command->attribs->class = implode(" ", KConfig::unbox($command->attribs->class));
        
        if ($command->disabled) {
			$html = '<span '.KHelperArray::toString($command->attribs).'>'.$command->label.'</span>';	
		} else {
			$html = '<a href="'.$command->href.'" '.KHelperArray::toString($command->attribs).'>'.$command->label.'</a>';
		}
          
    	return $html;
    }
}