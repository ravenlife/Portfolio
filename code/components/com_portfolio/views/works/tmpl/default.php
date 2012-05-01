<? /** $Id: default.php 48 2011-10-10 16:02:55Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<div id="com-portfolio-works" class="works-page<?= $params->get('pageclass_sfx') ?>">
	<? if ($params->get('show_page_heading', 1)) : ?>
		<h1><?= @escape($title); ?></h1>
	<? endif ?>
	<?= @template('default_list') ?>
</div>