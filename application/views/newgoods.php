<?php 
	$this->load->view('header');
	$this->load->view('navbar');
 ?>
 	<div class="row">
<!-- __________________________________________________________________________________  -->
<!-- 		use MULTIPART for pictures uploads 											 -->
<!-- __________________________________________________________________________________  -->
	<?php echo form_open_multipart('shop/newGoods');?>
	<div class = "col col-md-8 col-sm-2 col-xs-1" style="border: solid 1px #dff0d8; border-radius: 10px; height:350px">
	<div class="panel panel-success">
		<div class = "panel-heading">
			<h3 class = "panel-title">Fill in info about the PRODUCT</h3>
		</div>
   
	<div class="col col-md-6 col-sm-2 col-xs-1" >
			<div class="form-group">
			<label for="group_id">Group:</label>
			<select name="group_id" class="form-control">
				<?php  
				foreach ($groups as $gr_name){
				echo '<option value="'.$gr_name['id'].'">'.$gr_name['groupname'].'</option>';				
				}
				?>
			</select>
 			</div>
 			<div class="form-group">
				<label for="product">Item:</label>
				<input type="text" class="form-control" name="product"/>
			</div>
 			<div class="form-group">
				<label for="country">Maker:</label>
				<input type="text" class="form-control" name="country"/>
 			</div>
	</div>
	<div class="col col-md-6 col-sm-2 col-xs-1" >
			<div class="form-group">
				<label for="price">Price:</label>
				<input type="number" class="form-control" name="price"/>
 			</div>
 			<div class="form-group">
 				<label for="info">Info:</label>
 				<textarea name="info" class="form-control">
 				</textarea>
 			</div>
 			<div class="form-group">
				<label for="">Choose main photo for item:</label>
				<br/>
				<input type="file" name="picfile"  accept="image/*" />
			</div>
 			<div class="form-group">
 				<input type="submit" class="btn btn-default" name="add_item" value="Add Item"/>
 				<input type="reset" class="btn btn-default" name="reset" value="Reset"/>
			</div>
	</div>
	</div>
	</div>
	</form>


	<div class="col col-md-4 col-sm-2 col-xs-1" style="border: solid 1px #dff0d8; border-radius: 10px; height:350px">
		<div class="panel panel-success" style="border:none" >
		<div class = "panel-heading">
			<h3 class = "panel-title">Choose photo for PRODUCT</h3>
		</div>
		<?php echo form_open_multipart('shop/newGoods');?>
			<div class="form-group">
			<label for="product_id">Item:</label>
			<select name="product_id" class="form-control">
				<?php  
				foreach ($products as $pr_name){
				echo '<option value="'.$pr_name['id'].'">'.$pr_name['product'].'</option>';				
				}
				?>
			</select>
 			</div>
 			<div class="form-group">
				<label for="">Choose photos for item:</label>
				<br/>
				<input type="file" name="file[]" multiple="multiple" accept="image/*" />
				<br/>
			</div>
 			<div class="form-group">
 				<input type="submit" class="btn btn-default" name="add_image" value="Add Image"/>
 				<input type="reset" class="btn btn-default" name="reset" value="Reset"/>
			</div>	
 		</form>
	</div>
	</div>
</div>
<?php 
	$this->load->view('footer');
 ?>