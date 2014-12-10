<div class="well">
<h4>Are you sure you want to delete the group '<?=$group->name?>'?</h4>
<?=form_open(current_url())?>
	<div class="control-group">
		<div class="controls">
			<label class="radio"><input type="radio" name="confirm" value="yes" checked="checked"> Yes</label>
			<label class="radio"><input type="radio" name="confirm" value="no"> No</label>
		</div>
	</div>
	<?=form_hidden(array('id' => $group->id))?>
</div>
	<div class="form-actions">
		<?=input('submit', null, array('value' => 'Delete Group', 'type' => 'submit', 'class' => 'btn btn-lg btn-danger'))?>
		<a href="<?=base_url('admin/groups')?>" class="btn">Cancel</a>
	</div>
<?=form_close()?>
