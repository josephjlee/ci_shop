<?php 
	$this->load->view('header');
	$this->load->view('navbar');
?>
 	<?php echo form_open('Shop/pay');
 	?>  
	<div class="panel panel-success">
		<div class = "panel-heading">
			<h3 class = "panel-title">Fill in YOUR info</h3>
		</div>
		<div class="col col-md-6 col-sm-2 col-xs-1" >

			<label for="Fname">First Name:</label>
			<input type="text" class="form-control" name="fname"/>
			<label for="Lname">Last Name:</label>
			<input type="text" class="form-control" name="lname"/>
			<label for="City">City:</label>
			<input type="text" class="form-control" name="city"/>
			<label for="adres">Address:</label>
			<input type="text" class="form-control" name="adres"/>
			<label for="sum">Total sum:</label>
			<input type="text" class="form-control" name="sum" id="sum">
      
			<div class="cinto"><button type="submit" name="pay" class="btn btn-success btn-xs">PAY</button></div>

		</div>
	</div>
 </form>
<?php 
	$this->load->view('footer');
 ?>