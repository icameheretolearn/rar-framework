<div class="page-header">
	<h3 class="pull-left">Users</h3>
	<a href="/admin/users/create" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Create New User</a>
	<div class="clearfix"></div>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<td>ID</td>
			<td>Username</td>
			<td>Email</td>
			<td>Name</td>
			<td>Created On</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $user) { ?>
		<tr>
			<td><?=$user->id?></td>
			<td><?=$user->username?></td>
			<td><?=$user->email?></td>
			<td><?=$user->first_name?> <?=$user->last_name?></td>
			<td><?=date('Y-m-d', $user->created_on)?></td>
			<td>
				<a href="/admin/users/edit/<?=$user->uuid?>">Edit</a> / 
				<a href="/admin/users/delete/<?=$user->uuid?>">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
