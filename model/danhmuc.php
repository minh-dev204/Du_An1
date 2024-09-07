<?php
function loadAll_danhmuc() {
    $sql = "SELECT * FROM danhmuc order by id DESC";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function insert_danhmuc($tendm) {
    $sql = "INSERT INTO danhmuc(tendm) VALUES('$tendm')";
    pdo_execute($sql);
}

function delete_danhmuc($id) {
    $sql = "DELETE FROM danhmuc WHERE id=".$id;
    pdo_execute($sql);
}

function loadOne_danhmuc($id) {
    $sql = "SELECT * FROM danhmuc WHERE id=".$id;
    $onedm = pdo_query_one($sql);
    return $onedm;
}

function update_danhmuc($tendm,$id) {
    $sql = "UPDATE danhmuc SET tendm='".$tendm."' WHERE id='".$id."' ";
    pdo_execute($sql);
}

?>