<?php

use App\Models\order;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM order wher status!=0 and id=1 order by created_at desc

$list = order::where('status', '=', 0)->orderBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=order&cat=process" method="order" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <strong class="text-dark text-lg">THÙNG RÁC ĐƠN HÀNG </strong>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header ">
               <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6 text-right">
                     <a class="btn btn-sm btn-info" href="index.php?option=order">
                        <i class="fas fa-arrow-left"></i> Về danh sách
                     </a>
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body p-2">
               <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center">Tên giao hàng</th>
                        <th class="text-center">Email giao hàng</th>
                        <th class="text-center">SĐT giao hàng</th>
                        <th class="text-center">Địa chỉ giao hàng</th>
                        <th class="text-center" style="width:170px">Chức năng</th>
                        <th class="text-center" style="width:30px">ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $item) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td class="text-center">
                                 <div class="deliveryname"></div>
                                 <?= $item->deliveryname; ?>
                              </td>
                              <td class="text-center">
                                 <div class="deliveryemail"></div>
                                 <?= $item->deliveryemail; ?>
                              </td>
                              <td class="text-center">
                                 <div class="deliveryphone"></div>
                                 <?= $item->deliveryphone; ?>
                              </td>
                              <td class="text-center">
                                 <div class="deliveryaddress"></div>
                                 <?= $item->deliveryaddress; ?>
                              </td>
                              <td class="text-center">
                              <a href="index.php?option=order&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                                 <a href="index.php?option=order&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                              </td>
                              <td class="text-center"><?= $item->id ?></td>
                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>