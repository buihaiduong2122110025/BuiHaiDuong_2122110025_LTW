<?php
use App\Models\User;
use App\Models\Order;

$list = Order::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
// lấy user_id
$list = Order::join('user', 'order.user_id', '=', 'user.id')
   ->where('order.status', '!=', 0)
   ->orderBy('order.created_at', 'desc')
   ->select("order.*", "user.id as user_id")
   ->get();

?>
<?php require_once '../views/backend/header.php'; ?>

<div class="content-wrapper">
   <!-- Content Header (order header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <strong class="text-dark text-lg">TẤT CẢ ĐƠN HÀNG</strong>
            </div>

         </div>
      </div><!-- /.container-fluid -->
   </section>


   <!-- Main content -->
   <section class="content">


      <!-- Default box -->
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-sm-6">
               <a href="index.php?option=brand&cat=all" class="btn btn-success btn-sm">  <i class="fas fa"></i>Tất Cả</a>

                  <a href="index.php?option=order&cat=trash" class="btn btn-danger btn-sm">
                     <i class="fas fa-trash"></i> Thùng rác</a>
               </div>

               <div class="col-sm-6 text-right">
                  <a href="index.php?option=order&cat=create" class="btn btn-sm btn-primary">Thêm đơn hàng</a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <?php require_once '../views/backend/message.php'; ?>
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
                     <th class="text-center">Mã Khách Hàng</th>
                     <th class="text-center" style="width:170px">Chức năng</th>
                     <th class="text-center" style="width:30px">ID</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($list) > 0) : ?>
                     <?php foreach ($list as $item) : ?>
                        <tr>
                           <td class="text-center">
                              <input type="checkbox" />
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
                              <div class="user_id"></div>
                              <?= $item->user_id; ?>
                           </td>
                           <td class="text-center">
                              <?php if ($item->status == 2) : ?>
                                 <a href="index.php?option=order&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                    <i class="fas fa-toggle-off"></i>
                                 </a>
                              <?php else : ?>
                                 <a href="index.php?option=order&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-toggle-on"></i>
                                 </a>
                              <?php endif; ?>
                              <a href="index.php?option=order&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                 <i class="far fa-eye"></i>
                              </a>
                              <a href="index.php?option=order&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                 <i class="far fa-edit"></i>
                              </a>
                              <a href="index.php?option=order&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                 <i class="fas fa-trash"></i>
                              </a>
                           <td class="text-center"><?= $item->id; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  <?php endif; ?>
               </tbody>
            </table>

         </div>
         <!-- /.card-body -->

         <!-- /.card-footer-->
      </div>
      <!-- /.card -->

   </section>
   <!-- /.content -->
</div>


<?php require_once '../views/backend/footer.php'; ?>