<?php 
	$this->load->view('header');
	$this->load->view('navbar');
 ?>
	<div class="row">
	<?php
		foreach ($info as $info1)
				{
					$gid=$info1['group_id'];	
					break;
				}
		echo anchor("shop/catalog", "Shop");
		echo "=>";
		echo anchor("shop/catalog", "Back to all items");
		echo "=>";
		echo anchor("shop/catalog?gid=".$gid, "Back to your item");
	?>
	</div>
	<div class="row">
		<div class = "col col-md-1 col-sm-1 col-xs-1" style="border: solid 1px #dff0d8; border-radius: 10px; height:100%">
		<?php 
			$par=$_GET['par'];
			$num_menu=1;
			foreach ($picture as $pic_name){
				echo '
				<a href='.site_url('shop/details?id='.$num_menu.'&par='.$par.'').'>
				<img src="../../images/'.$pic_name['path'].'" width="70" height="70" alt="slide" />
				</a><br>
				';
			$num_menu=$num_menu+1;
			$list_pictures[$num_menu]=$pic_name['path'];
			}
		?>
		</div>
		<div class = "col col-md-7 col-sm-10 col-xs-1" style="border: solid 1px #dff0d8; border-radius: 10px; height:100%">
            <?php  
			if(isset($_GET['id'])){
				$id=$_GET['id'];
			}
			else {$id=1;}
    		echo '<img src="../../images/'.$list_pictures[$id+1].'"alt="picture" height="500px" width="700px">';
            ?>
 
        </div>
		<div class = "col col-md-4 col-sm-2 col-xs-1" style="border: solid 1px #dff0d8; border-radius: 10px; height:100%"> 
		   	<?php 
			foreach ($info as $info1)
				{
					echo '<B>'.$info1['product'].'</b><br/>';
					$str=$info1['info'];
					$str=str_replace(";",";<br>",$str);
					echo $str;
					echo '<B>'.$info1['product'].'</b><br/>';
				}
			?>
		</div>
	</div>

<?php 
$this->load->view('footer');
 ?>