<?php
// session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';

$id = $_GET['id'];
$selectPost = "SELECT * FROM posts WHERE id = $id";
$result = executeQuery($selectPost, false);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $updated_at = date('Y-m-d H:i:s');
    $file = $_FILES['image'];
    require_once '../validate/posts/validate-add.php';
    if (!$error) {

        $updatePostQuery = "UPDATE `posts` SET `title`='$title',`slug`='$slug',`content`='$content',`status`='$status',`updated_at`='$updated_at'";
        $name_image = "";
        if($file['size'] > 0){
            $name_image = uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'],'../../dist/img/posts/' . $name_image);
            $filename = BASE.'dist/img/posts/' .$name_image;
            $updatePostQuery .= ", image = '$filename'";
        }

        $updatePostQuery .= "where id = $id";
        executeQuery($updatePostQuery);

        header('location:' . BASE_ADMIN . 'posts/list.php'); 
    }
}
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
                            <h6 class="m-0 font-weight-bold text-primary">Sửa slider</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="add-form__title col-md-6">
                                            <label for="">Tên bài viết</label>
                                            <input type="text" class="form-control" id="name" name="title"
                                                placeholder="Tên bài viết" value="<?php echo $result['title'] ?>">
                                            <?php if (isset($error['title'])) : ?>
                                            <p class="text-danger"><?= $error['title'] ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="add-form__slug col-md-6">
                                            <label for="">Đường dẫn</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="Đường dẫn" value="<?php echo $result['slug'] ?>">
                                            <?php if (isset($error['slug'])) : ?>
                                            <p class="text-danger"><?= $error['slug'] ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row m-t-10">
                                        <div class="add-form__image col-md-6">
                                            <label for="">Ảnh</label>
                                            <input type="file" class="form-control" name="image">
                                            <img src="<?php echo $result['image'] ?>" width="200" alt="">
                                            <?php if (isset($error['image'])) : ?>
                                            <p class="text-danger"><?= $error['image'] ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="add-form__status col-md-6">
                                            <label for="">Trạng thái</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="0" <?php if ($result['status']==0) {echo "selected";}?>>
                                                    Hiển
                                                    thị</option>
                                                <option value="1" <?php if ($result['status']==1) {echo "selected";}?>>
                                                    Ẩn
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="add-form__content m-t-10">
                                        <label for="">Giới thiệu tác giả</label>
                                        <textarea name="content" id="editor1" cols="30" rows="10" class="form-control"
                                            placeholder="Giới thiệu tác giả">
                                            <?php echo $result['content'] ?>
                                        </textarea>
                                    </div>
                                    <?php if (isset($error['content'])) : ?>
                                    <p class="text-danger"><?= $error['content'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__image m-t-10">
                                        <button class="btn btn-primary" name="submit">Lưu</button>
                                    </div>
                                </form>
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

    <?php require_once '../layouts/script.php'; ?>

</body>

</html>