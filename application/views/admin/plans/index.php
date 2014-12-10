<div class="page-header">
	<h3 class="pull-left">Plans</h3>
	<a href="<?=base_url('admin/plans/create')?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Create New Plan</a>
	<div class="clearfix"></div>
</div>
<table class="table">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Amount</td>
			<td>Interval</td>
			<td>Description</td>
			<td>Created On</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($plans as $plan) { ?>
		<tr>
			<td><?=$plan->id?></td>
			<td><?=$plan->name?></td>
			<td><?=as_money($plan->amount)?></td>
			<td><?=$plan->interval?></td>
			<td><?=$plan->description?></td>
			<td><?=date('F j, Y', $plan->created_on)?></td>
			<td>
				<a href="<?=base_url('admin/plans/edit/' . $plan->uuid)?>">Edit</a> /
				<a href="<?=base_url('admin/plans/delete/' . $plan->uuid)?>">Delete</a>  
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
