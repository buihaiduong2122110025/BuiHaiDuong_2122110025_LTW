<?php
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;


$list = Product::join('category', 'product.category_id', '=', 'category.id')
 ->join('brand', 'product.brand_id', '=', 'brand.id')
 ->where('product.status', '=', 0)
 ->orderBy('product.created_at', 'desc')
 ->select("product.*", "brand.name as brand_name", "category.name as category_name")
 ->get();

?>


<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                     <strong class="text-dark text-lg">THÙNG RÁC SẢN PHẨM</strong>
                         <!-- <a href="index.php?option=product&cat=create" class="btn btn-sm btn-primary">Thêm sản phẩm</a>--> 
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
                  <a class="btn btn-sm btn-info" href="index.php?option=product">
                <i class="fas fa-arrow-left"></i> Về danh sách
              </a>
                  </div>
                </div>
               </div>
                  <div class="card-body">
                  <?php require_once "../views/backend/message.php";?>

                  <table class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th class="text-center" style="width:130px;">Hình ảnh</th>
                              <th class="text-center" >Tên sản phẩm</th>
                              <th class="text-center" >Tên danh mục</th>
                              <th class="text-center" >Tên thương hiệu</th>
                              <th class="text-center" style="width:170px">Chức năng</th>
                                 <th class="text-center" style="width:30px">ID</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php if(count($list) > 0) : ?>
                              <?php foreach($list as $item   ):?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td class="text-center">
                              <img class="img-fluid" src="../public/images/product/<?=$item->image;?>" alt="<?=$item->image;?>">
                              </td>

                              <td class="text-center"><?= $item->name ; ?> </td>
                              <td class="text-center"><?= $item->category_name ; ?> </td>
                              <td class="text-center"><?= $item->brand_name ; ?> </td>
                              <td class="text-center">
                                 <div class="text-center">                                                                     
                                 <a href="index.php?option=product&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                                 <a href="index.php?option=product&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                                 </div>
                              </td>                         
                              <td class="text-center"><?= $item->id ; ?> </td>
                           </tr>
                           <?php endforeach;?>
                              <?php endif;?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </section>
         </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>