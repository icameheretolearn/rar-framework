<div class="page-header">
	<h3 class="pull-left">Create New Plan</h3>
	<a href="<?=base_url('admin/plans')?>" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Back</a>
	<div class="clearfix"></div>
</div>
<div class="row">
	<div class="col-xs-12">
		<?=form_open(current_url())?>
			<?=input('name', 'Name')?>
			<?=input('amount', 'Amount')?>
			<?=dropdown('interval', 'Interval', array('lumpsum', 'hourly', 'day', 'week', 'month', 'year'))?>
			<?=dropdown('interval_count', 'Interval Count', range(1, 99))?>
			<?=input('description', 'Description')?>
			<?=textarea('features', 'Features', array('height' => '110px'))?>
			<?=textarea('disclaimer', 'Disclaimer', array('height' => '90px'))?>
			<?=input('submit', null, array('value' => 'Create Plan', 'type' => 'submit', 'class' => 'btn btn-lg btn-default'))?>
		<?=form_close()?>
	</div>
</div>