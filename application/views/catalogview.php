<?php 
	$this->load->view('header');
	$this->load->view('navbar');
?>
	<div class="row">
		<div class = "col col-md-2 col-sm-2 col-xs-1" style="border: solid 1px #dff0d8; border-radius: 10px; height:100%">
		<?php
 			foreach ($groups as $group) {
			echo '<a href='.site_url('shop/catalog?gid='.$group['id'].'>').$group['groupname'].'</a><br><br/>';
			}
		?>
		</div>

		<div class = "col col-md-10 col-sm-2 col-xs-1" style="border: solid 1px #dff0d8; border-radius: 10px; height:100%">
		<?php
		echo form_open('shop/cart');
		$i=0;
		foreach ($products as $prod) {
			$prod_id=$prod['id'];
			$img=base64_encode($prod['img']);
			echo '  <div class="product">
			<div class="ptitle">'	.$prod['product'].	'</div>'.
			'<div class="pphoto"><img src="data:image/jpeg; base64,'.$img.' " height="160px" width="200px" alt="'.$prod['product'].'" /></div>'
			.'<div class="pcountry">Country: '.$prod['country'].'</div>'
			.'<div class="pprice">Price: '.$prod['price'].' $</div>'.
			'<div class="pinfo">';
			echo '<a href='.site_url('shop/details?par='.$prod_id.'').'>Details</a>
			</div>';
			echo '<div class="pinto"><button type="submit" name="into_cart'.$prod_id.'" class="btn btn-success btn-xs">Add to Cart</button></div>';
	?>
		</div>
		<?php 
			$i++;
		} //end foreach
 		?>
 	</form>
</div>

<?php 
	$this->load->view('footer');
 ?>