<?=form_open(current_url(), 'class="form-horizontal"')?>
	<?=input('name', 'Name')?>
	<?=input('description', 'Description')?>
	<div class="form-actions">
		<?=input('submit', null, array('value' => 'Create Group!', 'type' => 'submit', 'class' => 'btn btn-lg btn-success'))?>
		<a href="<?=base_url('admin/groups')?>">Cancel</a>
	</div>
<?=form_close()?>
