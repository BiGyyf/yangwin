



<div id="page-wrapper">
   <!-- /.row -->
   <div class="row">
      <div class="panel panel-default">
         <div class="panel-heading">
            編輯客戶資訊
            <!-- <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#create_customer">新增客戶</button> -->
            
         </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
            <!-- <div class="table-responsive"> -->
            <div class="table">
               <table id="" width="100%" class="table table-striped table-bordered table-hover">
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
                     <?php foreach ($PersonInfo as $value): ?> 
                     <tr>
                        <td><?php echo "<div id=".$value['id']."</div>".$value['id']; ?></td>
                        <td><?php echo "<div id=".$value['name']."</div>".$value['name']; ?></td>
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