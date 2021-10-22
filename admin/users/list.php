<?php 
// session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php'; 
$getListUserQuery = "SELECT * FROM `users` where role_id = 0 order by id ASC";
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
<style>
    .nav-tabs li a{
        /* text-align: center;
        color: #000;
        padding: 10px 10px 0 10px;
        border-top: 1px solid #bdbdbd;
        border-left: 1px solid #bdbdbd;
        border-right: 1px solid #bdbdbd;
        margin-top: 10px; */
    }
</style>
<body id="page-top">

    <div id="wrapper">
        <?php require_once '../layouts/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require_once '../layouts/header.php'; ?>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản khách hàng</h6>
                            <a href="<?php echo BASE_ADMIN.'authors/add-form.php' ?>"
                                class="btn btn-primary add-form">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <ul class="nav nav-pills flex-column flex-sm-row">
                                    <li class="nav-item"><a class="nav-link active"  data-toggle="tab" href="#home">Danh sách</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1">Tài khoản bị khóa</a></li>
                                </ul>

                                <div class="tab-content m-t-20">
                                    <div id="home" class="tab-pane active">
                                        <table class="table text-center" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <!-- <th>Họ và tên</th> -->
                                                    <th>Tên tài khoản</th>
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
                                            <tbody>
                                                <?php if(count($users) > 0): ?>
                                                <?php 
                                                $stt = 1;
                                                foreach($users as $user):?>
                                                <tr>
                                                    <td><?= $user['id'] ?></td>
                                                    <!-- <td><?= $user['name'] ?></td> -->
                                                    <td><?= $user['username'] ?></td>
                                                    <td>
                                                        <img src="<?=BASE.'dist/img/users/'.$user['avatar'] ?>" alt="Ảnh khách hàng"
                                                            width="70">
                                                    </td>
                                                    <td><?=$user['email']?></td>
                                                    <td>Khách hàng</td>
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
                                                        <a href="<?php echo BASE_ADMIN . 'users/edit-client.php?id='.$user['id']?>"
                                                            onclick="return UPDATE()"
                                                            class="fa fa-arrow-circle-up text-success p-1 btn-action"></a>
                                                        <a onclick="return Delete()"
                                                            href="<?php echo BASE_ADMIN . 'users/delete.php'?>?id=<?php echo $user['id']; ?>"
                                                            class="fas fa-lock text-danger p-1 btn-action"></a>

                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
                                                <?php else: ?>
                                                <tr>
                                                    <td colspan="10">Không tìm thấy tài khoản khách hàng nào !</td>
                                                </tr>
                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="menu1" class="tab-pane">
                                        <table class="table text-center" id="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <!-- <th>Họ và tên</th> -->
                                                    <th>Tên tài khoản</th>
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
                                            <tbody>
                                                <?php if(count($users) > 0): ?>
                                                <?php 
                                                $stt = 1;
                                                foreach($users as $user):?>
                                                <tr>
                                                    <td><?= $user['id'] ?></td>
                                                    <!-- <td><?= $user['name'] ?></td> -->
                                                    <td><?= $user['username'] ?></td>
                                                    <td>
                                                        <img src="<?= $user['avatar'] ?>" alt="Ảnh khách hàng"
                                                            width="70">
                                                    </td>
                                                    <td><?=$user['email']?></td>
                                                    <td>Khách hàng</td>
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
                                                        <a href="<?php echo BASE_ADMIN . 'users/edit-client.php?id='.$user['id']?>"
                                                            onclick="return UPDATE()"
                                                            class="fa fa-arrow-circle-up text-success p-1 btn-action"></a>
                                                        <a onclick="return Delete()"
                                                            href="<?php echo BASE_ADMIN . 'users/delete.php'?>?id=<?php echo $user['id']; ?>"
                                                            class="fas fa-lock text-danger p-1 btn-action"></a>

                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
                                                <?php else: ?>
                                                <tr>
                                                    <td colspan="10">Không tìm thấy tài khoản khách hàng nào !</td>
                                                </tr>
                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
    function UPDATE() {
        return confirm('Bạn chắc chắn muốn nâng bậc của tài khoản này?');
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