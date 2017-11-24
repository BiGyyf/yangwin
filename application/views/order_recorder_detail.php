<div id="page-wrapper">

   <!-- /.row -->
 
   <div class="row">
      <div class="panel panel-default">
         <div class="panel-heading">
            <?php 
               foreach ($customer_info as $value){

                  $id = $value['id'];
                  $name= $value['name'];
                  $phone =$value['phone'];
                  $address =$value['address'];
                  $comment =$value['comment'];
               }
               foreach ($order_detail as $value){
                  $date = $value['date'];
                  break;
               }
            ?>
            <h4> 訂單記錄 <?php echo $date;?> </h4>
            <p><?php echo "姓名: ".$name."<br>"; 
                     echo "電話: ".$phone."<br>";
                     echo "地址: ".$address."<br>";
               ?>
               
            </p>
      	  <div id="with_print">

            <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#createbill" onclick="window.print()">列印</button>
        </div>
           
         </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
            <!-- <div class="table-responsive"> -->
            <div class="table" id="with_or_without_print">
               <table class="table table-striped table-bordered table-hover">
                  <h3>存根聯</h3>
                  <thead>
                     <tr>
                        <th>瓦斯桶條碼</th>
                        <th>瓦斯桶種類(KG)</th>
                        <th>價格</th>
                     
                  
                     </tr>
                  </thead>
                  <tbody>
                  
                     <?php foreach ($order_detail as $value): 
                     ?> 
                     <tr>
                        
                        <td><?php echo $value['gastank_barcode']; ?></td>
                        <td><?php echo $value['gas_type']; ?></td>
                        <td><?php echo $value['price']; ?></td>
              
                        

                        
                        
                     </tr>
                     <?php  endforeach ?>
                    

                  </tbody>

               </table>

               <p>簽收:____________________</p>
               <table class="table table-striped table-bordered table-hover">
                  <h3>收執聯</h3>
                  <thead>
                     <tr>
                        <th>瓦斯桶條碼</th>
                        <th>瓦斯桶種類(KG)</th>
                        <th>價格</th>
                     
                  
                     </tr>
                  </thead>
                  <tbody>
                  
                     <?php foreach ($order_detail as $value): 
                     ?> 
                     <tr>
                        
                        <td><?php echo $value['gastank_barcode']; ?></td>
                        <td><?php echo $value['gas_type']; ?></td>
                        <td><?php echo $value['price']; ?></td>
              
                        

                        
                        
                     </tr>
                     <?php  endforeach ?>
                    

                  </tbody>

               </table>
               
               
            </div>
            <!-- /.table-responsive -->
         </div>
         <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
   </div>

</div>

