<?php

use App\Models\contact;


$list = contact::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();



?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=contact&cat=create" method="contact" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <strong class="text-dark text-lg">TẤT CẢ  LIÊN HỆ</strong>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-sm-6">
                  <a href="index.php?option=brand&cat=all" class="btn btn-success btn-sm">  <i class="fas fa"></i>Tất Cả</a>

                     <a href="index.php?option=contact&cat=trash" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Thùng rác</a>
                  </div>

                  <div class="col-sm-6 text-right">
                     <a href="index.php?option=contact&cat=create" class="btn btn-sm btn-primary">  <i class="fa fa-plus" aria-hidden="true"></i>Thêm liên hệ</a>
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
                   <th class="text-center" style="width:160px;">Tên khách hàng</th>
                    <th class="text-center" style="width:160px;">Email</th>
                    <th class="text-center" style="width:160px;">Phone</th>
                    <th class="text-center" style="width:160px;"> Tiêu đề</th>
                    <th class="text-center" style="width:160px;"> Content</th>
                    <th class="text-center" style="width:160px;">Chức Năng</th>
                    <th class="text-center" style="width:20px;">ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $item) : ?>
                           <tr>
                              <td class="text-center">
                                 <input type="checkbox" />
                              </td>
                             
                              <td class="text-center">
                                 <?= $item->name; ?>
                              </td>
                              <td class="text-center">
                              
                                    <?= $item->email; ?>
                               
                              </td>
                              <td class="text-center">
                                 <?= $item->phone; ?>
                              </td>
                              <td class="text-center">
                                 <?= $item->   title; ?>
                              </td>
                             
                           
                            
                              <td class="text-center">
                                 <?= $item->content; ?>
                              </td>
                              <td class="text-center">
                                 <?php if ($item->status == 2) : ?>
                                    <a href="index.php?option=contact&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                       <i class="fas fa-toggle-off"></i>
                                    </a>
                                 <?php else : ?>
                                    <a href="index.php?option=contact&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                       <i class="fas fa-toggle-on"></i>
                                    </a>
                                 <?php endif; ?>
                                 <a href="index.php?option=contact&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="far fa-eye"></i>
                                 </a>
                                 <a href="index.php?option=contact&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                 </a>
                                 <a href="index.php?option=contact&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                              <td class="text-center"><?= $item->id; ?></td>
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