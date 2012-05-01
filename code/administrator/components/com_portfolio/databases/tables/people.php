<?php
/**
 * @version     $Id: works.php 47 2011-10-10 13:09:38Z richie $
 * @category    Portfolio
 * @package		Database
 * @subpackage	Table
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * People table class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @package		Database
 * @subpackage	Table
 */
 class ComPortfolioDatabaseTablePeople extends KDatabaseTableDefault
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