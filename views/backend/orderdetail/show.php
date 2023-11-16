<?php
use App\Models\Orderdetail;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 orderdetail by created_at desc
$id = $_REQUEST['id'];
$orderdetail = Orderdetail::find($id);
if($orderdetail==null){
    header("location:index.php?option=orderdetaildetail");
}

$list = Orderdetail::where('status','=',0)->orderdetailBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=orderdetaildetail&cat=process" method="orderdetail" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">CHI TIẾT ĐƠN HÀNG </strong>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a class="btn btn-sm btn-info" href="index.php?option=orderdetaildetail">
                            <i class="fas fa-arrow-left"></i>Về danh sách
                        </a>
                    </div>
                </div>
            </div>
               <div class="card-body p-2">
                  <table class="table table-borderdetailed">
                     <thead>
                        <tr>
                           
                           <th>Tên trường</th>
                           <th>Giá trị</th>
                        </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <td>ID</td>
                         <td><?= $orderdetail->id;?></td>
                     </tr>
                     <tr>
                         <td>user_id</td>
                         <td><?= $orderdetail->order_id;?></td>
                     </tr>
                     <tr>
                         <td>deliveryaddress</td>
                         <td><?= $orderdetail->deliveryaddress;?></td>
                     </tr>
                     <tr>
                         <td>deliveryname</td>
                         <td><?= $orderdetail->deliveryname;?></td>
                     </tr>
                     <tr>
                         <td>deliveryphone</td>
                         <td><?= $orderdetail->deliveryphone;?></td>
                     </tr>
                   
                         <td>deliveryemail</td>
                         <td><?= $orderdetail->deliveryemail;?></td>
                     </tr>
                     <tr>
                         <td>note</td>
                         <td><?= $orderdetail->note;?></td>
                     </tr>
                   
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>