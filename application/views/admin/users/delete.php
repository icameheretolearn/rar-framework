<div class="page-header">
	<h3 class="pull-left">Delete User</h3>
	<a href="<?=base_url('admin/users')?>" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Back</a>
	<div class="clearfix"></div>
</div>
<div class="row">
	<div class="col-xs-12">
		<?=form_open(current_url())?>
			<h3>Are you sure you wish to delete this plan (<?=$user->email?>) ?</h3>
			<div class="control-group">
				<div class="controls" style="margin-left: 20px;">
					<label class="radio"><input type="radio" name="confirm" value="yes" checked="checked"> Yes</label>
					<label class="radio"><input type="radio" name="confirm" value="no"> No</label>
				</div>
			</div>
			<?=form_hidden(array('uuid' => $user->uuid))?>
			<div class="gap gap-sm"></div>
			<?=input('submit', null, array('value' => 'Delete User', 'type' => 'submit', 'class' => 'btn btn-lg btn-danger'))?>
		<?=form_close()?>
	</div>
</div>