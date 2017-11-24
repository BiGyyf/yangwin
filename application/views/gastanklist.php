<div id="page-wrapper">
   <!-- /.row -->
   <div class="row">
      <div class="panel panel-default">
         <div class="panel-heading">
            瓦斯桶資訊
            <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#create_customer">新增客戶</button>
            
         </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
            <!-- <div class="table-responsive"> -->
            <div class="table">
               <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>序號</th>
                        <th>瓦斯桶編號</th>
                        <th>瓦斯桶種類(KG)</th>
                        <th>瓦斯桶價格</th>
                        <th>借用者資訊</th>
                        <th>出售狀態</th>
                        
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
                           <?php echo $value['barcode'];?> 
                       </td>
                       <td>
                           <?php echo $value['gas_type'];?> 
                       </td>
                       <td>
                           <?php echo $value['price'];?> 
                       </td>
                       <td>
                           <?php
                                 echo "<a href=".base_url('customer/info/').$value['customer_phone'].">".$value['customer_phone']."</a>";

                           ?>

                       </td>
                       <td>
                           

                          <div class="form-group">
                            
                              
                              
                                <?php 
                                    if($value['status'] == 1){
                                      echo '<select class="form-control">';
                                      echo "<option>售出</option>";
                                      echo "<option>歸還</option>";
                                      echo "</select>";
                                    }
                                    else
                                      echo "<option>庫存</option>";
                                ?> 
                                 
                                 
                              
                          </div>
                       </td>
                        
                       
                     </tr>
                     <?php  endforeach ?>
                  </tbody>
               </table>
               <button>儲存</button>
            </div>
            <!-- /.table-responsive -->
         </div>
         <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
   </div>
</div>

