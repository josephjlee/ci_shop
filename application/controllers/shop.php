<?php 
class Shop extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		//$this->load->view('MenuView');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('file');
		$this->load->model('Shopmodel');

	}

	function index(){
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('footer');
	}

	function catalog(){
		if(isset($_GET['gid'])){
			$group_id=$_GET['gid'];
		}
		else{
			$group_id=1;
		}
		$data['groups']=$this->Shopmodel->getGroup();
		$data['products'] = $this->Shopmodel->getProductsID($group_id);

		$this->load->view('catalogview',$data);
	}

	function newGoods(){
		$submt_pr = $this->input->post('add_item');
		$submt_im = $this->input->post('add_image');
		$data['groups']=$this->Shopmodel->getGroup();
		$data['products']=$this->Shopmodel->getProducts();

		if (!$submt_pr) {
			$this->load->view('newgoods',$data);
		}
		else{
			if(isset($_POST['add_item'])){
			$items['group_id']=$_POST['group_id'];
			$items['product']=trim(htmlspecialchars(($_POST['product'])));
			$items['country']=trim(htmlspecialchars(($_POST['country'])));
			$items['price']=$_POST['price'];
			$items['info']=trim(htmlspecialchars(($_POST['info'])));
			
			$path='./images/';
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|png|jpeg|bmp';
			$this->load->library('upload', $config);
			
			$success=$this->upload->do_upload('picfile');
			$filedata=array('upload_data'=>$this->upload->data());
			$thisfile = $this->upload->data(); 

			$this->Shopmodel->insProducts($items);
			$data['products']=$this->Shopmodel->getProductsID($items['group_id']);
			$this->load->view('newgoods',$data);
			//if(empty($product)) return;
			}
			}
		if ($submt_im) {
			if(isset($_POST['add_image'])){
			$path='./images/';
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|png|jpeg|bmp';
		//	$this->load->library('upload', $config);
		//	$success=$this->upload->do_upload('file');
		//	$filedata=array('upload_data'=>$this->upload->data());
		//	$thisfile = $this->upload->data(); 
			$product_id= $_POST['product_id'];
			$this->Shopmodel->insPictures($product_id);
			}
		}
	}

	function Details(){
		if(isset($_GET['par'])){
			$par1=$_GET['par'];
		}
		else{
			$par1=1;
		}
		$data['picture']=$this->Shopmodel->selPicturesID($par1);
		//getProductsID - select * from Products where group_id=group_id
		//i need select * from Products where product_id=product_id
		$data['info']=$this->Shopmodel->selProductsID($par1);
		$this->load->view('details',$data);
	}

	function cart(){
	// if button ADD_TO_CART is pushed
	$data = array();
	$bought['data'] = '';
		foreach ($_REQUEST as $k=>$v ) {
			if(substr($k,0,9)=='into_cart'){
				$btn_id = substr($k,9);
				$ip = $_SERVER['REMOTE_ADDR'];
				$bought['data'] = $this->Shopmodel->insgetBuyData($btn_id, $ip);
			}
			if(substr($k,0,3)=='del'){
				$btn_id = substr($k,3);
				$ip = $_SERVER['REMOTE_ADDR'];
				$bought['data'] = $this->Shopmodel->delBuyData($btn_id, $ip);
			}
		}
		if ($bought['data']==''){
			$this->load->view('cartview',$bought);
		}
		else{
			$this->load->view('cartview',$bought);
		}
	}

	function cartnavbar(){
	$data = array();
	$bought['data'] = '';
	$ip = $_SERVER['REMOTE_ADDR'];
	$bought['data'] = $this->Shopmodel->getBuyData($ip);
	
		if ($bought['data']==NULL){
			$this->load->view('emptycart');
		}
		else{
			$this->load->view('cartview',$bought);
		}
	}

	function reports(){
	$data = array();		
		$this->load->view('reportview',$data);
	}

	function paybill(){
	$data = array();
		$this->load->view('payview',$data);		
	}

	function pay(){
		$post = $this->input->post();
             
        $order_id = 'coffee_'.rand(10000, 99999);
        require("/libraries/LiqPay.php");
 if (($this->public_key) == NULL) {
		echo "<h1>var public_key is empty, i need to authorize in LiqPay (((</h1>";
		echo '<div class="cinto"><a href='.site_url('shop/catalog').'>Catalog</a><br></div>';

	}
 else{
        $liqpay = new LiqPay($this->public_key, $this->private_key);
        $data['form'] = $liqpay->cnb_form(array(
              'version'        => '3',
              'amount'         => $post['sum'],
              'currency'       => 'USD',
              'description'    => 'Donate polyakov.co.ua',
              'order_id'       => $order_id,
              'language'      => 'ru',
              'type'          => 'donate',
              'result_url'    => 'http://your-web.site/popup-liqpay/payment/success_payment.php'
            ));
 
            //$data['user_email'] = $post['coffee_email'];
            //$data['sum'] = $post['sum'];
            //$this->load->view("site/block_buy_me_coffee.tpl", $data);
        	 echo $data['form'];
	}
	}
}
 ?>