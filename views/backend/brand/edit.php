<?php

use App\Models\Brand;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$brand = Brand::find($id);
if ($brand == null) {
  header("location:index.php?option=brand");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <strong class="text-dark text-lg">CẬT NHẬT THƯƠNG HIỆU</strong>
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
                <i class="fas fa-save"></i> Lưu[Cật Nhật]
              </button>
              <a class="btn btn-sm btn-info" href="index.php?option=brand">
                <i class="fas fa-arrow-left"></i> Về danh sách
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <input type="hidden" name="id" value="<?= $brand->id; ?>">
            <div class="col md-9">
              <div class="mb-3">
                <label>Tên thương hiệu</label>
                <input name="name" id="name" type="text" value="<?= $brand->name; ?>" class="form-control">
              </div>
              <div class="mb-3">
                <label>Mô tả </label>
                <textarea name="description" id="description" class="form-control"><?= $brand->description; ?></textarea>
              </div>
              <div class="mb-3">
                <label>slug</label>
                <textarea name="slug" id="slug" class="form-control"><?= $brand->slug; ?></textarea>
              </div>
              <div class="mb-3">
                <label>Sắp Xếp</label>
                <select name="sort_order" class="form-control">
                  <option value="1">1</option>
                </select>
              </div>

            </div>
            <div class="col md-9">
          
              <div class="mb-3">
                <label>Hình ảnh</label>
                <input type="file" name="image" class="form-control">
                <img src="../public/images/brand/<?= $brand->image; ?>">
              </div>
              <div class="mb-3">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                  <option value="1" <?= ($brand->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                  <option value="2" <?= ($brand->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
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