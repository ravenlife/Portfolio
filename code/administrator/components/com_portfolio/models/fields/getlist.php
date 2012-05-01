<?php
/**
 * @version     $Id: works.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package		Model
 * @subpackage	Filed
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Getlist Model Field Class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Model
 * @subpackage	Field
 */
class JFormFieldGetlist extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 */
	protected $type = 'Getlist';

	/**
	 * Method to get the field input markup for a generic list.
	 * Use the multiple attribute to enable multiselect.
	 *
	 * @return  string  The field input markup.
	 */
	protected function getInput()
	{
		return parent::getInput();
	}

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 *
	 * @since   11.1
	 */
	protected function getOptions()
	{
		// Initialize variables.
		$options = array();

		$list  = KService::get('com://admin/portfolio.model.'.(string)$this->element['model'])->enabled(1)->getList();

		if ($this->element['deselect']) $options[] = JHTML::_('select.option', '', '- '.JText::_($this->element['deselect']).' -');

		foreach ($list as $item)
		{
			// Create a new option from the item
			$options[] = JHTML::_('select.option', $item->id, $item->title);
		}

		return $options;
	}
}
