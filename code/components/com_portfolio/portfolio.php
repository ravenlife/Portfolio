<?php
/**
 * @version     $Id: portfolio.php 51 2011-11-07 12:50:48Z richie $
 * @category    Portfolio
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

KLoader::loadIdentifier('com://site/portfolio.mappings');

JHtml::_('behavior.mootools');

echo KService::get('com://site/portfolio.dispatcher')->dispatch();