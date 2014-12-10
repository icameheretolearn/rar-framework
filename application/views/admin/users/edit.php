<div class="page-header">
	<h3 class="pull-left">Edit User</h3>
	<a href="/admin/users" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Back</a>
	<div class="clearfix"></div>
</div>
<div class="row">
	<div class="col-xs-12">
		<?=form_open(current_url())?>
			<?=input('username', 'Username', array('value' => $user->username))?>
			<?=input('email', 'Email', array('value' => $user->email))?>
			<?=input('first_name', 'First Name', array('value' => $user->first_name))?>
			<?=input('last_name', 'Last Name', array('value' => $user->last_name))?>
			<?=input('phone', 'Phone Number', array('value' => $user->phone))?>
			<?=input('password', 'Password', array('type' => 'password'))?>
			<?=input('password_confirm', 'Confirm Password', array('type' => 'password'))?>
			<?=input('submit', null, array('value' => 'Save User', 'type' => 'submit', 'class' => 'btn btn-lg btn-default'))?>
		<?=form_close()?>
	</div>
</div>