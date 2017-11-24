<?php
class Mod_Customer extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
        }
        public function getCustomerlist(){
                
                $query = $this->db->get_where('customer',array('alive' => 1));
                $i = 0;
                foreach ($query->result_array() as $value) {
                		$result[$i]['id'] = $value['id'];
                        $result[$i]['name'] = $value['name'];
                        $result[$i]['phone'] = $value['phone'];
                        $result[$i]['address'] = $value['address'];
                        $result[$i]['comment'] = $value['comment'];
                        
                        $i++;
                }
                return $result;
        }
        public function getCustomerPersonInfo($phone){
                $query = $this->db->get_where('customer',array('phone' => $phone));
                $i = 0;
                foreach ($query->result_array() as $value) {
                        $result[$i]['id'] = $value['id'];
                        $result[$i]['name'] = $value['name'];
                        $result[$i]['phone'] = $value['phone'];
                        $result[$i]['address'] = $value['address'];
                        $result[$i]['comment'] = $value['comment'];
                        
                        $i++;
                }
                if ($i){
                        return $result;
                }
                else{
                        $result[$i]['id'] = "查無記錄";
                        $result[$i]['name'] = $name;
                        $result[$i]['phone'] = $phone;
                        $result[$i]['address'] = "查無記錄";
                        $result[$i]['comment'] = "查無記錄";
                        return $result;
                }

        }
        public function getCustomerInformation($phone){
                //SELECT * FROM `orderlistview` WHERE phone = '0905110235' GROUP BY(`id`)
                $this->db->group_by("id"); 
                $this->db->order_by("id", "desc"); 
                $query = $this->db->get_where('orderlist_view',array('phone' => $phone));
                $i = 0;

                foreach ($query->result_array() as $value) {
                        $result[$i]['id'] = $value['id'];
                        $result[$i]['name'] = $value['name'];
                        $result[$i]['phone'] = $value['phone'];
                        $result[$i]['address'] = $value['address'];
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
                        $result[$i]['date'] =  "查無資料";
                        return $result;
                }
                
                
        }
        public function createCustomer($data){

                $query = $this->db->insert('customer', $data
        ); 
                return $query ;
        }

        public function deleteCustomer($phone){
        //diable customer status , alive 1 => alive 0
                $data = [
                        'alive'=>0
                ];
                $this->db->update('customer',$data,array('phone' => $phone));

                //$this->db->delete('customer',array('phone' => $phone));
                return 0;
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