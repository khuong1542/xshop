<?php 
// session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php'; 
$getListPostQuery = "SELECT * FROM `posts` order by id ASC";
$posts = executeQuery($getListPostQuery);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php require_once '../layouts/title_admin.php' ?></title>

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
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách baì viết</h6>
                            <a href="<?php echo BASE_ADMIN.'posts/add-form.php' ?>"
                                class="btn btn-primary add-form">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên bài viết</th>
                                            <th class="text-center">Ảnh</th>
                                            <th >Nội dung</th>
                                            <th class="text-center">Lượt xem</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($posts) > 0): ?>
                                        <?php 
                                                $stt = 1;
                                                foreach($posts as $post):?>
                                        <tr>
                                            <td><?= $post['id'] ?></td>
                                            <td><a href="<?=BASE_CLIENT.'pages/post-detail.php?id='.$post['id']?>"
                                                    style="text-decoration: underline;"><?= $post['title'] ?></a></td>
                                            <td class="text-center">
                                                <img src="<?=BASE.'dist/img/posts/'.$post['image'] ?>" alt="Ảnh bài viết" width="100">
                                            </td>
                                            <td width="400" ><?= substr($post['content'],0,100) ?>...</td>
                                            <td class="text-center">
                                                <?php if($post['view'] > 0): ?>
                                                <?= $post['view'] ?>
                                                <?php else : ?>
                                                <p>0</p>
                                                <?php endif ?>
                                            </td>
                                            <td class="text-center">
                                                <label class="custom-control custom-checkbox p-0 m-0 pointer "
                                                    style="cursor: pointer;">
                                                    <input type="checkbox" class="custom-control-input toggle-class"
                                                        data-id="<?= $post['id'] ?>" name="my_checkbox"
                                                        data-on="On" data-off="Off"
                                                        <?php echo $post['status']=='0' ? 'checked' : ''?>>
                                                    <span class="custom-control-indicator p-0 m-0 "></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo BASE_ADMIN . 'posts/edit-form.php'?>?id=<?php echo $post['id']; ?>"
                                                    class="fa fa-edit text-success p-1 btn-action"></a>
                                                <a onclick="return Delete()"
                                                    href="<?php echo BASE_ADMIN . 'posts/delete.php'?>?id=<?php echo $post['id']; ?>"
                                                    class="fas fa-trash text-danger p-1 btn-action"></a>

                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="10" class="text-center">Không tìm thấy bài viết nào !</td>
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