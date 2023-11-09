<?php
function getAllAccount($conn, $search, $sort, $startPage, $limit)
{
    $sql = "SELECT * FROM nguoidung where quyenTruyCap IN (0, 1)";
    if ($search != '') {
        $sql .= " and maNguoiDung = '" . $search . "'";
    }
    if ($sort == "asc" || $sort == "desc") {
        $sql .= " order by maNguoiDung " . $sort . "";
    }
    if ($sort == "0" || $sort == "1") {
        $sql .= " and quyenTruyCap = '" . $sort . "'";
    }
    if ($startPage != '') {
        $sql .= " limit " . $startPage . ", " . $limit . "";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function getOneAccount($conn, $idUser)
{
    $sql = "SELECT * FROM nguoidung where maNguoiDung = '" . $idUser . "' and quyenTruyCap IN (0, 1)";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function signIn($conn, $username, $password)
{
    $sql = "insert into nguoidung(tenTaiKhoan,matKhau) values ('" . $username . "','" . $password . "')";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function checkAccount($conn, $username, $password, $check)
{
    if ($check == 'login') {
        $sql = "select * from nguoidung where tenTaiKhoan = '" . $username . "' and matKhau = '" . $password . "'"; //Đúng
    }
    else if ($check == 'signIn') {
        $sql = "select * from nguoidung where tenTaiKhoan = '" . $username . "'"; //Đúng
    }
    $rs = mysqli_query($conn, $sql);
    return $rs;
}
?>