<?php 
	$this->load->view('header');
	$this->load->view('navbar');
?>
<div class="row">
	<div class = "col col-md-12 col-sm-2 col-xs-1" style="border: solid 1px #dff0d8; border-radius: 10px; ">

<table class="table table-striped">
<tr>
  	<thead>
		<th>Item Description</th>
		<th>Item Pic</th>
		<th style="text-align:right">Item Price</th>
		<th style="text-align:center">Delete</th>
	<thead/>
</tr>
<?php 
	$i = 1;
	$total=0;
	foreach ($data as $bought) {
			$img=base64_encode($bought['img']);
			echo form_open('shop/cart');
			echo '<tr>';
			echo '<td>'.$bought['product'].'</td>';
			echo '<td>'.'<img src="data:image/jpeg; base64,'.$img.' " height="48px" width="60px" alt="'.$bought['product'].'" />'.'</td>';
			echo '<td style="text-align:right">$'.$bought['price'].'</td>';
			$prod_id=$bought['id'];
			echo '<td style="text-align:center"><button type="submit" name="del'.$prod_id.'" class="btn btn-success btn-xs">X</button></td>';
	?>
		</div>
<?php
			echo '</tr>';
			$total+=$bought['price'];
			$i+=1;
	}
?>

<tr>
  <td></td>
  <th style="text-align:right">Total</th>
  <th style="text-align:right">$<?php echo $total; ?></th>
</tr>

</table>

	</div>
		<div>
		<?php
			echo '<div class="cinto"><a href='.site_url('shop/catalog').'>Continue Shopping</a><br></div>';
		?>
		</div>
		<div>
		<?php
			echo '<div class="cinto"><a href='.site_url('shop/paybill').'>Buy chosen items</a><br></div>';
		?>
		</div>
	</div>
	<br/>
<?php 
	$this->load->view('footer');
 ?>