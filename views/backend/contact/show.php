<?php

use App\Models\Contact;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$contact = Contact::find($id);

?>
<?php require_once('../views/backend/header.php'); ?>
<<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <strong class="text-dark text-lg">CHI TIẾT LIÊN HỆ</strong>
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
                        <a class="btn btn-sm btn-info" href="index.php?option=contact">
                            <i class="fas fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="card-body">
              
              <table class="table table-bordered">
                             <tr>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                             </tr>
                             <tr>
                                <td> id</td>
                                <td> 
                                 <?=$contact->id;?>
                             </td>
                             </tr>
             
                             <tr>
                                 <td> Tên liên hệ</td>
                                 <td> 
                                  <?=$contact->name;?>
                              </td>
                              </tr>
                              <tr>
                                 <td> SDT liên hệ</td>
                                 <td> 
                                  <?=$contact->phone;?>
                              </td>
                              </tr>
                              <tr>
                                 <td> Email liên hệ</td>
                                 <td> 
                                  <?=$contact->name;?>
                              </td>
                              </tr>
                              <tr>
                                 <td> content liên hệ</td>
                                 <td> 
                                  <?=$contact->content;?>
                              </td>
                              </tr>
                              <tr>
                                 <td> Tiêu đề liên hệ</td>
                                 <td> 
                                  <?=$contact->title;?>
                              </td>
                              </tr>
                             <tr>
                                <td> Ngày tạo </td>
                                <td> 
                                 <?=$contact->created_at;?>
                             </td>
                             </tr>
                             <tr>
                                <td> Người tạo </td>
                                <td> 
                                 <?=$contact->created_by;?>
                             </td>
                             </tr>
                             <tr>
                                <td> Người cập nhật </td>
                                <td> 
                                 <?=$contact->updated_by;?>
                             </td>
                             </tr>
                             <tr>
                                <td> Ngày cập nhật </td>
                                <td> 
                                 <?=$contact->updated_at;?>
                             </td>
                             </tr>
                             <tr>
                                <td> Trạng thái </td>
                                <td> 
                                 <?=$contact->status;?>
                             </td>
                             </tr>
                         </table>
                         </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    <?php require_once('../views/backend/footer.php'); ?>