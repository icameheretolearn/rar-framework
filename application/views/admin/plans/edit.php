<div class="page-header">
	<h3 class="pull-left">Edit Plan</h3>
	<a href="<?=base_url('admin/plans')?>" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Back</a>
	<div class="clearfix"></div>
</div>
<div class="row">
	<div class="col-xs-12">
		<?=form_open(current_url())?>
			<?=input('name', 'Name', array('value' => $plan->name))?>
			<?=input('amount', 'Amount', array('value' => as_money_nodec($plan->amount)))?>
			<?=dropdown('interval', 'Interval', array('lumpsum', 'hourly', 'day', 'week', 'month', 'year'), array('value' => $plan->interval))?>
			<?=dropdown('interval_count', 'Interval Count', range(1, 99), array('value' => $plan->interval_count))?>
			<?=input('description', 'Description', array('value' => $plan->description))?>
			<?=textarea('features', 'Features', array('value' => $plan->features, 'height' => '110px'))?>
			<?=textarea('disclaimer', 'Disclaimer', array('value' => $plan->disclaimer, 'height' => '90px'))?>
			<?=input('submit', null, array('value' => 'Save Plan', 'type' => 'submit', 'class' => 'btn btn-lg btn-default'))?>
		<?=form_close()?>
	</div>
</div>