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
 * Default Model Class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Model
 */
class ComPortfolioModelDefault extends ComDefaultModelDefault 
{
	/**
     * Constructor
     *
     * @param   object  An optional KConfig object with configuration options
     */
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state->insert('enabled', 	'int')
        			 ->insert('work', 		'int')
        			 ->insert('person', 	'int');
    }

	/**
	 * Builds a WHERE clause for the query
	 */
	protected function _buildQueryWhere(KDatabaseQuery $query)
	{	
		parent::_buildQueryWhere($query);	

		// If we are searching filter the results
		if ( $search = $this->_state->search ) {
			$query->where('tbl.title', 'LIKE', '%'.$search.'%');
		}

		// if enabled/disbabled
		if(is_numeric($this->_state->enabled)) {
            $query->where('tbl.enabled', '=', $this->_state->enabled);
        }

        // filter by work_id
		if ( $work = $this->_state->work ) {
			$query->where('tbl.work_id', '=', $work);
		}
	}	
}