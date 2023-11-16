<?php

use App\Libraries\MyClass;

use App\Models\User;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM user wher status!=0 and id=1 order by created_at desc

$list = User::where('status', '=', 0)->orderBy('created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <strong class="text-dark text-lg">THÙNG RÁC THÀNH VIÊN</strong>
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
                  <a class="btn btn-sm btn-info" href="index.php?option=user">
                     <i class="fas fa-arrow-left"></i> Về danh sách
                  </a>
                  </button>
               </div>
            </div>
         </div>
         <div class="card-body">

            <?php require_once "../views/backend/message.php"; ?>

            <div class="row">

               <div class="col-md-12">
               <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           <th class="text-center" style="width:150px">Hình</th>
                           <th class="text-center">Tên người dùng</th>
                           <th class="text-center" style="width:200px">Email</th>
                           <th class="text-center" style="width:200px">Số điện thoại</th>
                           <th class="text-center" style="width:170px">Chức năng</th>
                           <th class="text-center" style="width:30px">ID</th>
                     </thead>
                     <tbody>
                        <?php foreach ($list as $item) : ?>
                           <tr>
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td class="text-center">
                                 <img src="../public/images/user/<?= $item->image; ?>" class="img-fluid" alt="hinh">
                              </td>
                              <td class="text-center"><?= $item->name; ?></td>
                              <td class="text-center"><?= $item->email; ?></td>
                              <td class="text-center"><?= $item->phone; ?></td>
                              <td class="text-center">
                                 <a href="index.php?option=user&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                                 <a href="index.php?option=user&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                              </td>
                              <td class="text-center"><?= $item->id; ?></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>