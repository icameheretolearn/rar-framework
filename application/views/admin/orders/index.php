<div class="pull-left">
	<h2>Orders</h2>
</div>
<div class="clearfix"></div>
<hr>
<table class="table">
	<thead>
		<tr>
			<td>ID</td>
			<td>User ID</td>
			<td>IP Address</td>
			<td>Plan ID</td>
			<td>Status</td>
			<td>Last Updated</td>
			<td>Created On</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($orders as $order) { ?>
		<tr>
			<td><?=$order->id?></td>
			<td><?=$order->user_id?></td>
			<td><?=$order->ip_address?></td>
			<td><?=$order->plan_id?></td>
			<td><?=$order->status?></td>
			<td><?=date('F j, Y, g:i a', $order->last_updated)?></td>
			<td><?=date('F j, Y, g:i a', $order->created_on)?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
