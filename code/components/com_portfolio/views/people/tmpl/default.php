<? /** $Id: form.php 51 2011-11-07 12:50:48Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<style src="media://com_portfolio/css/site.css" />

<div id="com-portfolio-people" class="people-page<?= $params->get('pageclass_sfx') ?>">
	<? if ($params->get('show_page_heading', 1)) : ?>
		<h1><?= @escape($title); ?></h1>
	<? endif ?>
	<? foreach ($people as $person) : ?>
		<article class="person clearfix">
			<h2><?= $person->title ?></h2>
			<? if ($person->avatar) : ?>
				<div class="polaroid">
					<a href="<?= @route('view=person&id='.$person->id) ?>" data-label="<?= sprintf(@text('COM_PORTFOLIO_PERSON_POLOROID'),$person->title) ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_VIEW'), $person->title) ?>">
						<img src="/<?= $person->avatar ?>" alt="<?= sprintf(@text('COM_PORTFOLIO_PERSON_IMAGE'), $person->title) ?>">
					</a>
				</div>
			<? endif ?>
			<div class="person-bio">
				<?= $person->bio ?>
			</div>
			<ul class="actions">
				<li>
					<a class="readmore" href="<?= @route('view=person&id='.$person->id) ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_VIEW'), $person->title) ?>">
						<?= @text('COM_PORTFOLIO_MORE_INFO') ?>
					</a>
				</li>
				<li>
					<a class="readmore" href="<?= @route('view=person&layout=contact&id='.$person->id) ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_CONTACT'), $person->title) ?>">
						<?= @text('COM_PORTFOLIO_CONTACT') ?>
					</a>
				</li>
				<li>
					<a class="readmore" href="<?= @route('view=person&layout=portfolio&id='.$person->id) ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_PORTFOLIO'), $person->title) ?>">
						<?= @text('COM_PORTFOLIO_VIEW_PORTFOLIO') ?>
					</a>
				</li>
			</ul>
		</article>
	<? endforeach ?>
</div>