<? /** $Id: form.php 51 2011-11-07 12:50:48Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://lib_koowa/css/koowa.css" />
<style src="media://com_portfolio/css/admin.css" />
<style src="media://com_portfolio/css/form.css" />

<form action="<?= @route('id='.$category->id) ?>" method="post" class="-koowa-form" id="category-form">
	<div class="col width-50">
		<fieldset class="adminform ninja-form">
		    <legend><?= @text('COM_PORTFOLIO_CATEGORY_DETAILS') ?></legend>        
		        <div class="element">
		            <label class="key" for="title"><?= @text('COM_PORTFOLIO_TITLE') ?></label>
		            <input type="text" name="title" id="title" class="inputbox required value" size="50" value="<?= $category->title ?>"/>
		        </div>
		        <div class="element states clearfix">
		            <label class="key"><?= @text('COM_PORTFOLIO_STATE') ?></label>
		            <?= @helper('select.radiolist', array(
		            									'name' => 'enabled',
				            							'list' => array(
					            							(object) array('title' => 'Enabled', 'id' => 1), 
					            							(object) array('title' => 'Disabled', 'id' => 0)
					            						),
					            						'selected' => $category->enabled
				            						)) ?>
		        </div>
		</fieldset>
		<fieldset class="adminform ninja-form">
	            <legend><?= @text('COM_PORTFOLIO_DESCRIPTION') ?></legend>
	            <div class="element" style="padding-left: 10px;">
	            	<?= @editor(array('row' => $category, 'height' => 50, 'buttons' => false, 'options' => array('theme' => 'simple'))) ?>
	            </div>
	    </fieldset>
	</div>
</form>