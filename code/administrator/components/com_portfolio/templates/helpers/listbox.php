<?php
/**
 * @version     $Id: select.php 50 2011-10-12 11:17:59Z richie $
 * @category    Portfolio
 * @package		Helper
 * @subpackage	Select
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Listbox template helper class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Helper
 * @subpackage	Select
 */
class ComPortfolioTemplateHelperListbox extends ComDefaultTemplateHelperListbox 
{
	/**
	 * Generates a select list of joomla users
	 *
	 * @param	array 	An optional array with configuration options
	 * @return	string	Html
	 */
	public function users($config = array())
	{
		$config = new KConfig($config);
        $config->append(array(
            'name'      => 'user_id',
            'attribs'   => array('class' => 'value required'),
            'deselect'  => true
        ));

        $db     = $this->getService('koowa:database.adapter.mysqli');
		$query  = $db->getQuery()->select(array('id AS value', 'name AS text'))
                                 ->from('users')
                                 ->where('block', '=', '0');

       $users = $db->select($query, KDatabase::FETCH_ARRAY_LIST);

       $options = array();

        if ($config->deselect)
            $options[] = $this->option(array('text' => '- '.JText::_('COM_PORTFOLIO_SELECT_USER').' -', 'value' => ''));

        foreach ($users as $user) 
        	$options[] = $this->option(array('text' => $user['text'], 'value' => $user['value']));

      	$config->options = $options;

        return $this->optionlist($config);
	}

    /**
     * Search the mixin method map and call the method or trigger an error
     * 
     * This function check to see if the method exists in the mixing map if not
     * it will call the 'listbox' function. The method name will become the 'name'
     * in the config array.
     * 
     * This can be used to auto-magically create select filters based on the 
     * function name.
     *
     * Overriden as we only want to set the name if we haven't provided one @todo report this
     *
     * @param  string   The function name
     * @param  array    The function arguments
     * @throws BadMethodCallException   If method could not be found
     * @return mixed The result of the function
     */
    public function __call($method, array $arguments)
    {   
        if(!in_array($method, $this->getMethods())) 
        {
            $config = $arguments[0];

            if (!$config['name'])
                $config['name']  = KInflector::singularize(strtolower($method));
            
            return $this->_render($config);
        }
        
        return parent::__call($method, $arguments);
    }
}