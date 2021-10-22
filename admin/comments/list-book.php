<?php 
// session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php'; 
// $getListCommentQuery = "SELECT * FROM `comments` order by id ASC";
// $comments = executeQuery($getListCommentQuery);


$selectAllComment = "SELECT comments.*, books.name as book_name, books.image as book_image, users.name as user_name, users.avatar as user_avatar
                    FROM comments
                    INNER JOIN books ON comments.book_id = books.id
                    INNER JOIN users ON comments.user_id = users.id
                    group by books.name
                    order by id desc";
$comments = executeQuery($selectAllComment);

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
                                            <th class="text-center">Ảnh sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th class="text-center">Tên tài khoản</th>
                                            <th width="240">Nội dung</th>
                                            <th class="text-center">Ngày bình luận</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($comments) > 0) : ?>
                                        <?php 
                                            $stt = 1;
                                            foreach($comments as $comment):?>
                                        <tr>
                                            <td><?= $comment['id'] ?></td>
                                            <td class="text-center">
                                                <a data-target="#list-comment-<?=$comment['id']?>"
                                                    data-toggle="modal">
                                                    <img width="50" src="<?=BASE.'dist/img/books/'.$comment['book_image'] ?>"
                                                        alt="<?= $comment['book_image'] ?>">
                                                </a>
                                                <div class="modal fade bd-example-modal-lg" id="list-comment-<?=$comment['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle"><?=$comment['book_name']?></h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""><a href="#list-comment"><?= $comment['book_name'] ?></a></td>
                                            <td class="text-center"><?= $comment['user_name'] ?></td>
                                            <td><?= $comment['content'] ?></td>
                                            <td class="text-center">
                                                <?= date('d-m-Y',strtotime($comment['created_at'])) ?></td>
                                            <!-- <td class="text-center">
                                                <label class="custom-control custom-checkbox p-0 m-0 pointer "
                                                    style="cursor: pointer;">
                                                    <input type="checkbox" class="custom-control-input toggle-class"
                                                        data-id="<?= $comment['id'] ?>" data-on="On" name="my_checkbox"
                                                        data-on="On" data-off="Off"
                                                        <?php echo $comment['status']=='0' ? 'checked' : ''?>>
                                                    <span class="custom-control-indicator p-0 m-0 "></span>
                                                </label>
                                            </td> -->
                                            <td class="text-center">
                                                <a onclick="return Delete()"
                                                    href="<?php echo BASE_ADMIN . 'comments/delete.php'?>?id=<?php echo $comment['id']; ?>"
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