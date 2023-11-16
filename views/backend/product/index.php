<?php
use App\Models\Product;
use App\Models\Category;
use App\Models\brand;

//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc
/*
$list = Product::where('status','!=',0)->orderBy('Created_at','DESC')->get();
*/

$list = Product::join('category', 'product.category_id', '=', 'category.id')//join 2 bảng với điều kiện category_id(product)=id(category)
 ->join('brand', 'product.brand_id', '=', 'brand.id')
 ->where('product.status', '!=', 0)/// điều kiện để lọc ra các bản ghi từ bảng "Product" mà trường "status" khác không.
 ->orderBy('product.created_at', 'desc')//sắp xếp theo trường created_at giảm dần
 ->select("product.*", "category.name as category_name", "brand.name as brand_name")//chọn ra các cột từ product để lấy name danh mục vs name thương hiệu
 ->get();

?>


<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <strong class="text-dark text-lg">TẤT CẢ SẢN PHẨM</strong>
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

                     <a href="index.php?option=product&cat=trash" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Thùng rác</a>
                  </div>

                  <div class="col-sm-6 text-right">
                     <a href="index.php?option=product&cat=create" class="btn btn-sm btn-primary" >Thêm sản phẩm</a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Tên danh mục</th>
                        <th class="text-center">Tên thương hiệu</th>
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
                              </td>
                              <td class="text-center">
                                 <img src="../public/images/product/<?= $item->image; ?>" class="img-fluid" alt="hinh">
                              </td>
                              <td class="text-center">
                                 <?= $item->name; ?>
                              </td>
                              <td class="text-center"><?= $item->category_name; ?> </td>
                              <td class="text-center"><?= $item->brand_name; ?> </td>
                              <td class="text-center">
                                 <?php if ($item->status == 2) : ?>
                                    <a href="index.php?option=product&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                       <i class="fas fa-toggle-off"></i>
                                    </a>
                                 <?php else : ?>
                                    <a href="index.php?option=product&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                       <i class="fas fa-toggle-on"></i>
                                    </a>
                                 <?php endif; ?>
                                 <a href="index.php?option=product&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="far fa-eye"></i>
                                 </a>
                                 <a href="index.php?option=product&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                 </a>
                                 <a href="index.php?option=product&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
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