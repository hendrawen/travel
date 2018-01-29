
<?php
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/side_bar');
?>
	  
		    
	<div id="page-wrapper" class="gray-bg dashbard-1">
		<div class="content-main">

		<!--banner-->	
			<div class="banner">

			<h2>
			<a href="<?php echo base_url();?>"><?php echo $judul?></a>
			<i class="fa fa-angle-right"></i>
			<span><?php echo $sub_judul?></span>
			</h2>
			</div>
			<?php $this->load->view($content); ?>
		</div>
	</div>
		<!--//banner-->

		
<?php $this->load->view('template/footer'); ?>
<!---->



	 
		
