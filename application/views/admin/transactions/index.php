<div class="pull-left">
	<h2>Transactions</h2>
</div>
<div class="clearfix"></div>
<hr>
<table class="table">
	<thead>
		<tr>
			<td>ID</td>
			<td>Type</td>
			<td>Amount</td>
			<td>Status</td>
			<td>Created On</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($transactions as $transaction) { ?>
		<tr>
			<td><?=$transaction->id?></td>
			<td><?=ucwords(str_replace('_', ' ', $transaction->type))?></td>
			<td><?=as_money($transaction->amount)?></td>
			<td><?=$transaction->status?></td>
			<td><?=date('Y-m-d', $transaction->created_on)?></td>
			<td>
				None
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
