

<?php

use App\Models\Contact;
$id=$_REQUEST['id'];
$row =Contact::find($id);
$list = Contact::where('status', '!=', '0')->get();
?>
<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật</li>
                        </ol>
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
                        <div class="col-md-12 text-right">
                            <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=contact">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>


                        </div>
                    </div>

                </div>
                <div class="card-body">
          <div class="row">
            <input type="hidden" name="id" value="<?=$contact->id; ?>">
            <div class="col md-9">
              <div class="mb-3">
                <label for="name">Tên thương hiệu</label>
                <input name="name" id="name" type="text" value="<?=$contact->name; ?>" class="form-control" required placeholder="VD:Giày Nike">  
              </div>
              
            
              <div class="mb-3">
              <label for="status">Trạng thái</label>
              <select name="status" id="status" class="form-control">
                <option value="1" <?=($contact->status==1)?'selected':'';?>>Xuất bản</option>
                <option value="2" <?=($contact->status==2)?'selected':'';?>>Chưa xuất bản</option>
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
<!-- /.content-wrapper -->
<?php require_once('../views/backend/footer.php'); ?>