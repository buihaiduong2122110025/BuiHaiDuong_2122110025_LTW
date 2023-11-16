<?php

use App\Libraries\MyClass;

use App\Models\User;

$id = $_REQUEST['id'];
$user = User::find($id);
if ($user == NULL) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

    header("location:index.php?option=user");
}
?>
<?php require_once('../views/backend/header.php'); ?>
<<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="text-dark text-lg">CHI TIẾT THÀNH VIÊN</strong>
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
                        <a class="btn btn-sm btn-info" href="index.php?option=user">
                            <i class="fas fa-arrow-left"></i>Về danh sách
                        </a>


                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>Tên trường</th>
                        <th>Giá trị</th>
                    </tr>
                    <tr>
                        <td> id</td>
                        <td>
                            <?= $user->id; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Tên thành viên</td>
                        <td>
                            <?= $user->name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Email </td>
                        <td>
                            <?= $user->email; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> username </td>
                        <td>
                            <?= $user->username; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> password </td>
                        <td>
                            <?= $user->password; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> giới tính </td>
                        <td>
                            <?= $user->gender; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> phone </td>
                        <td>
                            <?= $user->phone; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> roles </td>
                        <td>
                            <?= $user->roles; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> address </td>
                        <td>
                            <?= $user->address; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>image</td>
                        <td><img class="img-fluid" src="../public/images/user/<?= $user->image; ?>" alt="<?= $user->image; ?>"></td>
                    </tr>
                    <td> Ngày tạo </td>
                    <td>
                        <?= $user->created_at; ?>
                    </td>
                    </tr>
                    <tr>
                        <td> Người tạo </td>
                        <td>
                            <?= $user->created_by; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Người cập nhật </td>
                        <td>
                            <?= $user->updated_by; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Ngày cập nhật </td>
                        <td>
                            <?= $user->updated_at; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Trạng thái </td>
                        <td>
                            <?= $user->status; ?>
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