
            <!-- Modal -->
<div class="modal fade" id="createbill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url('Order_record/createbill/');?>" enctype="multipart/form-data" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">新增訂單</h4>
      </div>
      <div class="modal-body">
            <!-- <div class="table-responsive"> -->
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover">
                               
                                        <tr>    
                                            <td>電話</td>
                                            <td>
                                            <input class="form-control" type="text" list="customer_create_datalist" name="customer_create_phone" />
                                            <datalist  id="customer_create_datalist">
                                            <?php 
                                                foreach ($result_customerlist as $key) {
                                                    echo "<option value=".$key['phone'].">".$key['name']."  ".$key['address']."</option>";
                                                } 
                                              
                                            ?>
                                            </datalist>
                                            </td>
                                        </tr>
                                       
                                        
                                        <tr>
                                            <td>瓦斯桶編號
                                                <button type="button"  class="btn btn-info" id="btn">新增</button>
                                                <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" list="customer_create_tankinfo" name="customer_create_gasinfo[]" />
                                            <datalist  id="customer_create_tankinfo">

                                            <?php 
                                                foreach ($result_gastankinfo as $key) {
                                                    echo "<option value=".$key['barcode'].">".$key['gas_type']."公斤 ,".$key['price']."元/桶"."</option>";
                                                } 
                                              
                                            ?>
                                          </datalist>
                                           <!-- add new item Dynamically in the show block -->
                                           <!-- add new item Dynamically in the show block -->
                                            <div id="showBlock">
                                              

                                            </div>

                                            <br>
                                            <!-- click the button to add new item -->

                                            

                                            </td>

                                        </tr>
                                        
                                        
                                       
                               
                                    <tbody>
                                        <tr>
                                           
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
        <button type="submit" class="btn btn-primary">新增訂單</button>
      </div>
      </form>
    </div>
  </div>
</div>

            <!-- Modal -->
<div class="modal fade" id="search_phone_number" tabindex="-1" role="dialog" aria-labelledby="search_phone_number">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="<?php echo base_url('customer/phone_search/');?>" enctype="multipart/form-data" method="POST">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">電話查詢</h4>
         </div>
         <div class="modal-body">
            <!-- <div class="table-responsive"> -->
            <div class="table">
               <table class="table table-striped table-bordered table-hover">
                  <tr>
                     <td>客戶電話</td>
                     <td>
                      <!-- <input class="form-control" name="customer_search"> -->
                      <input class="form-control" type="text"  list="customer_search_datalist" name="customer_search"/>
                        <datalist id="customer_search_datalist">
                          <?php

                            foreach ($result_customerlist as $key) {
                                echo "<option value=".$key['phone'].">".$key['name']."</option>";
                            } 
                            // for ($j = 0 ; $j <= $i ; $j++)
                            //   echo "<option value=".$result_unique2_phone[$j].">".$result_unique2_name[$j]."</option>";
                            
                          ?>


                        </datalist>
                      </td>
                  </tr>
                  <tbody>
                     <tr>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.table-responsive -->
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
     
            <button type="submit" class="btn btn-primary" >查詢</button>
         </div>
       </form>
      </div>
   </div>
</div>


<script>
  //set the default value
  var txtId = 1;
  
  //add input block in showBlock
  $("#btn").click(function () {

       $("#showBlock").append('<div id="div' + txtId + '"> <br> <input class="form-control" type="text" list="customer_create_tankinfo" name="customer_create_gasinfo[]"/> <button type="button" class="btn btn-outline btn-danger" value="del" onclick="deltxt('+txtId+')"> 刪除</button> </div>');
      //$("#showBlock").append('<div id="div' + txtId + '">Input:<input type="text" name="test[]" /> <input type="button" value="del" onclick="deltxt('+txtId+')"></div>');

      //<button type="button" class="btn btn-outline btn-warning">Warning</button>
      txtId++;
  });
  //remove div
  function deltxt(id) {
      $("#div"+id).remove();
  }
</script> 