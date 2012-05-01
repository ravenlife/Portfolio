<?php
/**
 * @version     $Id: dashboard.php 48 2011-10-10 16:02:55Z richie $
 * @category    Portfolio
 * @package		Controller
 * @copyright   2011 Wintersett. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://wintersettmedia.co.uk
 */
defined('_JEXEC') or die('Restricted access');

 /**
 * Person Controller class
 *
 * @author      Richie Mortimer <richie@wintersettmedia.co.uk>
 * @category	Portfolio
 * @package		Controller
 */
class ComPortfolioControllerPerson extends ComDefaultControllerDefault 
{
    protected function _initialize(KConfig $config) 
    {	
        $config->append(array(
            'request' => array('layout' => 'default'),
        ));

        parent::_initialize($config);
    }

    protected function _actionContact(KCommandContext $context)
    {
        $app        = JFactory::getApplication();
        $failed     = false;

        KRequest::set('session.portfolio.name',     $context->data->name);
        KRequest::set('session.portfolio.email',    $context->data->email);
        KRequest::set('session.portfolio.company',  $context->data->company);
        KRequest::set('session.portfolio.phone',    $context->data->phone);
        KRequest::set('session.portfolio.message',  $context->data->message);

        if (!$context->data->name) {
            $app->enqueueMessage(JText::_('COM_PORTFOLIO_NAME_REQUIRED'));
            return;
        }

        if (!$context->data->email || !$this->getService('koowa:filter.email')->sanitize($context->data->email)) {
            $app->enqueueMessage(JText::_('COM_PORTFOLIO_VALID_EMAIL_REQUIRED'));
            return;
        }

        if (!$context->data->message) {
            $app->enqueueMessage(JText::_('COM_PORTFOLIO_MESSAGE_TEXT_REQUIRED'));
            return;
        }

        $contact    = $this->getModel()->id($context->data->person)->getItem();
        $mailer 	= JFactory::getMailer();
    	$subject 	= sprintf(JText::_('COM_PORTFOLIO_SOMEONE_CONTACTED_YOU_ON'), $app->getCfg('sitename'));
    	$bodytext	= "\n".JText::_('COM_PORTFOLIO_CONTACT_NAME').': '.$context->data->name;
    	$bodytext	.= "\n".JText::_('COM_PORTFOLIO_CONTACT_COMPANY').': '.$context->data->company;
    	$bodytext	.= "\n".JText::_('COM_PORTFOLIO_CONTACT_EMAIL').': '.$context->data->email;
    	$bodytext	.= "\n".JText::_('COM_PORTFOLIO_CONTACT_PHONE').': '.$context->data->phone;
    	$bodytext 	.= "\n".$context->data->message;	

    	$mailer->setSender(array($app->getCfg('mailfrom'), $app->getCfg('fromname')));
        $mailer->setSubject($subject);
        $mailer->setBody($bodytext);
        $mailer->addRecipient($contact->email);
        $mailer->send();

        $this->setRedirect('/');
        KRequest::set('session.portfolio.name',     null);
        KRequest::set('session.portfolio.email',    null);
        KRequest::set('session.portfolio.company',  null);
        KRequest::set('session.portfolio.phone',    null);
        KRequest::set('session.portfolio.message',  null);
        $app->enqueueMessage(sprintf(JText::_('COM_PORTFOLIO_CONTACT_THANKS'), $contact->title));
    }

    /**
     * Overriden read action in order to set a id on the contact form
     */
    protected function _actionRead(KCommandContext $context)
    {
        // if the is the contact layout and we have no id then check to see if we only have one record and use that
        if ($this->getView()->getLayout() == 'contact') {
           if (!$this->getRequest()->id && $this->getModel()->getTotal() == 1) {
                return $this->getModel()->getList()->top();
           }
        }

        return parent::_actionRead($context);
    }
}