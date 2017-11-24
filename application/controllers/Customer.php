<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->view('/layout/header');
		$this->load->view('/layout/nav');
		
		
	}

	
	public function index()
	{
		
		
		$this->load->model('Mod_Customer');
    	$result = $this->Mod_Customer->getCustomerlist();
		$this->load->view('customerlist',array('result' => $result));
		$this->load->view('/layout/footer');
	}
	
	public function info($phone){
		//$Maintitle = $phone;
		$result = 0;
		$this->load->model('Mod_Customer');
		$result = $this->Mod_Customer->getCustomerInformation($phone);
		
		$this->load->view('customer_recorder',array('result' => $result));
		$this->load->view('/layout/footer');
	}
	public function phone_search(){
		$phone = $this->input->post('customer_search');
		//echo $phone;
		//base_url('customer/info/'.$phone);
		
		$this->info($phone);
		//info($phone);
	}
	public function create_customer(){
		$name = $this->input->post('create_name');
		$phone = $this->input->post('create_phone');
		$address = $this->input->post('create_address');
		$comment = $this->input->post('create_comment');
		$data = [
			'name' => $name,
			'phone'=> $phone,
			'address' => $address,
			'comment' => $comment
		];
		$this->load->model('Mod_Customer');
		$result = $this->Mod_Customer->createCustomer($data);
		redirect(base_url("customer/"));
	}
	public function delete_customer($phone){
		$this->load->model('Mod_Customer');
		$this->Mod_Customer->deleteCustomer($phone);
		redirect(base_url("customer/"));

	}
	public function edit_customer($phone){
		$this->load->model('Mod_Customer');
		$result['PersonInfo']= $this->Mod_Customer->getCustomerPersonInfo($phone);

		$this->load->view('customer_edit_page',array('PersonInfo' => $result['PersonInfo']));


		$this->load->view('/layout/footer');
	}

	
}
