
<?php
use App\Models\Order;
use App\Models\Product;
use App\Models\Orderdetail;




   $list = Orderdetail::join('product', 'orderdetail.product_id', '=', 'product.id')
 ->join('order', 'orderdetail.order_id', '=', 'order.id')
 ->select("orderdetail.*", "product.name as product_name", "order.id as order_id")
 ->get();

?>


<?php require_once '../views/backend/header.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <strong class="text-dark text-lg">TẤT CẢ CHI TIẾT ĐƠN HÀNG</strong>
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

              <a href="index.php?option=orderdetail&cat=trash" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> Thùng rác</a>   
              </div>
              
              <div class="col-sm-6 text-right">
                <a href="index.php?option=orderdetail&cat=create" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Thêm Đơn hàng</a>
               
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
                     <th class="text-center">Mã Đơn Hàng</th>
                     <th class="text-center">Tên sản phẩm </th>
                     <th class="text-center">Giá</th>
                     <th class="text-center">Số Lượng</th>
                     <th class="text-center">Tổng Cộng </th>
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
                              <div class="order_id"></div>
                              <?= $item->order_id; ?>
                           </td>
                           <td class="text-center">
                              <div class="product_id"></div>
                              <?= $item->product_name; ?>
                           </td>
                           <td class="text-center">
                              <div class="price"></div>
                              <?= $item->price; ?>
                           </td>
                           <td class="text-center">
                              <div class="qty"></div>
                              <?= $item->qty; ?>
                           </td>
                           <td class="text-center">
                              <div class="amount"></div>
                              <?= $item->amount; ?>
                           </td>
                           <td class="text-center">
                              <?php if ($item->status == 2) : ?>
                                 <a href="index.php?option=orderdetail&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                    <i class="fas fa-toggle-off"></i>
                                 </a>
                              <?php else : ?>
                                 <a href="index.php?option=orderdetail&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-toggle-on"></i>
                                 </a>
                              <?php endif; ?>
                              <a href="index.php?option=orderdetail&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                 <i class="far fa-eye"></i>
                              </a>
                              <a href="index.php?option=orderdetail&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                 <i class="far fa-edit"></i>
                              </a>
                              <a href="index.php?option=orderdetail&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
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
