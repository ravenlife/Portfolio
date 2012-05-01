<? /** $Id: form.php 51 2011-11-07 12:50:48Z richie $ */ ?>
<? defined('_JEXEC') or die ?>

<?= @helper('behavior.validator') ?>
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://lib_koowa/css/koowa.css" />
<style src="media://com_portfolio/css/admin.css" />
<style src="media://com_portfolio/css/form.css" />

<form action="<?= @route('id='.$work->id) ?>" method="post" class="-koowa-form" enctype="multipart/form-data" id="work-form">
	<div class="col width-50">
		<fieldset class="adminform ninja-form">
		    <legend><?= @text('COM_PORTFOLIO_WORK_DETAILS') ?></legend>        
		        <div class="element">
		            <label class="key" for="title"><?= @text('COM_PORTFOLIO_TITLE') ?></label>
		            <input type="text" name="title" id="title" class="inputbox required value" size="50" value="<?= $work->title ?>"/>
		        </div>
		        <div class="element">
		            <label class="key"><?= @text('COM_PORTFOLIO_PERSON_USER') ?></label>
		            <?= @helper('listbox.people', array(
		            									'name'		=> 'person_id',
			            								'model' 	=> 'people', 
			            								'value' 	=> 'id', 
			            								'text' 		=> 'title', 
			            								'selected' 	=> $work->person_id,
			            								'attribs'	=> array('class' => 'required'),
			            								'filter'	=> array('enabled' => 1),
			            								'prompt'	=> 'COM_PORTFOLIO_SELECT'
			            							)) ?>
		        </div>
		        <div class="element states clearfix">
		            <label class="key"><?= @text('COM_PORTFOLIO_STATE') ?></label>
		            <?= @helper('select.radiolist', array(
		            									'name' => 'enabled',
				            							'list' => array(
					            							(object) array('title' => 'Enabled', 'id' => 1), 
					            							(object) array('title' => 'Disabled', 'id' => 0)
					            						),
					            						'selected' => $work->enabled
				            						)) ?>
		        </div>
		        <div class="element">
		            <label class="key" for="category"><?= @text('COM_PORTFOLIO_CATEGORY') ?></label>
		            <?= @helper('listbox.categories', array(
		            									'name'		=> 'category_id',
			            								'model' 	=> 'categories', 
			            								'value' 	=> 'id', 
			            								'text' 		=> 'title', 
			            								'selected' 	=> $work->category_id,
			            								'attribs'	=> array('class' => 'required'),
			            								'filter'	=> array('enabled' => 1),
			            								'prompt'	=> 'COM_PORTFOLIO_SELECT'
			            							)) ?>
		        </div>
		        <div class="element" >
		        	 <label class="key" for="category"><?= @text('COM_PORTFOLIO_SHORT_DESCRIPTION') ?></label>
	            	<?= @editor(array('row' => $work, 'name' => 'short_description', 'height' => 50, 'buttons' => false, 'options' => array('theme' => 'simple'))) ?>
	            </div>
		</fieldset>
		<fieldset class="adminform ninja-form">
	            <legend><?= @text('COM_PORTFOLIO_DESCRIPTION') ?></legend>
	            <div class="element" style="padding-left: 10px;">
	            	<?= @editor(array('row' => $work, 'height' => 50, 'buttons' => false, 'options' => array('theme' => 'simple'))) ?>
	            </div>
	    </fieldset>
	</div>
	<div class="col width-50">
		<fieldset class="adminform ninja-form">
	        <legend><?= @text('COM_PORTFOLIO_WORK_ICON') ?></legend>
	        <div class="element" style="padding-left: 10px;">
                <input type="file" name="icon" id="icon" class="inputbox value" value="" />
                <? if ($work->icon) : ?>
					<img src="<?= JURI::root().$work->icon ?>" alt="<?= sprintf(JText::_('COM_PORTFOLIO_ICON_FOR'),$work->title) ?>">
	        	<? endif ?>
            </div>
	    </fieldset>
		<fieldset class="adminform ninja-form">
	        <legend><?= @text('COM_PORTFOLIO_WORK_FILES') ?></legend>
			<? if (count($files)) : ?>
				<ul class="work-files">
					<? foreach ($files as $file) : ?>
						<li>
							<a href="<?= JURI::root().$file->directory.$file->filename ?>"><?= $file->filename ?></a>
							<a href="#" class="submitable" rel="{method:'post', url:'<?= @route('view=file&id='.$file->id) ?>', params:{_token:'<?= JUtility::getToken() ?>', action:'delete'}}"><?= @text('COM_PORTFOLIO_REMOVE') ?></a>
						</li>
					<? endforeach ?>
				</ul>
			<? endif ?>
			<input type="file" name="file1" id="file1" class="inputbox value" value="" />
			<input type="file" name="file2" id="file2" class="inputbox value" value="" />
			<input type="file" name="file3" id="file3" class="inputbox value" value="" />
			<input type="file" name="file4" id="file4" class="inputbox value" value="" />
			<input type="file" name="file5" id="file5" class="inputbox value" value="" />
			<input type="file" name="file6" id="file6" class="inputbox value" value="" />
	    </fieldset>
	    <fieldset class="adminform ninja-form">
	        <legend><?= @text('COM_PORTFOLIO_WORK_IMAGES') ?></legend>
	        <? if (count($images)) : ?>
				<ul>
					<? foreach ($images as $image) : ?>
						<li>
							<a href="<?= JURI::root().$image->directory.$image->filename ?>"><?= $image->filename ?></a>
							<a href="#" class="submitable" rel="{method:'post', url:'<?= @route('view=image&id='.$image->id) ?>', params:{_token:'<?= JUtility::getToken() ?>', action:'delete'}}"><?= @text('COM_PORTFOLIO_REMOVE') ?></a>
						</li>
					<? endforeach ?>
				</ul>
			<? endif ?>
			<input type="file" name="image1" id="image1" class="inputbox value" value="" />
			<input type="file" name="image2" id="image2" class="inputbox value" value="" />
			<input type="file" name="image3" id="image3" class="inputbox value" value="" />
			<input type="file" name="image4" id="image4" class="inputbox value" value="" />
			<input type="file" name="image5" id="image5" class="inputbox value" value="" />
			<input type="file" name="image6" id="image6" class="inputbox value" value="" />
	    </fieldset>
	</div>
</form>