<?php
/**
 * @version     $Id: default.php 19 2011-11-19 01:56:42Z richie $
 * @category    Portfolio
 * @package     Controller
 * @subpackage	Toolbar
 * @copyright   2011 Wintersett Media. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');
 
 /**
 * Default Toolbar class
 *
 * @author      Richie Mortimer <richie@wintersettmeda.co.uk>
 * @category    Portfolio
 * @package     Controller
 * @subpackage	Toolbar
 */
class ComPortfolioControllerToolbarDefault extends ComDefaultControllerToolbarDefault 
{
    /**
     * Set the toolbar's title
     *
     * @param   string  Title
     * @return  KToolbarInterface
     */
    public function setTitle($title)
    {
        $this->_title = 'COM_PORTFOLIO_'.$title;
        return $this;
    }

    public function getCommands()
    {
        $this->addPreferences();

        return parent::getCommands();
    }

    protected function _commandPreferences(KControllerToolbarCommand $command)
    {
        JHTML::_('behavior.modal');
    	$option = $this->getIdentifier()->package;
        $command->append(array(
            'width'   => '640',
            'height'  => '480',
            'href'	  => ''
        ))->append(array(
            'attribs' => array(
                'class' => array('modal'),
                'href'  => 'index.php?option=com_config&view=component&component=com_portfolio&path=&tmpl=component',
                'rel'   => '{handler: \'iframe\', size: {x: '.$command->width.', y: '.$command->height.'}}'
            )
        ));
    }
}