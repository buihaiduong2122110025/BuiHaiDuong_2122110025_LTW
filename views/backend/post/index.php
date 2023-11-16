<?php

use App\Models\Post;

$list = post::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();


$list = Post::join('topic', 'post.topic_id', '=', 'topic.id')
   ->where('post.status', '!=', 0)
   ->orderBy('post.created_at', 'desc')
   ->select("post.*", "topic.name as topic_name")
   ->get();

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=post&cat=create" method="post" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <strong class="text-dark text-lg">TẤT CẢ BÀI VIẾT</strong>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-sm-6">
                  <a href="index.php?option=brand&cat=all" class="btn btn-success btn-sm">  <i class="fas fa"></i>Tất Cả</a>

                     <a href="index.php?option=post&cat=trash" class="btn btn-danger btn-sm">
                     <i class="fas fa-trash"></i>  Thùng rác</a>
                  </div>

                  <div class="col-sm-6 text-right">
                     <a href="index.php?option=post&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
                  </div>
               </div>
            </div>
            <div class="card-body p-2">
               <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th class="text-center">Tiêu đề bài viết</th>
                        <th class="text-center">Tên chủ đề</th>
                        <th class="text-center">Chi tiết bài viết</th>
                        <th class="text-center" style="width:170px">Chức năng</th>
                        <th class="text-center" style="width:30px">ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $item) : ?>
                           <tr>
                              <td class="text-center">
                                 <input type="checkbox" />
                              </td>
                              <td class="text-center">
                                 <img src="../public/images/post/<?= $item->image; ?>" class="img-fluid" alt="hinh">
                              </td>
                              <td class="text-center">
                                 <?= $item->title; ?>
                              </td>
                              <td class="text-center">
                                 <div class="topic_name">
                                    <?= $item->topic_name; ?>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <?= $item->detail; ?>
                              </td>
                              <td class="text-center">
                                 <?php if ($item->status == 2) : ?>
                                    <a href="index.php?option=post&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                       <i class="fas fa-toggle-off"></i>
                                    </a>
                                 <?php else : ?>
                                    <a href="index.php?option=post&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                       <i class="fas fa-toggle-on"></i>
                                    </a>
                                 <?php endif; ?>
                                 <a href="index.php?option=post&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="far fa-eye"></i>
                                 </a>
                                 <a href="index.php?option=post&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                 </a>
                                 <a href="index.php?option=post&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                              <td class="text-center"><?= $item->id; ?></td>
                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </div>
   <!-- END CONTENT-->
   <?php require_once "../views/backend/footer.php"; ?>