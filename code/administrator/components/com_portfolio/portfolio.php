<?php
/**
 * @version     $Id$
 * @category    Portfolio
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 JHTML::_('behavior.mootools', false);

 echo KService::get('com://admin/portfolio.dispatcher')->dispatch();