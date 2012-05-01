<?php
/**
 * @version     $Id: categories.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package		Database
 * @subpackage	Table
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Categories table class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @package		Database
 * @subpackage	Table
 */
 class ComPortfolioDatabaseTableCategories extends KDatabaseTableDefault
{
	protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
            	'creatable', 'modifiable', 'lockable', 'orderable', 'sluggable' 
            )
        ));

        parent::_initialize($config);
    }
}