<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_record extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		
		$this->load->view('/layout/header');
		$this->load->view('/layout/nav');
		
	
	}
	public function index()
	{
		
		//$this->load->view('welcome_message');
		$this->load->model('Mod_Orderlist');
    	$result = $this->Mod_Orderlist->getOrderlist();
    	
    	//
    	$this->load->model('Mod_Customer');
    	$data['result_customerlist'] = $this->Mod_Customer->getCustomerlist();
    	//
    	$this->load->model('Mod_Gastank');
    	$data['result_gastankinfo'] = $this->Mod_Gastank->getGastanklist(1);

		$this->load->view('order_recorder',array('result' => $result));

		$this->load->view('order_recorder_customerinfo',$data);

		$this->load->view('/layout/footer');
	}
	public function detail($record_id){
		$this->load->model('Mod_Orderlist');
		$this->load->model('Mod_Customer');
		$data['order_detail'] = $this->Mod_Orderlist->getOrderRecord($record_id);
		
		foreach ($data['order_detail'] as $key) {
			$phone = $key['phone'];
			break;
		}

		$data['customer_info'] = $this->Mod_Customer->getCustomerPersonInfo($phone);

		$this->load->view('order_recorder_detail',$data);
		
	}
	public function delete_orderlist($list_id){
		$this->load->model('Mod_Orderlist');
		$this->Mod_Orderlist->deleteCustomer($list_id);
		redirect(base_url(""));
	}
	public function createbill(){

		$this->load->model('Mod_Orderlist');
		$this->load->model('Mod_Gastank');

		$gas_barcode_array = $this->input->post('customer_create_gasinfo');
		$phone = $this->input->post('customer_create_phone');
		$last_id = $this->Mod_Orderlist->createBill($phone); // 建立
		$barcode_unique = array_unique($gas_barcode_array);
		if ( count($gas_barcode_array) != count($barcode_unique) ){
    			
			$data =[
				'title' => "名稱重複",
				'subtilte' => "請勿新增重複瓦斯桶",
				'url' => ""
			];
			$this->load->view('/layout/alert',$data);

		}else{

			//逐一新增桶子，若重複編號則取消
			for ($i = 0 ; $i < count($gas_barcode_array);$i++){
				$result = $this->Mod_Orderlist->createBillDetail($last_id,$gas_barcode_array[$i],$phone);
			
			//建立桶子歷史資訊
				$data = [
					'orderlist_id' => $last_id,
					'gastank_barcode' => $gas_barcode_array[$i],
					'customer_phone' => $phone
				];
				$this->Mod_Gastank->createHistory($data);
			}
			
		}
		

		//$result = $this->Mod_Gastank->();
	}
	
	
}
