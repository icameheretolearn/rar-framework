<div class="pull-right" style="margin-bottom:15px;">
	<a href="<?=base_url('admin/groups/create')?>" class="btn btn-default"><i class="fa fa-plus"></i> Create New Group</a>
</div>
<div class="clearfix"></div>
<table class="table table-striped table-bordered table-hover datatable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th class="td-actions"></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($groups as $group): ?>
		<tr>
			<td><?=$group->name?></td>
			<td><?=$group->description?></td>
			<td>
				<a href="<?=base_url('admin/groups/edit/'.$group->id)?>"><i class="fa fa-pencil"></i></a>
				<a href="<?=base_url('admin/groups/delete/'.$group->id)?>"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>