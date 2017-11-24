<div id="page-wrapper">
   <!-- /.row -->
   <div class="row">
      <div class="panel panel-default">
         <div class="panel-heading">
            客戶資訊
            <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#create_customer">新增客戶</button>
            
         </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
            <!-- <div class="table-responsive"> -->
            <div class="table">
               <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>編號</th>
                        <th>姓名</th>
                        <th>電話</th>
                        <th>地址</th>
                        <th>備註</th>
                        
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($result as $value): ?> 
                     <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><a href="<?php echo base_url('customer/info/'.$value['phone']);?>"><?php echo $value['phone']; ?></a></td>
                        <td><?php echo $value['address']; ?></td>
                         <td><?php echo $value['comment']; ?></td>
                        
                        <td>
                           <!-- Single button -->
                           <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              操作 <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                 <li><a href="<?php echo base_url('customer/edit_customer/'.$value['phone']);?>">編輯</a></li>
                                 <!-- <li><a href="">列印</a></li> -->
                                 <li role="separator" class="divider"></li>
                                 <li><a id="<?php echo $value['phone'];?>"  onclick="delete_customer(<?php echo "'".$value['phone']."'"; ?>)">刪除</a></li>
                                 
                              </ul>
                           </div>
                        </td>
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

<!-- Modal -->
<div class="modal fade" id="create_customer" tabindex="-1" role="dialog" aria-labelledby="create_customer">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="<?php echo base_url('customer/create_customer/');?>" enctype="multipart/form-data" method="POST">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">新增客戶資訊</h4>
         </div>
         <div class="modal-body">
            <!-- <div class="table-responsive"> -->
            <div class="table">
               <table class="table table-striped table-bordered table-hover">
                  <tr>    
                        <td>客戶姓名</td>
                        <td><input class="form-control" name="create_name"></td>
                  </tr>
                  <tr>    
                         <td>電話</td>
                         <td><input class="form-control" name="create_phone"></td>
                  </tr>
                  <tr>   
                         <td>地址</td>
                         <td><input class="form-control" name="create_address"></td>
                  </tr>
                  <tr>
                         <td>備註</td>
                         <td><input class="form-control" name="create_comment"></td>
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
     
            <button type="submit" class="btn btn-primary" >儲存設定</button>
         </div>
       </form>
      </div>
   </div>
</div>




<script>
   function delete_customer($var) {
       if(confirm("請問是否刪除"+$var+"所有資訊")){
            document.location.href="<?php echo base_url('customer/delete_customer/');?>"+$var;
       }else{
            alert("取消");
       }
   }
  
</script>

