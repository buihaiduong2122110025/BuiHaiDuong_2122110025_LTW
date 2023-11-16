<?php

use App\Models\User;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$user = User::find($id);
if ($user == null) {
   header("location:index.php?option=user");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=customer&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">

                  <h1 class="d-inline">Cật Nhật Khách Hàng</h1>
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
                     <a class="btn btn-sm btn-success" href="index.php?option=customer">
                        <i class="fas fa-arrow-left"></i> Quay về danh sách
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $user->id; ?>" />
                        <label>Họ tên (*)</label>
                        <input type="text" value="<?= $user->name; ?>" name="name" id="name" placettder="Nhập họ tên" class="form-control" onkeydown="handle_slug(this.value);">

                     </div>
                     <div class="mb-3">
                        <label for="gender">Giới tính</label>
                        <select name="gender" id="gender" class="form-control">
                           <option value="1">Nam</option>
                           <option value="2">Nữ</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Email</label>
                        <input type="text" value="<?= $user->email; ?>" name="email" id="email" placettder="Nhập email" class="form-control" onkeydown="handle_slug(this.value);">

                     </div>
                     <div class="mb-3">
                        <label>Điện thoại</label>
                        <input type="text" value="<?= $user->phone; ?>" name="phone" id="phone" placettder="Nhập số điện thoại" class="form-control" onkeydown="handle_slug(this.value);">

                     </div>
                     <div class="mb-3">
                        <label>Địa chỉ</label>
                        <input type="text" value="<?= $user->address; ?>" name="address" id="address" placettder="Nhập địa chỉ" class="form-control" onkeydown="handle_slug(this.value);">

                     </div>

                     <div class="mb-3">
                        <label>Tên đăng nhập</label>
                        <input type="text" value="<?= $user->username; ?>" name="username" id="username" placettder="Nhập địa chỉ" class="form-control" onkeydown="handle_slug(this.value);">

                     </div>
                     <div class="mb-3">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control">

                     </div>
                     <div class="mb-3">
                        <label>Xác nhận mật khẩu</label>
                        <input type="password" name="password_re" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Quyền truy cập</label>
                        <input type="text" value="<?= $user->roles; ?>" name="roles" id="roles" placettder="Nhập địa chỉ" class="form-control" onkeydown="handle_slug(this.value);">

                     </div>
                  </div>
               </div>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">

            </div> -->
            <!-- /.card-footer-->
         </div>
         <!-- /.card -->

      </section>
      <!-- /.content -->
   </div>

</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>