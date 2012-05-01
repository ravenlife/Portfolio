<? /** $Id: default.php 48 2011-10-10 16:02:55Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<?= @helper('behavior.modal') ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_portfolio/css/site.css" />

<article id="com-portfolio-work" class="clearfix person-page<?= $params->get('pageclass_sfx') ?>">
	<? if ($params->get('show_page_heading', 1)) : ?>
		<h1>
			<?= $work->title ?>
		</h1>
	<? endif ?>
	<? if ($work->icon) : ?>
		<img class="work-icon" src="<?= $work->icon ?>" alt="<?= sprintf(@text('COM_PORTFOLIO_ICON_FOR'), $work->title) ?>" />
	<? endif ?>
	<? foreach ($images as $image) : ?>
		<a class="modal" href="<?= $image->directory.$image->filename ?>">
			<img class="work-icon" src="<?= $image->directory.'thumb-'.$image->filename ?>" alt="<?= @text('COM_PORTFOLIO_SCRENSHOT') ?>"/>
		</a>
	<? endforeach ?>
	<?= $work->description ?>
</article>
