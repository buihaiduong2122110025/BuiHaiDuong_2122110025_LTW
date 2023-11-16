<?php
use App\Models\Post;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc
$id = $_REQUEST['id'];
$post = Post::find($id);
if($post==null){
    header("location:index.php?option=post");
}

$list = post::where('status','=',0)->orderBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">CHI TIẾT BÀI VIẾT</strong>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a class="btn btn-sm btn-info" href="index.php?option=post">
                            <i class="fas fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
               <div class="card-body p-2">
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
                         <td><?= $post->id;?></td>
                     </tr>
                     <tr>
                         <td>topic_id</td>
                         <td><?= $post->topic_id;?></td>
                     </tr>
                     <tr>
                         <td>title</td>
                         <td><?= $post->title;?></td>
                     </tr>
                     <tr>
                         <td>slug</td>
                         <td><?= $post->slug;?></td>
                     </tr>
                     <tr>
                         <td>detail</td>
                         <td><?= $post->detail;?></td>
                     </tr>
                     <tr>
                                 <td>image</td>
                                 <td><img class="img-fluid" src="../public/images/post/<?=$post->image;?>" alt="<?=$post->image;?>"></td>
                              </tr>
                           <tr>
                     <tr>
                         <td>type</td>
                         <td><?= $post->type;?></td>
                     </tr>
                     <tr>
                         <td>description</td>
                         <td><?= $post->description;?></td>
                     </tr>
                     <tr>
                         <td>created_at</td>
                         <td><?= $post->created_at;?></td>
                     </tr>
                     <tr>
                         <td>created_by</td>
                         <td><?= $post->created_by;?></td>
                     </tr>
                     <tr>
                         <td>updated_at</td>
                         <td><?= $post->updated_at	;?></td>
                     </tr>
                     <tr>
                         <td>updated_by</td>
                         <td><?= $post->updated_by;?></td>
                     </tr>
                     <tr>
                         <td>status</td>
                         <td><?= $post->status;?></td>
                     </tr>


                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>