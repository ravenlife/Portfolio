<?php
/**
 * @version     $Id: router.php 51 2011-11-07 12:50:48Z richie $
 * @category    Portfolio
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
 defined('_JEXEC') or die('Restricted access');

function PortfolioBuildRoute(&$query)
{
	$segments = array();

	// Get any id whatsovever	
	if (!isset($query['Itemid'])) {
		$item = JSite::getMenu()->getItems('component', 'com_portfolio', true);
		$query['Itemid'] = $item->id;
	}

	if(array_key_exists('view', $query))
	{
		$view = $query['view'];

		if ($query['view'] != 'work') $segments[] = $query['view'];

		if(array_key_exists('id', $query)){
			$model = KService::get('com://admin/portfolio.model.'.KInflector::pluralize($view));
        	$item  = $model->id($query['id'])->getItem()->getData();
			$segments[] = $item['slug'];
			unset( $query['id'] );
		}

		unset( $query['view'] );
	}

	return $segments;
}

function PortfolioParseRoute($segments)
{
    $vars['view'] 	= $segments[0] ? $segments[0] : 'work';

     switch ($vars['view']) {
            case 'person':
                if (isset($segments[1])) $vars['id'] = $segments[1];
                break;
            case 'works':
            case 'people' :
            	break;
            default:
            	$slug       	= $segments[0];
   				$slug       	= implode('-', explode(':', $slug));
   				$vars['view']	= 'work';
				$vars['id']		= KService::get('com://admin/portfolio.model.'.KInflector::pluralize($vars['view']))->slug($slug)->getItem()->id;
	}

	return $vars;
}
