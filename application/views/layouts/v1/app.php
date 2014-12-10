<?=$this->load->view('layouts/v1/header', $vdata)?>
	<div class="clearfix"></div>
	<div class="flash-container">
		<?=showflashmsg()?>
	</div>
	<?=$yield?>
<?=$this->load->view('layouts/v1/footer', $vdata)?>