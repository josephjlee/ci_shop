<?php 
	$this->load->view('header');
	$this->load->view('navbar');
?>
<h1 class="display-1">Your cart is empty <br/> Choose items to buy!</h1>

	</div>
		<div>
		<?php
			echo '<a href='.site_url('shop/catalog').'>Continue Shopping</a><br>';
		?>
		</div>
		<div>
		<?php
			echo '<a href='.site_url('shop/bought').'>Buy chosen items</a><br>';
		?>
		</div>
	</div>

<?php 
	$this->load->view('footer');
 ?>