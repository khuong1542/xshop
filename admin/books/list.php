<?php 
// session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php'; 
$getListAuthorQuery = "SELECT * FROM `books` order by id ASC";
// $selectAllBookFavorite = "SELECT b.*,c.name as author_name 
//                             from books b join authors c 
//                             on b.author_id = c.id where view > 0 order by view desc limit 10";
$selectAllBookFavorite = "  SELECT books.*, categories.name as cate_name, authors.name as author_name
                            FROM books
                            INNER JOIN categories ON books.cate_id = categories.id
                            INNER JOIN authors ON books.author_id = authors.id";
$books = executeQuery($selectAllBookFavorite);

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
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
                            <a href="<?php echo BASE_ADMIN.'books/add-form.php' ?>"
                                class="btn btn-primary add-form">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th class="">Danh mục</th>
                                            <th class="">Tác giả</th>
                                            <th class="text-center">Ảnh</th>
                                            <th class="text-center">Giá</th>
                                            <th class="text-center">Giảm giá</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $stt = 1;
                                            foreach($books as $book):?>
                                        <tr>
                                            <td><?= $book['id'] ?></td>
                                            <td>
                                                <a href="" style="text-decoration: underline;"><?= $book['name'] ?></a>
                                            </td>
                                            <td class=""><?= $book['cate_name'] ?></td>
                                            <td class=""><?= $book['author_name'] ?></td>
                                            <td class="text-center">
                                                <img src="<?= $book['image'] ?>" alt="Ảnh sản phẩm" width="70">
                                            </td>
                                            <td class="text-center"><?= number_format($book['price'],0,'',',') ?>đ</td>
                                            <td class="text-center"><?= number_format($book['sale'],0,'',',') ?>đ</td>
                                            <td class="text-center">
                                                <label class="custom-control custom-checkbox p-0 m-0 pointer "
                                                    style="cursor: pointer;">
                                                    <input type="checkbox" class="custom-control-input toggle-class"
                                                        data-id="<?= $book['id'] ?>" data-on="On" name="my_checkbox"
                                                        data-on="On" data-off="Off"
                                                        <?php echo $book['status']=='0' ? 'checked' : ''?>>
                                                    <span class="custom-control-indicator p-0 m-0 "></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo BASE_ADMIN . 'books/edit-form.php'?>?id=<?php echo $book['id']; ?>"
                                                    class="fa fa-edit text-success p-1 btn-action"></a>
                                                <a onclick="return Delete()"
                                                    href="<?php echo BASE_ADMIN . 'books/delete.php'?>?id=<?php echo $book['id']; ?>"
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