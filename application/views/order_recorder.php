
<div id="page-wrapper">

   <!-- /.row -->
   <div class="row">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h4>訂單記錄</h4>
            <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#createbill">新增訂單</button>
            <button type="button" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#search_phone_number">電話查詢</button>
         </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
            <div class="table-responsive">
            
               <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover" >
                  <thead>
                     <tr>
                        <th>訂單編號</th>
                        <th>訂貨日期</th>
                        <th>姓名</th>
                        <th>電話</th>
                        <th>地址</th>
                        
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                  
                     <?php foreach ($result as $value): ?> 
                     <tr>
                        <td><a href="<?= base_url('order_record/detail/'.$value['id'])?>"><?= $value['id']?></a></td>
                        <!-- <td><?//php echo "<a href=".base_url('order_record/detail/'.$value['id']).">".$value['id']."</a>"; ?></td> -->
                        <td><?= $value['date']; ?></td>
                        <td><?= $value['name']; ?></td>
                        <td><?= $value['phone']; ?></td>
                        <td><?= $value['address']; ?></td>
                        

                        
                        <td>
                           <!-- Single button -->
                           <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              操作 <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                 <li role="separator" class="divider"></li>

                                 <!-- <li><a id="<?php //echo $value['id'];?>"  onclick="delete_orderlist(<?php //echo "'".$value['id']."'"; ?>)">刪除</a></li> -->
                                 <li><a id="<?= $value['id'] ?>" onclick="delete_orderlist('<?= $value['id']  ?>')">刪除 </a></li>
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


<script>
   function delete_orderlist($var) {
       if(confirm("請問是否刪除"+$var+" 訂單所有資訊")){
            document.location.href="<?= base_url('order_record/delete_orderlist/');?>"+$var;
       }else{
            alert("取消");
       }
   }
  
</script>

