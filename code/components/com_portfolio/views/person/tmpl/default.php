<? /** $Id: form.php 51 2011-11-07 12:50:48Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<style src="media://com_portfolio/css/site.css" />

<article id="com-portfolio-person" class="clearfix person-page<?= $params->get('pageclass_sfx') ?>">
	<? if ($params->get('show_page_heading', 1)) : ?>
		<h1>
		<?= @escape($person->title); ?>
		</h1>
	<? endif ?>

	<? if ($person->avatar) : ?>
		<div class="polaroid">
			<a href="<?= @route('view=person&layout=contact&id='.$person->id) ?>" data-label="<?= sprintf(@text('COM_PORTFOLIO_PERSON_POLOROID'),$person->title) ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_CONTACT'), $person->title) ?>">
				<img src="/<?= $person->avatar ?>" alt="<?= sprintf(@text('COM_PORTFOLIO_PERSON_IMAGE'), $person->title) ?>">
			</a>
		</div>
	<? endif ?>
	<div class="about-details">
		<? if ($person->address1 || $person->address2 || $person->city || $person->county || $person->postcode || $person->telephone || $person->mobile) : ?>
			<ol class="contact-details">
				<? if ($person->address1) : ?>
					<li><?= $person->address1 ?></li>
				<? endif ?>
				<? if ($person->address2) : ?>
					<li><?= $person->address2?></li>
				<? endif ?>
				<? if ($person->city) : ?>
					<li><?= $person->city ?></li>
				<? endif ?>
				<? if ($person->county) : ?>
					<li><?= $person->county ?></li>
				<? endif ?>
				<? if ($person->county) : ?>
					<li><?= $person->postcode ?></li>
				<? endif ?>
				<? if ($person->telephone) : ?>
					<li><?= $person->telephone ?></li>
				<? endif ?>
				<? if ($person->mobile) : ?>
					<li><?= $person->mobile ?></li>
				<? endif ?>
			</ol>
		<? endif ?>

		<ul class="social-links">
			<? if ($person->twitter) : ?>
				<li>
					<a class="twitter" href="<?= $person->twitter ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_TWITTER'), $person->title) ?>">
						<?= @text('COM_PORTFOLIO_TWITTER') ?>
					</a>
				</li>
			<? endif ?>
			<? if ($person->facebook) : ?>
				<li>
					<a class="facebook" href="<?= $person->facebook ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_FACEBOOK'), $person->title) ?>">
						<?= @text('COM_PORTFOLIO_FACEBOOK') ?>
					</a>
				</li>
			<? endif ?>
			<? if ($person->youtube) : ?>
				<li>
					<a class="youtube" href="<?= $person->youtube ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_YOUTUBE'), $person->title) ?>">
						<?= @text('COM_PORTFOLIO_YOUTUBE') ?>
					</a>
				</li>
			<? endif ?>
			<? if ($person->website) : ?>
				<li>
					<a class="website" href="<?= $person->website ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_WEBSITE'), $person->title) ?>">
						<?= @text('COM_PORTFOLIO_WEBSITE') ?>
					</a>
				</li>
			<? endif ?>
			<? if ($person->github) : ?>
				<li>
					<a class="github" href="<?= $person->github ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_GITHUB'), $person->title) ?>">
						<?= @text('COM_PORTFOLIO_GITHUB') ?>
					</a>
				</li>
			<? endif ?>
			<li>
				<a href="<?= @route('view=person&layout=portfolio&id='.$person->id) ?>" title="<?= sprintf(@text('COM_PORTFOLIO_PERSON_PORTFOLIO'), $person->title) ?>">
					<?= @text('COM_PORTFOLIO_VIEW_PORTFOLIO') ?>
				</a>
			</li>
		</ul>
	</div>
	<div class="about-bio">
		<?= $person->bio ?>
	</div>
</article>