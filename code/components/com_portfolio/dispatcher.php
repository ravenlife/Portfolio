<?php
/**
 * @version     $Id: dispatcher.php 51 2011-11-07 12:50:48Z richie $
 * @category    Portfolio
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Component Dispatcher
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 */
class ComPortfolioDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
        	'controller' => 'work',
        ));
        parent::_initialize($config);
    }

    /**
     * Constructor.
     *
     * @param   object  An optional KConfig object with configuration options.
     */
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $view   = $this->getController()->getView();
        $format = $view->getFormat();

        if ($format != 'json') {
            $this->registerCallback('after.render', array($view, 'setDocumentTitle'));
            $this->registerCallback('after.render', array($view, 'setBreadcrumbs'));
            $this->registerCallback('after.render', array($view, 'setCanonical'));
        }
    }
}