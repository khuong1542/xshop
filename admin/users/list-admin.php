<?php 
// session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php'; 
$getListUserQuery = "SELECT * FROM `users` where role_id = 1 order by id ASC";
$users = executeQuery($getListUserQuery);

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
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản quản trị</h6>
                            <a href="<?php echo BASE_ADMIN.'users/add-form.php' ?>"
                                class="btn btn-primary add-form">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Họ và tên</th>
                                            <!-- <th>Tên tài khoản</th> -->
                                            <th>Ảnh</th>
                                            <th>Email</th>
                                            <th>Vai trò</th>
                                            <th>Ngày sinh</th>
                                            <th>Số điện thoại</th>
                                            <th>Ngày đăng ký</th>
                                            <!-- <th>Trạng thái</th> -->
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php if(count($users) > 0): ?>
                                        <?php 
                                                $stt = 1;
                                                foreach($users as $user):?>
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['name'] ?></td>
                                            <!-- <td><?= $user['username'] ?></td> -->
                                            <td>
                                                <img src="../../dist/img/users/<?=$user['avatar'] ?>" alt="Ảnh quản trị" width="70">
                                            </td>
                                            <td><?=$user['email']?></td>
                                            <td>Quản trị</td>
                                            <td>
                                                <?php if($user['birthday']!="0000-00-00"): ?>
                                                <?= date('d-m-Y',strtotime($user['birthday'])) ?>
                                                <?php else : ?>
                                                <p>Chưa xác định</p>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if($user['phone']!=""): ?>
                                                <?= date('d-m-Y',strtotime($user['phone'])) ?>
                                                <?php else : ?>
                                                <p>Chưa xác định</p>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?=date('d-m-Y',strtotime($user['created_at']))?>
                                            </td>
                                            <td>
                                                <a href="<?php echo BASE_ADMIN . 'users/edit-form.php'?>?id=<?php echo $user['id']; ?>"
                                                    class="fa fa-edit text-success p-1 btn-action"></a>
                                                <a href="<?php echo BASE_ADMIN . 'users/edit-admin.php?id='.$user['id']?>" onclick="return UPDATE_ADMIN()"
                                                    class="fa fa-arrow-circle-down text-warning p-1 btn-action"></a>
                                                <a href="<?php echo BASE_ADMIN . 'users/reset-password.php?id='.$user['id']?>"
                                                    class="fa fa-key text-warning p-1 btn-action"></a>
                                                <a onclick="return Delete()"
                                                    href="<?php echo BASE_ADMIN . 'users/delete.php'?>?id=<?php echo $user['id']; ?>"
                                                    class="fas fa-trash text-danger p-1 btn-action"></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="10">Không tìm thấy tài khoản bị khóa của khách hàng nào !</td>
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
    function UPDATE_ADMIN(){
        return confirm('Bạn chắc chắn muốn hạ bậc của quản trị viên này?');
    }
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