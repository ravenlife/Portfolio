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
 * Image Controller class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Controller
 */
class ComPortfolioControllerImage extends ComDefaultControllerDefault 
{
	/**
    * Initializes the default configuration for the object
    *
    * @param   object  An optional KConfig object with configuration options.
    * @return void
    */
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
          'behaviors'  =>  array('fileable')
        ));

        parent::_initialize($config);
    }
}