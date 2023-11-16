<?php

use App\Models\Menu;

use App\Libraries\MyClass;

$id = $_REQUEST['id'];

$menu = Menu::find($id);

if ($menu == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header("location:index.php?option=menu");
}
?>
<?php require_once('../views/backend/header.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="text-dark text-lg">CHI TIẾT MENU</strong>
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
                        <a class="btn btn-sm btn-info" href="index.php?option=menu">
                            <i class="fas fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container_fluid">
              
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>Tên trường</th>
                                    <th>Giá trị</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td><?= $menu->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Tên Menu</td>
                                    <td><?= $menu->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Link</td>
                                    <td><?= $menu->link; ?></td>
                                </tr>
                                <tr>
                                    <td>table_id</td>
                                    <td><?= $menu->table_id; ?></td>
                                </tr>
                                <tr>
                                    <td>sort_order</td>
                                    <td><?= $menu->sort_order; ?></td>
                                </tr>
                                <tr>
                                    <td>parent_id</td>
                                    <td><?= $menu->parent_id; ?></td>
                                </tr>
                                <td>position</td>
                                <td><?= $menu->position; ?></td>
                                </tr>
                                </tr>

                                <td>level</td>
                                <td><?= $menu->level; ?></td>
                                </tr>
                                <tr>
                                    <td>Loại</td>
                                    <td><?= $menu->type; ?></td>
                                </tr>
                                <tr>
                                    <td>created_at</td>
                                    <td><?= $menu->created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>created_by</td>
                                    <td><?= $menu->created_by; ?></td>
                                </tr>
                                <tr>
                                    <td>updated_at</td>
                                    <td><?= $menu->updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>updated_by</td>
                                    <td><?= $menu->updated_by; ?></td>
                                </tr>
                                <tr>
                                    <td>status</td>
                                    <td><?= $menu->status; ?></td>
                                </tr>


                            </tbody>
                        </table>
                </div>

            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?php require_once('../views/backend/footer.php'); ?>