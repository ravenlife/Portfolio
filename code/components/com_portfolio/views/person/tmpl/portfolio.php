<? /** $Id: default.php 48 2011-10-10 16:02:55Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_portfolio/css/site.css" />

<? if ($params->get('show_page_heading', 1)) : ?>
	<h1>
		<?= sprintf(@text('COM_PORTFOLIO_PERSONS_PORTFOLIO'), $person->title); ?>
	</h1>
<? endif ?>

<div class="portfolio-page<?= $params->get('pageclass_sfx') ?>">
	<?= @template('com://site/portfolio.view.works.default.list') ?>
</div>