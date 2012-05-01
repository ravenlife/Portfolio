<? /** $Id: default.php 48 2011-10-10 16:02:55Z richie $ */ ?>
<? defined('_JEXEC') or die('Restricted access'); ?>

<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_portfolio/css/admin.css" />
<style src="media://lib_koowa/css/koowa.css" />

<form action="<?= @route() ?>" method="get" class="-koowa-grid">
<table class="adminlist">
	<thead>
		<tr>
			<th width="10"></th>
			<th>
				<?= @helper('grid.sort', array('column' => 'title', 'title' => 'COM_PORTFOLIO_TITLE')); ?>
			</th>
			<th width="8%">
				<?= @helper('grid.sort', array('column' => 'category_id', 'title' => 'COM_PORTFOLIO_CATEGORY')); ?>
			</th>
			<th width="8%">
				<?= @helper('grid.sort', array('column' => 'ordering', 'title' => 'COM_PORTFOLIO_ORDERING')); ?>
			</th>
			<th width="8%">
				<?= @helper('grid.sort', array('column' => 'enabled', 'title' => 'COM_PORTFOLIO_ENABLED')); ?>
			</th>
		</tr>
		<tr>
			<td align="center">
				<?=@helper('grid.checkall');?>
			</td>
			<td>
				<?=@helper('grid.search');?>
			</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</thead>
	<tfoot>
           <tr>
                <td colspan="6">
					 <?= @helper('paginator.pagination', array('total' => $total)) ?>
                </td>
			</tr>
	</tfoot>
	<tbody>
	<? foreach ($works as $work) : ?>
		<tr>
			<td align="center">
				<?= @helper('grid.checkbox' , array('row' => $work)); ?>
			</td>
			<td align="left">
				<a href="<?= @route('view=work&id='.$work->id); ?>">
					<?= $work->title ?>
				</a>
			</td>
			<td align="center">
				<?= $work->category ?>
            </td>
			<td align="center">
				<?= @helper('grid.order', array('row' => $work, 'total' => $total)); ?>
            </td>
			<td align="center">
				<?= @helper('grid.enable', array('row' => $work)) ?>
            </td>
		</tr>
	<? endforeach; ?>

	<? if (!count($works)) : ?>
		<tr>
			<td colspan="6" align="center">
				<?= @text('COM_PORTFOLIO_NO_WORK'); ?>
			</td>
		</tr>
	<? endif; ?>	
	</tbody>	
</table>
</form>