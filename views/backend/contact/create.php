<?php

use App\Models\Contact;

$list = Contact::where('status', '!=', '0')->get();

?>
<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm liên hệ</h1    >
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
            <div class="col md-12 text-right">
              <button name="THEM" type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-save"></i> Lưu[Thêm]
              </button>
              <a class="btn btn-sm btn-info" href="index.php?option=contact">
                <i class="fas fa-arrow-left"></i> Quay về danh sách
              </a>
            </div>
          </div>
        </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name">TÊN KHÁCH HÀNG</label>
                                <input name="name" id="name" type="text" class="form-control"  placeholder="Nhập tên khách hàng ">
                            </div>
                            <div class="mb-3">
                                <label for="title">TIÊU ĐỀ</label>
                                <textarea name="title" id="title" class="form-control"  placeholder=" Nhập Tiêu đề"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email">email</label>
                                <textarea name="email" id="email" class="form-control" placeholder=" Nhập Email"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="phone">PHONE</label>
                                <textarea name="phone" id="phone" class="form-control" placeholder=" Nhập sdt" ></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="content">Chi Tiết </label>
                                <textarea name="content" id="detail" class="form-control"  placeholder=" Nhập chi tiết"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="mb-3">
                                <label for="replay_id">ID LIÊN HỆ</label>
                                <textarea name="replay_id" id="replay_id" class="form-control"  placeholder=" Nhập ID  "></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status">TRẠNG THÁI</label>
                                <select id="status" name="status" class="form-control"> 
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer-->

            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
</form>
<?php require_once('../views/backend/footer.php'); ?>