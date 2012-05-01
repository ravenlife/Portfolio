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
 * Grid template helper class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Helper
 * @subpackage	Select
 */
class ComPortfolioTemplateHelperGrid extends KTemplateHelperGrid
{	
	/**
	 * Render an search header
	 * again it sucks - language string
	 *
	 * @param 	array 	An optional array with configuration options
	 * @return	string	Html
	 */
	public function search($config = array())
	{
	    $config = new KConfig($config);
		$config->append(array(
			'search' => null
		));
	    
	    $html = '<input name="search" id="search" value="'.$this->getTemplate()->getView()->escape($config->search).'" />';
        $html .= '<button>'.JText::_('COM_PORTFOLIO_GO').'</button>';
		$html .= '<button onclick="document.getElementById(\'search\').value=\'\';this.form.submit();">'.JText::_('COM_PORTFOLIO_RESET').'</button>';
	
	    return $html;
	}

	/**
	 * Render a sorting header
	 * more language string suckyneess
	 *
	 * @param 	array 	An optional array with configuration options
	 * @return	string	Html
	 */
	public function sort( $config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'title'   	=> '',
			'column'  	=> '',
			'direction' => 'asc',
			'sort'		=> ''
		));


		//Set the title
		if(empty($config->title)) {
			$config->title = ucfirst($config->column);
		}

		//Set the direction
		$direction	= strtolower($config->direction);
		$direction 	= in_array($direction, array('asc', 'desc')) ? $direction : 'asc';

		//Set the class
		$class = '';
		if($config->column == $config->sort)
		{
			$direction = $direction == 'desc' ? 'asc' : 'desc'; // toggle
			$class = 'class="-koowa-'.$direction.'"';
		}

		$url = clone KRequest::url();

		$query 				= $url->getQuery(1);
		$query['sort'] 		= $config->column;
		$query['direction'] = $direction;
		$url->setQuery($query);

		$html  = '<a href="'.$url.'" title="'.JText::_('COM_PORTFOLIO_CLICK_TO_SORT').'"  '.$class.'>';
		$html .= JText::_($config->title);
		$html .= '</a>';

		return $html;
	}

	/**
	 * Render an enable field
	 * sucky language strings
	 *
	 * @param 	array 	An optional array with configuration options
	 * @return	string	Html
	 */
	public function enable($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'row'  		=> null,
		    'field'		=> 'enabled'
		))->append(array(
		    'data'		=> array($config->field => $config->row->{$config->field})
		));

		$img    = $config->row->{$config->field} ? 'enabled.png' : 'disabled.png';
		$alt 	= $config->row->{$config->field} ? JText::_( 'COM_PORTFOLIO_ENABLED' ) : JText::_( 'COM_PORTFOLIO_DISABLED' );
		$text 	= $config->row->{$config->field} ? JText::_( 'COM_PORTFOLIO_DISABLE_ITEM' ) : JText::_( 'COM_PORTFOLIO_ENABLE_ITEM' );
		
	    $config->data->{$config->field} = $config->row->{$config->field} ? 0 : 1;
	    $data = str_replace('"', '&quot;', $config->data);

		$html = '<img src="media://lib_koowa/images/'. $img .'" border="0" alt="'. $alt .'" data-action="edit" data-data="'.$data.'" title='.$text.' />';

		return $html;
	}

	/**
	 * Render an order field
	 * more language string suckyneess
	 *
	 * @param 	array 	An optional array with configuration options
	 * @return	string	Html
	 */
	public function order($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'row'  		=> null,
		    'total'		=> null,
		    'field'		=> 'ordering',
		    'data'		=> array('order' => 0)
		));

		$up   = 'media://lib_koowa/images/arrow_up.png';
		$down = 'media://lib_koowa/images/arrow_down.png';
		
		$config->data->order = -1;
		$updata   = str_replace('"', '&quot;', $config->data);
		
		$config->data->order = +1;
		$downdata = str_replace('"', '&quot;', $config->data);
		
		$html = '';
		
		if ($config->row->{$config->field} > 1) {
            $html .= '<img src="'.$up.'" border="0" alt="'.JText::_('COM_PORTFOLIO_MOVE_UP').'" data-action="edit" data-data="'.$updata.'" />';
        }

        $html .= $config->row->{$config->field};

        if($config->row->{$config->field} != $config->total) {
            $html .= '<img src="'.$down.'" border="0" alt="'.JText::_('COM_PORTFOLIO_MOVE_DOWN').'" data-action="edit" data-data="'.$downdata.'"/>';
	    }

		return $html;
	}
}