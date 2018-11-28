<?php 		
	$this->load->view('template/header');
?>
<div class="container">
	<div class="well">
		<p><b><?php echo lang('celerodescription'); ?></b></p>
		<p>CELERO offers the following functionalities:</p>

		<p><b>Cleaner Production Allocation: </b>CELERO has a <i>Cleaner Production Allocation tool</i>. This tool will automatically detect and highlight Cleaner Production opportunities for a set of companies.</p>

		<p><b>Industrial Symbiosis Allocation: </b>CELERO has a <i>Industrial Symbiosis Allocation tool</i>. This tool will automatically detect and highlight Industrial Symbiosis opportunities for a set of companies.</p>

		<p><b>Costs-benefits analysis: </b>CELERO compares cost and savings related to Cleaner Production and Industrial Symbiosis scenarios in order to verify the financial profitability of the projects. </p>

	</div>
</div>
<?php
	$this->load->view('template/footer'); 
?>