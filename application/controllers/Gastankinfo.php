<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastankinfo extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->view('/layout/header');
		$this->load->view('/layout/nav');
		
		
	}
	public function index()
	{
		$this->load->model('Mod_Gastank');
		$data['gastanklist'] = $this->Mod_Gastank->getGastanklist(0);
		
		
		$this->load->view('gastanklist',$data);
		

		
		$this->load->view('/layout/footer');
	}
	public function return(){
		$this->load->model('Mod_Gastank');
		$gas_barcode_array = $this->input->post('gastankInfo');

		for($i = 0 ; $i < count($gas_barcode_array); $i++){
			if ($gas_barcode_array[$i] != "Sell"){
				$this->Mod_Gastank->updateStatus($gas_barcode_array[$i]);

			}
			
		}
		redirect(base_url("gastankinfo/"));
	}
	public function gastankHistory($barcode){
		$this->load->model('Mod_Gastank');
		$result['history'] = $this->Mod_Gastank->getGasHistory($barcode);
		
		$this->load->view('gastank_history',$result);
	}
	
}
