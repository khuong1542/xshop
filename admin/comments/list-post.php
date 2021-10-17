<?php 
// session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php'; 
// $getListCommentQuery = "SELECT * FROM `comments` order by id ASC";
// $comment_posts = executeQuery($getListCommentQuery);


$selectAllCommentPost = "SELECT comment_posts.*, posts.title as post_title, posts.image as post_image, users.name as user_name, users.avatar as user_avatar
                    FROM comment_posts
                    INNER JOIN posts ON comment_posts.post_id = posts.id
                    INNER JOIN users ON comment_posts.user_id = users.id
                    order by id desc";
$comment_posts = executeQuery($selectAllCommentPost);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <?php require_once '../layouts/css.php'; ?>
</head>

<body id="page-top">

    <div id="wrapper">
        <?php require_once '../layouts/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require_once '../layouts/header.php'; ?>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách comment</h6>
                            <a href="<?php echo BASE_ADMIN.'comments/add-form.php' ?>"
                                class="btn btn-primary add-form">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="text-center">Ảnh bài viết</th>
                                            <th>Tên bài viết</th>
                                            <th class="text-center">Tên tài khoản</th>
                                            <th width="250">Nội dung</th>
                                            <th class="text-center">Ngày bình luận</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($comment_posts) > 0) : ?>
                                        <?php 
                                            $stt = 1;
                                            foreach($comment_posts as $comment_post):?>
                                        <tr>
                                            <td><?= $comment_post['id'] ?></td>
                                            <td class="text-center">
                                                <img width="70" src="../../dist/img/posts/<?= $comment_post['post_image'] ?>" alt="<?= $comment_post['post_image'] ?>">
                                            </td>
                                            <td class=""><?= $comment_post['post_title'] ?></td>
                                            <td class="text-center"><?= $comment_post['user_name'] ?></td>
                                            <td><?= $comment_post['content'] ?></td>
                                            <td class="text-center"><?= date('d-m-Y',strtotime($comment_post['created_at'])) ?></td>
                                            <!-- <td class="text-center">
                                                <label class="custom-control custom-checkbox p-0 m-0 pointer "
                                                    style="cursor: pointer;">
                                                    <input type="checkbox" class="custom-control-input toggle-class"
                                                        data-id="<?= $comment_post['id'] ?>" data-on="On" name="my_checkbox"
                                                        data-on="On" data-off="Off"
                                                        <?php echo $comment_post['status']=='0' ? 'checked' : ''?>>
                                                    <span class="custom-control-indicator p-0 m-0 "></span>
                                                </label>
                                            </td> -->
                                            <td class="text-center">
                                                <a onclick="return Delete()"
                                                    href="<?php echo BASE_ADMIN . 'comments/delete.php'?>?id=<?php echo $comment_post['id']; ?>"
                                                    class="fas fa-trash text-danger p-1 btn-action"></a>

                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="10" class="text-center">Không tìm thấy silde nào !</td>
                                        </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php require_once '../layouts/script.php';?>
    <script>
    $(document).ready(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? '0' : '1';
            var id = $(this).data('id');
            console.log(status, id)
            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'update-status.php',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(response) {
                    console.log(response);
                }
            });
        })
    });
    </script>

</body>

</html>