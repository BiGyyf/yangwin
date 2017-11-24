<div id="page-wrapper">
   <!-- /.row -->
   <div class="row">
      <div class="panel panel-default">
         <div class="panel-heading">
         	<?php

         		foreach ($result as $row)
            	{
                  $name = $row['name'];
            		$phone = $row['phone']; 
                  $address = $row['address'];
                  break;
            	}
         		echo "<h4>".$name." ".$phone." ".$address."的紀錄</h4>";
         		
         	?> 
 
           <!--  <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#createbill">新增訂單</button>
            <button type="button" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#search_phone_number">電話查詢</button> -->
         </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
            <!-- <div class="table-responsive"> -->
            <div class="table">
               <table class="table table-striped table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>訂單編號</th>
                        <th>訂貨日期</th>
                        
                        <!-- <th></th> -->
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($result as $value): ?> 
                     <tr>
                        <td><a href="<?php echo base_url('order_record/detail/').$value['id']; ?>" </a> <?php echo $value['id']; ?></td>
                        <td><?php echo $value['date']; ?></td>
                        
                      
                      
                      
                        <!-- <td>
                          
                           <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              操作 <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                 <li><a href="<?php // echo base_url('customer/');?>">編輯</a></li>
                                 <li><a href="#">列印</a></li>
                                 <li role="separator" class="divider"></li>
                                 <li ><a href="#">刪除</a></li>
                              </ul>
                           </div>
                        </td> -->
                     </tr>
                     <?php  endforeach; ?>
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

