<?php
function thong_ke_hang_hoa() {
    $sql = "SELECT danhmuc.id, danhmuc.tendm,"
    . " COUNT(*) so_luong,"
    . " MIN(sanpham.gia) gia_min,"
    . " MAX(sanpham.gia) gia_max,"
    . " AVG(sanpham.gia) gia_avg"
    . " FROM sanpham "
    . " JOIN danhmuc ON danhmuc.id = sanpham.iddm "
    . " GROUP BY danhmuc.id, danhmuc.tendm ";
return pdo_query($sql);
}
?>