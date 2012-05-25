<? /** $Id: form.php 51 2011-11-07 12:50:48Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://lib_koowa/css/koowa.css" />
<style src="media://com_portfolio/css/admin.css" />
<style src="media://com_portfolio/css/form.css" />

<form action="<?= @route('id='.$person->id) ?>" method="post" class="-koowa-form" enctype="multipart/form-data" id="person-form">
	<div class="col width-50">
		<fieldset class="adminform ninja-form">
		    <legend><?= @text('COM_PORTFOLIO_PERSON_DETAILS') ?></legend>        
		        <div class="element">
		            <label class="key" for="title"><?= @text('COM_PORTFOLIO_TITLE') ?></label>
		            <input type="text" name="title" id="title" class="inputbox required value" size="50" value="<?= $person->title ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_PERSON_USER') ?></label>
		            <?= @helper('listbox.users', array('selected' => $person->user_id)) ?>
		        </div>
		        <div class="element states clearfix">
		            <label class="key"><?= @text('COM_PORTFOLIO_STATE') ?></label>
		            <?= @helper('select.radiolist', array(
		            									'name' => 'enabled',
				            							'list' => array(
					            							(object) array('title' => 'Enabled', 'id' => 1), 
					            							(object) array('title' => 'Disabled', 'id' => 0)
					            						),
					            						'selected' => $person->enabled
				            						)) ?>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_ADDRESS1') ?></label>
		            <input type="text" name="address1" id="address1" class="inputbox value" size="50" value="<?= $person->address1 ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_ADDRESS2') ?></label>
		            <input type="text" name="address2" id="address2" class="inputbox value" size="50" value="<?= $person->address2 ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_CITY') ?></label>
		            <input type="text" name="city" id="city" class="inputbox value" size="50" value="<?= $person->city ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_COUNTY') ?></label>
		            <input type="text" name="county" id="county" class="inputbox value" size="50" value="<?= $person->county ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_POSTCODE') ?></label>
		           	<input type="text" name="postcode" id="postcode" class="inputbox value" size="50" value="<?= $person->postcode ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_EMAIL') ?></label>
		           	<input type="text" name="email" id="email" class="inputbox value" size="50" value="<?= $person->email ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_TELEPHONE') ?></label>
		           	<input type="text" name="telephone" id="telephone" class="inputbox value" size="50" value="<?= $person->telephone ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_MOBILE') ?></label>
		           	<input type="text" name="mobile" id="mobile" class="inputbox value" size="50" value="<?= $person->mobile ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_WEBSITE') ?></label>
		           	<input type="text" name="website" id="website" class="inputbox value" size="50" value="<?= $person->website ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_TWITTER') ?></label>
		           	<input type="text" name="twitter" id="twitter" class="inputbox value" size="50" value="<?= $person->twitter ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_FACEBOOK') ?></label>
		           	<input type="text" name="facebook" id="facebook" class="inputbox value" size="50" value="<?= $person->facebook ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_YOUTUBE') ?></label>
		           	<input type="text" name="youtube" id="youtube" class="inputbox value" size="50" value="<?= $person->youtube ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_GITHUB') ?></label>
		           	<input type="text" name="github" id="github" class="inputbox value" size="50" value="<?= $person->github ?>"/>
		        </div>
		</fieldset>
	</div>
	<div class="col width-50">
		<fieldset class="adminform ninja-form">
	        <legend><?= @text('COM_PORTFOLIO_PERSON_AVATAR') ?></legend>
	        <div class="element" style="padding-left: 10px;">
                <input type="file" name="avatar" id="avatar" class="inputbox value" value="" />
                <? if ($person->avatar) : ?>
					<img src="<?= JURI::root().$person->avatar ?>" alt="<?= sprintf(JText::_('COM_PORTFOLIO_IMAGE_OF'),$person->title) ?>">
	        	<? endif ?>
            </div>
	    </fieldset>
		<fieldset class="adminform ninja-form">
	            <legend><?= @text('COM_PORTFOLIO_PERSON_BIO') ?></legend>
	            <div class="element" style="padding-left: 10px;">
	            	<?= @editor(array('row' => $person, 'name' => 'bio', 'height' => 50, 'buttons' => false, 'options' => array('theme' => 'simple'))) ?>
	            </div>
	    </fieldset>
	</div>
</form>