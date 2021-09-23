<?php 
session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php'; 
$getListProductQuery = "SELECT * FROM `sliders` order by id ASC";
$sliders = executeQuery($getListProductQuery);

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
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách slider</h6>
                            <a href="<?php echo BASE_ADMIN.'sliders/add-form.php' ?>"
                                class="btn btn-primary add-form">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Slide</th>
                                            <th class="text-center">Ảnh</th>
                                            <th class="text-center">Ngày đăng</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $stt = 1;
                                            foreach($sliders as $slide):?>
                                        <tr>
                                            <td><?= $slide['id'] ?></td>
                                            <td><?= $slide['name'] ?></td>
                                            <td class="text-center">
                                                <img src="<?=BASE?>/dist/img/sliders/<?= $slide['image'] ?>" alt="" width="100">
                                            </td>
                                            <td class="text-center"><?= date('Y-m-d',strtotime($slide['created_at'])) ?></td>
                                            <!-- <td>
                                                    <a href="https://fontawesome.com/v4.7/icons/" data-toggle="modal" data-target="#logoutModal">Click</a>
                                                </td> -->
                                            <td class="text-center">
                                                <label class="custom-control custom-checkbox p-0 m-0 pointer "
                                                    style="cursor: pointer;">
                                                    <input type="checkbox" class="custom-control-input toggle-class"
                                                        data-id="<?= $slide['id'] ?>" data-on="On" name="my_checkbox"
                                                        data-on="On" data-off="Off"
                                                        <?php echo $slide['status']=='0' ? 'checked' : ''?>>
                                                    <span class="custom-control-indicator p-0 m-0 "></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo BASE_ADMIN . 'sliders/edit-form.php'?>?id=<?php echo $slide['id']; ?>" class="fa fa-edit text-success p-1 btn-action"></a>
                                                <a onclick="return Delete()"
                                                    href="<?php echo BASE_ADMIN . 'sliders/delete.php'?>?id=<?php echo $slide['id']; ?>"
                                                    class="fas fa-trash text-danger p-1 btn-action"></a>

                                            </td>
                                        </tr>
                                        <?php endforeach ?>
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