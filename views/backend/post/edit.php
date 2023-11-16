<?php

use App\Models\Post;
use App\Models\Topic;

$list_topic = Topic::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();

$topic_id_html = "";

foreach ($list_topic as $topic) {
   $topic_id_html .= "<option value ='$topic->id'>$topic->name</option>";
}
$id = $_REQUEST['id'];
$post =  Post::find($id);
if ($post == null) {
   header("location:index.php?option=post");
}

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
               <strong class="text-dark text-lg">CẬT NHẬT BÀI VIẾT</strong>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=post" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button class="btn btn-sm btn-primary" type="submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu[Cập Nhật]
               </button>
            </div>
            <div class="card-body">

               <div class="row">
                  <div class="col-md-12">
                     <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $post->id; ?>" />
                        <label>Tiêu đề bài viết (*)</label>
                        <input type="text" value="<?= $post->title; ?>" name="title" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Kiểu mẫu (*)</label>
                        <input type="text" value="<?= $post->type; ?>" name="type" class="form-control">
                     </div>

                     <div class="mb-3">
                        <label>slug</label>
                        <textarea name="slug" id="slug" class="form-control"><?= $post->slug; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control"><?= $post->description; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết (*)</label>
                        <textarea name="detail" class="form-control"><?= $post->detail; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Chủ đề (*)</label>
                        <select name="topic_id" class="form-control">
                           <option value="">None</option>
                           <?= $topic_id_html; ?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1" <?= ($post->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                           <option value="2" <?= ($post->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>