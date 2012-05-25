<? /** $Id: default.php 48 2011-10-10 16:02:55Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.tooltip'); ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_portfolio/css/site.css" />

<article id="com-portfolio-contact">
		<h1><?= sprintf(@text('COM_PORTFOLIO_PERSON_CONTACT'), $person->title) ?></h1>
		<form action="<?= @route() ?>" method="post" class="-koowa-form contact-form clearfix">
			<? if ($person === false && $params->get('contact-fallback', 1) == 2) : ?>
				<div class="contact-element">
					<label for="name"><?= @text('COM_PORTFOLIO_CONTACT') ?>*</label>
					<?= @helper('listbox.people', array(
											'name'		=> 'person',
		    								'model' 	=> 'people', 
		    								'value' 	=> 'id', 
		    								'text' 		=> 'title',
		    								'attribs'	=> array('class' => 'required'),
		    								'filter'	=> array('enabled' => 1)
		    							)) ?>
		    	</div>
			<? else : ?>
				<input type="hidden" name="person" value="<?= $person->id ?>">
			<? endif ?>
			<div class="element">
				<label for="name"><?= @text('COM_PORTFOLIO_NAME') ?>*</label>
				<input type="text" size="50" id="name" name="name" tabindex="1" autofocus value="<?= KRequest::get('session.portfolio.name', 'string') ?>">
			</div>

			<div class="element">
				<label for="company"><?= @text('COM_PORTFOLIO_COMPANY_NAME') ?></label>
				<input type="text" size="50" id="company" name="company" tabindex="2" value="<?= KRequest::get('session.portfolio.company', 'string') ?>">
			</div>
			<div class="element">
				<label for="email"><?= @text('COM_PORTFOLIO_EMAIL') ?>*</label>
				<input type="text" size="50" id="email" name="email" placeholder="me@example.com" tabindex="3" value="<?= KRequest::get('session.portfolio.email', 'string') ?>">
			</div>

			<div class="element">
				<label for="phone"><?= @text('COM_PORTFOLIO_PHONE') ?></label>
				<input type="text" size="50" id="phone" name="phone" tabindex="4" value="<?= KRequest::get('session.portfolio.phone', 'string') ?>">
			</div>

			<div class="element contact-message">
				<label for="message"><?= @text('COM_PORTFOLIO_MESSAGE') ?>*</label>
				<textarea rows="6" id="message" name="message" tabindex="5"><?= KRequest::get('session.portfolio.message', 'string') ?></textarea>
			</div>
			<input type="submit" name="submit" class="btn primary" value="Send">
			<input type="hidden" name="action" value="contact">
		</form>
</article>