<div class="page-header">
	<h3 class="pull-left">Create New User</h3>
	<a href="/admin/users" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Back</a>
	<div class="clearfix"></div>
</div>
<div class="row">
	<div class="col-xs-12">
		<?=form_open(current_url())?>
			<?=input('username', 'Username')?>
			<?=input('email', 'Email')?>
			<?=input('first_name', 'First Name')?>
			<?=input('last_name', 'Last Name')?>
			<?=input('phone', 'Phone Number')?>
			<?=input('password', 'Password', array('type' => 'password'))?>
			<?=input('password_confirm', 'Confirm Password', array('type' => 'password'))?>
			<?=input('submit', null, array('value' => 'Create User!', 'type' => 'submit', 'class' => 'btn btn-lg btn-default'))?>
		<?=form_close()?>
	</div>
</div>