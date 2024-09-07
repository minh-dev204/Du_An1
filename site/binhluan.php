<?php
include "../model/pdo.php";
include "../model/binhluan.php";
session_start();
$idproduct = $_REQUEST['idproduct'];
$listbl = loadall_binhluan($idproduct);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="form">
        <?php if (isset($_SESSION["user"])) {
            extract($_SESSION["user"]);
            ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idproduct" value="<?= $idproduct ?>">
                <input class="BL_text" name="noidung" type="text" placeholder="Nhập nội dung của bạn" required>
                <input class="Bl_submit" name="guibinhluan" type="submit" value="Gửi" >
            </form>
        <?php }
        else {
            echo '<div style="color:red;">Mời đăng nhập để đánh giá sản phẩm</div>';
        } ?>

        <?php
        if (isset($_POST["guibinhluan"]) && ($_POST["guibinhluan"])) {
            $noidung = $_POST['noidung'];
            $idproduct = $_POST['idproduct'];
            $iduser = $_SESSION['user']['idtk'];
            $ngaybinhluan = date('d/m/y');
            $tennguoidung = $_SESSION['user']['tentk'];
            $anhnguoidung = $_SESSION['user']['avatar'];
            insert_binhluan($noidung, $iduser, $idproduct, $ngaybinhluan, $tennguoidung, $anhnguoidung);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>

    <div class="form_danhGiaSP">

        <?php if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);
            $UPLOAD_AVATAR = "uploadUser/";
            foreach ($listbl as $bl) {
                extract($bl);
                $avatarUser = $UPLOAD_AVATAR . $anhnguoidung;
                ?>
                <div class="chat_user">
                    <div class="avatar_user">
                        <img width="50px" src="<?= $avatarUser ?>" alt="">
                    </div>

                    <div class="profile_user">
                        <div class="name_user">
                            <?= $tennguoidung ?>
                        </div>

                        <div class="star">
                            <i class="fa-solid fa-star fa-sm"></i>
                            <i class="fa-solid fa-star fa-sm"></i>
                            <i class="fa-solid fa-star fa-sm"></i>
                            <i class="fa-solid fa-star fa-sm"></i>
                            <i class="fa-solid fa-star fa-sm"></i>
                        </div>
                        <div class="Day_chat">
                            <?= $ngaybinhluan ?>
                        </div>

                        <div class="BL">
                            <b>Đánh Giá:</b>
                            <?= $noidung ?>
                        </div>
                    </div>
                </div>
            <?php }
        }else {
            // extract($_SESSION['user']);
            $UPLOAD_AVATAR = "uploadUser/";
            foreach ($listbl as $bl) {
                extract($bl);
                $avatarUser = $UPLOAD_AVATAR . $anhnguoidung;
                ?>
                <div class="chat_user">
                    <div class="avatar_user">
                        <img width="50px" src="<?= $avatarUser ?>" alt="">
                    </div>

                    <div class="profile_user">
                        <div class="name_user">
                            <?= $tennguoidung ?>
                        </div>

                        <div class="star">
                            <i class="fa-solid fa-star fa-sm"></i>
                            <i class="fa-solid fa-star fa-sm"></i>
                            <i class="fa-solid fa-star fa-sm"></i>
                            <i class="fa-solid fa-star fa-sm"></i>
                            <i class="fa-solid fa-star fa-sm"></i>
                        </div>
                        <div class="Day_chat">
                            <?= $ngaybinhluan ?>
                        </div>

                        <div class="BL">
                            <b>Đánh Giá:</b>
                            <?= $noidung ?>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>

    </div>
</body>

</html>