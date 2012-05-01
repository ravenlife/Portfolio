<?php
/**
 * @version     $Id: works.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package		Model
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Works Model Class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Model
 */
class ComPortfolioModelWorks extends ComPortfolioModelDefault
{
	/**
     * Constructor
     *
     * @param   object  An optional KConfig object with configuration options
     */
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state->insert('person', 	'int')
                    ->insert('enabled',     'int', JFactory::getApplication()->isSite() ? 1 : null);
    }

    /**
     * Builds a WHERE clause for the query
     */
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {   
        parent::_buildQueryWhere($query);   

        // If we are searching filter the results
        if ( $person = $this->_state->person ) {
            $query->where('tbl.person_id', '=', $person);
        }

        // if enabled/disbabled
        if(is_numeric($this->_state->enabled)) {
            $query->where('tbl.enabled', '=', $this->_state->enabled);
        }
    }   
}