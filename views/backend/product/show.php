<?php
use App\Models\Product;
use App\Libraries\MyClass;


$id = $_REQUEST['id'];
$product =  Product::find($id);
if($product==null){
   MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

    header("location:index.php?option=product");
}

?>

<?php require_once "../views/backend/header.php";?>

      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">CHI TIẾT SẢN PHẨM</strong>
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
               <a href="index.php?option=product" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
            </div>
               <div class="card-body p-2">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th style="width:30%">Tên trường</th>
                           <th>Giá trị</th>
                        </tr>
                     </thead>
                     <tbody>
                              
                              <tr>
                                 <td>ID</td>
                                 <td><?= $product->id;?></td>
                              </tr>
                              <tr>
                                 <td>category_id</td>
                                 <td><?= $product->category_id;?></td>
                              </tr>
                              <tr>
                                 <td>brand_id</td>
                                 <td><?= $product->brand_id;?></td>
                              </tr>
                              <tr>
                                 <td>name</td>
                                 <td><?= $product->name;?></td>
                              </tr>
                              <tr>
                                 <td>slug</td>
                                 <td><?= $product->slug;?></td>
                              </tr>
                              <tr>
                                 <td>price</td>
                                 <td><?= $product->price;?></td>
                              </tr>
                              <tr>
                                 <td>pricesale</td>
                                 <td><?= $product->pricesale;?></td>
                              </tr>
                              <tr>
                                 <td>image</td>
                                 <td><img class="img-fluid" src="../public/images/product/<?=$product->image;?>" 
                                 alt="<?=$product->image;?>"></td>
                              </tr>
                              <tr>
                                 <td>qty</td>
                                 <td><?= $product->qty;?></td>
                              </tr>
                              <tr>
                                 <td>detail</td>
                                 <td><?= $product->detail;?></td>
                              </tr>
                              <tr>
                                 <td>description</td>
                                 <td><?= $product->description;?></td>
                              </tr>
                              <tr>
                                 <td>created_at</td>
                                 <td><?= $product->created_at;?></td>
                              </tr>
                              <tr>
                                 <td>created_by</td>
                                 <td><?= $product->created_by;?></td>
                              </tr>
                              <tr>
                                 <td>updated_at</td>
                                 <td><?= $product->updated_at;?></td>
                              </tr>
                              <tr>
                                 <td>updated_by</td>
                                 <td><?= $product->updated_by;?></td>
                              </tr>
                              <tr>
                                 <td>status</td>
                                 <td><?= $product->status;?></td>
                              </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>
