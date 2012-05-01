<? /** $Id: default.php 48 2011-10-10 16:02:55Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<? if (count($works)) : ?>
	<ul class="portfolio-works">
		<? foreach ($works as $work) : ?>
			<li class="portfolio-work">
				<article class="clearfix">
					<h1><?= $work->title ?></h1>
					<? if ($work->icon) : ?>
						<a href="<?= @route('view=work&id='.$work->id) ?>" title="<?= sprintf(@text('COM_PORTFOLIO_MORE_INFO_ABOUT'), $work->title) ?>">
							<img class="work-icon" src="<?= $work->icon ?>" alt="<?= sprintf(@text('COM_PORTFOLIO_ICON_FOR'), $work->title) ?>" />
						</a>
					<? endif ?>
					<div class="work-description">
						<span class="tagline"><?= $work->short_description ?></span>
						<a href="<?= @route('view=work&id='.$work->id) ?>" class="btn primary readmore" title="<?= sprintf(@text('COM_PORTFOLIO_MORE_INFO_ABOUT'), $work->title) ?>"><?= @text('COM_PORTFOLIO_MORE_INFO') ?></a>
					</div>
				</article>
			</li>
		<? endforeach ?>
<? endif ?>