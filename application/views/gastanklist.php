<div id="page-wrapper">
   <!-- /.row -->
   <div class="row">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h4>瓦斯桶資訊</h4>
            <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#create_gastank">新增瓦斯桶</button>
            
         </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
            <!-- <div class="table-responsive"> -->
             <form action="<?php echo base_url('gastankinfo/return/');?>" enctype="multipart/form-data" method="POST">

            <div class="table">
               <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>序號</th>
                        <th>瓦斯桶編號</th>
                        <th>瓦斯桶種類(KG)</th>
                      <!--   <th>瓦斯桶價格</th> -->
                        <th>借用者資訊</th>
                        <th>出售狀態</th>
                        <th></th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $i = 1;
                        foreach ($gastanklist as $value): 

                     ?> 
                     <tr>
                       <td>
                           <?php echo $i++;?> 
                       </td>
                       <td>
                           <?php echo "<a href=".base_url('gastankinfo/gastankHistory/').$value['barcode'].">".$value['barcode']."</a>";?> 
                       </td>
                       <td>
                           <?php echo $value['gas_type'];?> 
                       </td>
                      <!--  <td>
                           <?php //echo $value['price'];?> 
                       </td> -->
                       <td>
                           <?php
                                 echo "<a href=".base_url('customer/info/').$value['customer_phone'].">".$value['customer_phone']."</a>";

                           ?>

                       </td>
                       <td>
                           

                          <div class="form-group">
                            
                              
                              
                                <?php 
                                    if($value['status'] == 1){
                                      echo '<select name="gastankInfo[]" class="form-control">';
                                      echo "<option value="."Sell".">售出</option>";
                                      echo "<option value=".$value['barcode'].">歸還</option>";
                                      echo "</select>";
                                    }
                                    else
                                      echo "<option>庫存</option>";
                                ?> 
                                 
                                 
                              
                          </div>
                       </td>
                       <td>

                         <!-- Single button -->
                           <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              操作 <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                 <li><a href="<?php echo base_url('gastankinfo/edit_gastank/'."");?>">編輯</a></li>
                                 <!-- <li><a href="">列印</a></li> -->
                                 <li role="separator" class="divider"></li>
                                 <li><a id="<?php echo "";?>"  onclick="delete_customer(<?php echo "'".""."'"; ?>)">刪除</a></li>

                                 
                              </ul>
                           </div>


                       </td>
                        
                       
                     </tr>
                     <?php  endforeach ?>
                  </tbody>
               </table>
               <button type="submit" class="btn btn-primary">儲存</button>
            </div>
          </form>
            <!-- /.table-responsive -->
         </div>
         <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
   </div>
</div>


<!-- Modal -->
<div class="modal fade" id="create_gastank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url('gastankinfo/create_gastank/');?>" enctype="multipart/form-data" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">新增瓦斯桶</h4>
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
