<?php
/**
 * @version     $Id: dashboard.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package	    Controller
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Dashboard Controller class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category    Portfolio
 * @package     Controller
 */
class ComPortfolioControllerDashboard extends ComDefaultControllerResource
{
	/**
  	 * Initializes the default configuration for the object
     *
  	 * Called from {@link __construct()} as a first step of object instantiation.
	 * @return void
	 */
    protected function _initialize(KConfig $config) 
    {	
        $config->append(array(
            'request' => array('layout' => 'default'),
        ));

        parent::_initialize($config);
    }

}