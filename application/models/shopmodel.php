<?php 
	class Shopmodel extends CI_Model{

		function __construct(){
		 parent::__construct();
		}

		function getProducts(){
			$this->db->select('id,product,info');
			$this->db->from('products');
			$res=$this->db->get();
			$products=$res->result_array();
			return $products;
		}

		function getProductsID($group_id){
			$this->db->select('id,product,country,price,info,img');
			$this->db->from('products');
			$this->db->where('group_id ='.$group_id);
			$res=$this->db->get();
		//	$res=$this->db->get_where('products', array('group_id ='=>$group_id));
			$products=$res->result_array();
			return $products;
		}

		function insgetBuyData($product_id, $ip){
			$this->db->select('id,product,price,img');
			$this->db->from('products');
			$this->db->where('id ='.$product_id);
			$res=$this->db->get();
			$items=$res->result_array();
			foreach ($items as $key) {
				$add['ip'] = $ip;
				$add['product'] = $key['product'];
				$add['price'] = $key['price'];
				$add['img'] = $key['img'];
				$this->db->insert('bought',$add);
				break;
			}
			$this->db->select('id,ip,product,price,img');
			$this->db->from('bought');
			$this->db->where('ip ='."'".$ip."'");
			$res=$this->db->get();
			$products=$res->result_array();

			return $products;
		}

		function getBuyData($ip){
			$this->db->select('id,ip,product,price,img');
			$this->db->from('bought');
			$this->db->where('ip ='."'".$ip."'");
			$res=$this->db->get();
			$products=$res->result_array();
			return $products;
		}

		function delBuyData($id, $ip){
			$this->db->where('id ='."'".$id."'");
			$this->db->delete('bought');
			$this->db->select('id,ip,product,price,img');
			$this->db->from('bought');
			$this->db->where('ip ='."'".$ip."'");
			$res=$this->db->get();
			$products=$res->result_array();
			return $products;

		}

		function selProductsID($product_id){
			$this->db->select('id,product,country,price,info, group_id');
			$this->db->from('products');
			$this->db->where('id ='.$product_id);
			$res=$this->db->get();
		//	$res=$this->db->get_where('products', array('group_id ='=>$group_id));
			$products=$res->result_array();
			return $products;
		}

		function getGroup(){
			$res=$this->db->get('groups'); //method get позволяет выполнить запрос select * from имя таблицы надо задать
			$items=$res->result_array();//result_array() ==== $i['price'];;;; result() ==== $i->price
			return $items;		
		}

		function insProducts($items){
			$add['group_id'] = $items['group_id'];
			$add['product'] = $items['product'];
			$add['country'] = $items['country'];
			$add['price'] = $items['price'];
			$add['info'] = $items['info'];
			$add['datein'] = @date('Y/m/d');
	
			$path='./images/';
			$filesize=$_FILES['picfile']['size'];
			$filename=$path.$_FILES['picfile']['name'];
			$file=fopen($filename,'rb');
			$img=fread($file,$filesize);// прочитали файл-картинку
			$add['img'] = $img;
			//$add['size'] = $thisfile['file_size'];
			$this->db->insert('products',$add);
		}

		function selPicturesID($product_id){
			$this->db->select('path');
			$this->db->from('images');
			$this->db->where('product_id ='.$product_id);
			$res=$this->db->get();
			$items=$res->result_array();
			return $items;
		}

		function insPictures($product_id){
			$add['product_id'] = $product_id;
			$files=$_FILES['file']['name'];
			$i=0;
			foreach ($files as $file) {
//if($file!=''){
			//$path='./images/';
			$filename=$_FILES['file']['name'][$i];
			$add['path'] = $filename;
			$this->db->insert('images',$add);
			$i++;
			}
		}
}
 ?>