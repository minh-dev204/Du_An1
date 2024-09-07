<?php 
  include "site/head.php";
?>

<body>
<div class="main1">
        <div class="header">
            <div class="content1">
                <div class="all_ul1">
                    <ul class="ul_head1">
                        <li>Kênh người bán |</li>
                        <li>Tải ứng dụng |</li>
                        <li>Kết nối <i id="icon" class="fa-brands fa-facebook fa-sm"></i> <i id="icon"
                                class="fa-brands fa-instagram fa-sm"></i></li>
                    </ul>

                    <ul class="ul_head1" id="ul_head3">
                        <li><i class="fa-regular fa-bell fa-lg"></i> Thông báo</li>
                        <li><i class="fa-solid fa-headset fa-lg"></i> Hỗ trợ</li>
                        <?php if(isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                        } ?>
                        <li><?= "Xin Chào: ". $tentk ?></li>
                        <!-- <li><i class="fa-solid fa-globe fa-lg"></i> Tiếng việt <i
                                class="fa-solid fa-chevron-down fa-sm"></i></li> -->
                    </ul>
                </div>
            </div>
        </div>

        <div class="article_thanhtoan">
            <div class="main_header">
                <div class="picture1">
                    <ul class="ul_logo1">
                        <li class="i1"><i class="fa-solid fa-bag-shopping fa-2xl"></i></li>
                        <li><a class="name_logo1" href="index.php?act=index">Shoppe | Thanh Toán</a></li>
                    </ul>
                </div>
            </div>

            <div class="thongTin_nguoiNhan">
                <div class="tieuDe_thongtin">Thông Tin Người Nhận</div>
                <div class="form_main">
                    <?php if(isset($_SESSION["user"]) && ($_SESSION["user"])) {
                           extract($_SESSION["user"]);
                    ?>
                    <form action="">
                        <div class="form__row">
                            <label class="form__label">Họ Tên :</label>
                            <input class="form__input" type="text" value="<?= $tentk ?>">
                        </div>
                        <div class="form__row">
                            <label class="form__label">Điện Thoại :</label>
                            <input class="form__input" type="text" value="<?= $sdt ?>">
                        </div>
                        <div class="form__row">
                            <label class="form__label">Email :</label>
                            <input class="form__input" type="text" value="<?= $email ?>">
                        </div>
                        <div class="form__row">
                            <label class="form__label">Địa Chỉ :</label>
                            <input class="form__input" type="text" value="<?= $addres ?>">
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>

              <!-- sp -->
                      <div class="mainColum">
                        <div class="mucluc">
                            <div class="ML2">Sản Phẩm</div>
                            <div class="ML3"></div>
                            <div class="ML4">Đơn Giá</div>
                            <div class="ML5">Số Lượng</div>
                            <div class="ML6">Số Tiền</div>
                        </div>
        
                        <div id="main_messager">
                            <div id="thongBao_imageCart">
                                <img src="content/img/cart_trong.webp" alt="">
                            </div>
                        </div>
        
                        <div class="listSP">
                            <!-- <div class="list">
                                <div class="SP1"><input type="checkbox"></div>
                                <div class="SP2"><img width="80px" src="img/sp1.jpg" alt=""></div>
                                <div class="SP3">Áo Oversize nam form rộng nhung tăm dể mặc</div>
                                <div class="SP4">1.000.000</div>
                                <div class="SP5"><input type="number" value="1"></div>
                                <div class="SP6">2.000.000</div>
                                <div class="SP7"><button onclick="removeItem(' + i + ')>Xóa</button></div>
                            </div> -->
                        </div>
                    </div>
        
        
                </div>
        
                <div class="box_datHang">
                    <div class="item_datHang">
                        <div>Tổng Tiền : <span class="tongtien">0</span></div>
                        <button onclick="Mesenger_pay()">Đặt Hàng</button>
                    </div>
                </div>

                 <!--  -->
        <div id="Mesenger_thongBao" class="Mesenger_thongBao">
            <div class="icon_h3">
                <!-- <i class="fa-regular fa-circle-check"></i> -->
                <h3>Thông Báo</h3>
            </div>
            <div class="box_mesenger">
                <div class="icon_text">
                    <i class="fa-regular fa-circle-check"></i>
                    <div class="mesenger_Text">
                        Cảm ơn quý khác đã mua hàng của Bee Shop ^^.
                    </div>
                </div>
                <div class="pay_btn">
                    <button onclick="loadWhenClickOK()">ok</button>
                </div>
            </div>
        </div>

        <div id="overlay">
            <!-- overlay -->
        </div>
        <!--  -->

 <?php
  include "site/footer.php";
 ?>
    </div>
</body>
<style>
    .listSP {
        background-color: #fff;
    }
    .list {
        margin-bottom: 0px;
        height: 95px;
    }
    .mainColum {
        max-width: 1000px;
    }
    .SP7 {
        display: none;
    }
    .SP1 {
        display: none;
    } 
    .SP2 {
        margin-left: 10px;
    }
    .ML4{
        margin-left: 10px;
    }
    .ML5 {
        margin-left: 10px;
    }
    .ML6 {
        margin-left: 20px;
    }
    .box_datHang {
        margin-bottom: 15px;
    }
</style>
<script src="content/js/index.js"></script>
<script src="content/js/thanhtoan.js"></script>
</html>