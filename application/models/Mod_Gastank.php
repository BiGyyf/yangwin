<?php
class Mod_Gastank extends CI_Model {

      
        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
        }
        public function getGastanklist($ptr){
                $this->db->order_by('barcode','desc');
                //
                //$query;
                if ($ptr == 0)// 給頁面-瓦斯桶資訊 用，不需要過濾 是否被借用
                        $query = $this->db->get_where('gastank_info_view',array('alive' => 1));
                else// 給頁面-新增訂單 用，需要過濾 是否被借用，庫存才可以被借出
                        $query = $this->db->get_where('gastank_info_view',array('status' => 0,'alive' => 1, 'customer_phone' => NULL));
                
               
                $i = 0;
                foreach ($query->result_array() as $value) {
                        $result[$i]['gas_type'] = $value['gas_type'];
                        $result[$i]['barcode'] = $value['barcode'];
                        $result[$i]['price'] = $value['price'];
                        $result[$i]['customer_phone'] = $value['customer_phone'];
                        $result[$i]['status'] = $value['status'];   
                        $i++;
                }
                if ($i)//搜尋結果例外處理
                        return $result;
                else{
                        $result[$i]['gas_type']  = "0";
                        $result[$i]['barcode'] = "0";
                        $result[$i]['price'] = "0";
                        $result[$i]['customer_phone'] = "0";
                        $result[$i]['status'] = "0";
                        return $result;
                }
        }

        public function createHistory($data){
                $query = $this->db->insert('gastank_sell_history', $data); 
                return $query ;
        }
        // //如果建立訂單失敗，則恢復
        // public function deleteHistory($list_id,$gas_barcode){
        //         $query = $this->db->delete('gastank_sell_history', array('orderlist_id' => $list_id,'gastank_barcode'=>$gas_barcode)); 
        //         return $query ;
        // }

        public function updateStatus($barcode){
                $data = [
                        'customer_phone' => null,
                        'status' => 0
                ];
                $this->db->update('gastank',$data,array('barcode' => $barcode));
                return 0;
        }
        public function getGasHistory($barcode){
                $query = $this->db->get_where('gastank_sell_history',array('gastank_barcode' => $barcode));
                $i = 0;
                foreach ($query->result_array() as $value) {
                        $result[$i]['barcode'] = $value['gastank_barcode'];
                        $result[$i]['date'] = $value['date'];
                        $result[$i]['customer_phone'] = $value['customer_phone'];
                        $result[$i]['orderlist_id'] = $value['orderlist_id'];   
                        $i++;

                }
                if ($i)//搜尋結果例外處理
                        return $result;
                else{
                        $result[$i]['barcode'] = "";
                        $result[$i]['date'] = "";
                        $result[$i]['customer_phone'] = "";
                        $result[$i]['orderlist_id'] = "";
                        return $result;
                }     
        }

}

?>