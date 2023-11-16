<?php
use App\Models\Post;
use App\Models\Topic;


$list = Post::join('topic', 'post.topic_id', '=', 'topic.id')
 ->where('post.status', '=', 0)
 ->orderBy('post.created_at', 'desc')
 ->select("post.*", "topic.name as topic_name")
 ->get();

?>

<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">THÙNG RÁC BÀI VIẾT</strong>
                   
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">  
            <div class="card">
            <div class="card-header ">
                <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6 text-right">
                  <a class="btn btn-sm btn-info" href="index.php?option=post">
                <i class="fas fa-arrow-left"></i> Về danh sách
              </a>
                  </button>
                  </div>
                </div>
               </div>
               <div class="card-body p-2">
               <?php require_once "../views/backend/message.php";?>
               <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th class="text-center" >Tiêu đề bài viết </th>
                                 <th class="text-center" >Têm chủ đề</th>
                                 <th class="text-center" >Chi tiết</th>
                                 <th class="text-center" style="width:170px">Chức năng</th>
                                 <th class="text-center" style="width:30px">ID</th>
                              </tr>
                           </thead>
                           <tbody>
                          <?php if(count($list) > 0) : ?>
                              <?php foreach($list as $item   ):?>
                              <tr class="datarow">  
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                 <img class="img-fluid" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>">                              </td>
                                 </td>
                                 <td class="text-center">
                                         <?= $item->title ; ?> 
                                 </td>
                                 <td class="text-center"><?= $item->topic_name ; ?> </td>
                                 <td class="text-center"><?= $item->detail?></td>
                                 <td class="text-center">
                                 <a href="index.php?option=post&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                                 <a href="index.php?option=post&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                                 </td>
                                 <td class="text-center" ><?= $item->id?></td>
                              </tr>
                              <?php endforeach;?>
                              <?php endif;?>
                           </tbody> 
                        </table>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>