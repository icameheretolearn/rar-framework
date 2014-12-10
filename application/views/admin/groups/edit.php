<?=form_open(current_url(), 'class="form-horizontal"')?>
	<?=input('name', 'Name', array('value' => $group->name))?>
	<?=input('description', 'Description', array('value' => $group->description))?>
	<div class="form-actions">
		<?=input('submit', null, array('value' => 'Save Group', 'type' => 'submit', 'class' => 'btn btn-lg btn-success'))?>
		<a href="<?=base_url('admin/groups')?>">Cancel</a>
	</div>
<?=form_close()?>
