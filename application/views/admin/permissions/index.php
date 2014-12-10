<?=form_open(current_url(), 'class="form-vertical"')?>
	<?php foreach($controllers_group as $key_group => $controllers): ?>
	<div class="well well-sm permissions-well">
		<h3><?=ucfirst(($key_group == 'controllers') ? 'Base' : $key_group)?> Controllers</h3>
		<hr>
		<table class="table">
			<thead>
				<tr>
					<th class="span2">Group</th>
					<?php foreach ($controllers as $class_slug => $class_name): ?>
					<th style="text-align: center;"><?=$class_name?></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($groups as $group): ?>
				<tr>
					<td class="span2"><?=$group->description?></td>
					<?php foreach ($controllers as $class_slug => $class_name): ?>
					<td style="text-align: center;">
						<input type="checkbox" name="permissions[<?=$group->name?>][<?=$class_slug?>]" value="1" <?=(isset($group->permissions->$class_slug)) ? 'checked="checked"' : ''?>>
					</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php endforeach; ?>

	<div class="form-actions">
		<button type="submit" class="btn btn-lg btn-default"><i class="fa fa-save"></i> Save Permissions</button>
	</div>
<?=form_close()?>
