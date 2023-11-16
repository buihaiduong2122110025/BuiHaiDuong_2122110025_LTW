<?php

use App\Models\Product;
use App\Libraries\MyClass;

use App\Models\Category;
use App\Models\Brand;


$list_category = Category::where('status','!=',0)->orderBy('Created_at','DESC')->get();
$list_brand = Brand::where('status','!=',0)->orderBy('Created_at','DESC')->get();

$category_id_html ="";
$brand_id_html ="";

foreach ($list_category as $category)
{
   $category_id_html .="<option value ='$category->id'>$category->name</option>";
}
foreach ($list_brand as $brand)
{
   $brand_id_html .="<option value ='$brand->id'>$brand->name</option>";
}
$id = $_REQUEST['id'];
$product = Product::find($id);
if ($product == null) {
  header("location:index.php?option=product");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">

          <strong class="text-dark text-lg">CẬT NHẬT SẢN PHẨM </strong>
                      </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col md-12 text-right">
              <button name="CAPNHAT" type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-save"></i> Lưu[Cập nhật]
              </button>
              <a class="btn btn-sm btn-info" href="index.php?option=product">
                <i class="fas fa-arrow-left"></i> Về danh sách
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <input type="hidden" name="id" value="<?= $product->id; ?>">
            <div class="col md-9">
              <div class="mb-3">
                <label>Tên Sản Phẩm</label>
                <input name="name" id="name" type="text" value="<?= $product->name; ?>" class="form-control">
              </div>
              <div class="mb-3">
                <label>Mô tả </label>
                <textarea name="description" id="description" class="form-control"><?= $product->description; ?></textarea>
              </div>
              <div class="mb-3">
                <label>detail</label>
                <input type="text" value="<?= $product->detail; ?>" name="detail" class="form-control">
              </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label>slug</label>
                    <textarea name="slug" id="slug" class="form-control"><?= $product->slug; ?></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label>Danh mục (*)</label>
                      <select name="category_id" class="form-control">
                        <option value="">Chọn danh mục</option>
                        <?= $category_id_html; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label>Thương hiệu (*)</label>
                      <select name="brand_id" class="form-control">
                        <option value="">Chọn thương hiệu</option>
                        <?= $brand_id_html; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label>Giá bán (*)</label>
                  <input type="number" value="10000" min="10000" name="price" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Giá sale (*)</label>
                  <input type="number" value="10000" min="10000" name="pricesale" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Số Lượng</label>
                  <input type="number" value="1" min="1" name="qty" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Hình ảnh</label>
                  <input type="file" name="image" class="form-control">
                  <img src="../public/images/product/<?= $product->image; ?>">
                </div>
                <div class="mb-3">
                  <label for="status">Trạng thái</label>
                  <select name="status" id="status" class="form-control">
                    <option value="1" <?= ($product->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                    <option value="2" <?= ($product->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">

          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>