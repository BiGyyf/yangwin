<?php
class Mod_Orderlist extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
        }
        public function getOrderlist(){
                $result;
                $this->db->group_by("id"); 
                $this->db->order_by("id", "desc"); 
                $query = $this->db->get_where('orderlist_view',array('status' => 1));
                
                $i = 0;

                foreach ($query->result_array() as $value) {
                        $result[$i]['id'] = $value['id'];
                        $result[$i]['name'] = $value['name'];
                        $result[$i]['phone'] = $value['phone'];
                        $result[$i]['address'] = $value['address'];
                        //$result[$i]['gas_type'] = $value['gas_type'];
                        //$result[$i]['barcode'] = $value['gastank_barcode'];
                     
                        //$result[$i]['price'] = $value['price'];
                        $result[$i]['date'] =  $value['date'];
                        $i++;
                }


              

                if ($i){
                        return $result;
                }
                else{
                        $result[$i]['id'] = "";
                        $result[$i]['name'] = "查無資料";
                        $result[$i]['phone'] = "查無資料";
                        $result[$i]['address'] = "查無資料";
                        $result[$i]['date'] = "查無資料";
                      
                        return $result;
                }
        }

        public function getOrderRecord($record_id){
                $query = $this->db->get_where('orderlist_view',array(
                        'id' => $record_id
                ));

                $i = 0 ;
                foreach ($query->result_array() as $value) {
                        $result[$i]['gastank_barcode'] = $value['gastank_barcode'];
                        $result[$i]['gas_type'] = $value['gas_type'];
                        $result[$i]['price'] = $value['price'];
                        $result[$i]['phone'] = $value['phone'];
                        $result[$i]['date'] =  $value['date'];
                        $i++;
                }
                return $result;
        }
        public function deleteCustomer($list_id){
                $data = [
                        'status'=>0
                ];
                $this->db->update('orderlist',$data,array('id' => $list_id));

                //$this->db->delete('customer',array('phone' => $phone));
                return 0;
        }
        public function createBill($phone){
                //新增一個訂單
                $this->db->insert('orderlist', array( 'customer_phone' =>$phone , 'status' => 1));
                $query = $this->db->get('orderlist'); 
                $row = $query->last_row();
                return $row->id;
        }
        public function disableBill($list_id,$barcode){
               // $data = ['status'=>0];
                $this->db->delete('orderlist',array('id' => $list_id));
                $this->db->delete('orderlist_detail',array('orderlist_id'=> $list_id));


                $reset_gastankinfo=[
                        'customer_phone'=> NULL,
                        'status' => 0
                ];
                $this->db->update('gastank',$reset_gastankinfo,array('barcode' => $barcode));
        }
        public function createBillDetail($orderlist_id,$barcode,$phone){
                

                $query = $this->db->get_where('orderlist_view',array(
                        'id' => $orderlist_id,
                        'gastank_barcode' => $barcode, 
                        'phone' => $phone
                ));
                foreach ($query->result_array() as $key) {
                       return 0;
                }


                //更新桶子的借用者
                $data = [
                        'customer_phone' => $phone,
                        'status' => 1
                ];
                $this->db->update('gastank',$data,array('barcode' => $barcode));
                //新增桶子到訂單裡
                $query = $this->db->get_where('gastank_info_view',array('barcode'=>$barcode, 'alive'=>1));
                //$price = $result->price;
                foreach ($query->result_array() as $key) {
                        $price = $key['price'];
                }
                $this->db->insert('orderlist_detail', array(
                        'orderlist_id'=>$orderlist_id ,
                        'gastank_barcode' =>$barcode , 
                        'price' => $price
                ));
                return 1;
        }





        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);

                return $query->result();
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}

?>