<?php
include "header.php";
?>

<div class="tieuDe">
    <h1>Thống Kê</h1>
</div>

<div class="table">
    <div class="thead">
        <div class="tr">
            <div class="th" style="width: 300px;">Loại Hàng</div>
            <div class="th" style="width: 100px;">Số Lượng</div>
            <div class="th" style="width: 300px;">Giá Thấp Nhất</div>
            <div class="th" style="width: 100px;">Giá Cao Nhất</div>
            <div class="th" style="width: 300px;">Giá Trung Bình</div>
        </div>
    </div>

    <div class="tbody">
        <?php

        foreach ($list_thongke as $tk) {
            extract($tk);
            ?>
            <div class="flex_tr">
                <div class="tr">
                    <div class="th" style="width: 300px;">
                        <?= $tendm ?>
                    </div>
                    <div class="th" style="width: 100px;">
                        <?= $so_luong ?>
                    </div>
                    <div class="th" style="width: 300px;">
                        <?= number_format($gia_min)?>
                    </div>
                    <div class="th" style="width: 100px;">
                        <?= $gia_max ?>
                    </div>
                    <div class="th" style="width: 300px; color:red;">
                        <?= number_format($gia_avg,0)?>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <button class="submit"><a href="index.php?act=bieu_do">Biểu Đồ</a></button>

</div>


</aside>


<?php
include "footer.php";
?>