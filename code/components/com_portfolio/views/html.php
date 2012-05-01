<?php
/**
 * @version     $Id: dashboard.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package     View
 * @subpackage  Work
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Default View class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category    Portfolio
 * @package     View
 * @subpackage  Work
 */
class ComPortfolioViewHtml extends ComDefaultViewHtml
{
	public function display()
	{
		$app = JFactory::getApplication();
        $params = $app->getParams();

		$this->assign('params', $params);
        $this->assign('title', $params->get('page_title') ? $params->get('page_title') : JFactory::getDocument()->getTitle());

		return parent::display();
	}

    /**
     * Adds the view to the breadcrumbs
     */
     public function setBreadcrumbs() 
     {
        if (!KInflector::isPlural($this->getName())) {
            $item       = $this->getModel()->getItem();
            $pathway    = JFactory::getApplication()->getPathWay();
        
            $pathway->addItem($item->title, $this->createRoute('view='.$this->getName().'&id='.$item->id));
        }
     }
     
    /**
    * Sets the document title
    */
    public function setDocumentTitle()
    {
        if (!KInflector::isPlural($this->getName())) {
            $item = $this->getModel()->getItem();

            JFactory::getDocument()->setTitle($item->title);
        }
    }

    /**
     * Set a url as the prefered url for search engines
     * @return void
     */
    public function setCanonical()
    {
        $document = JFactory::getDocument();

        if ($document->getType() != 'raw' && get_class($document) != 'JDocumentRaw') {
            $link = '<link rel="canonical" href="'.$document->getBase().'" />' . "\n";
            $document->addCustomTag($link);
        }
    }
}