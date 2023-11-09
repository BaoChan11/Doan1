<?php
function getAllProduct($conn)
{
    $sql = "SELECT * FROM product";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function getOneProduct($conn,$idProduct)
{
    $sql = "SELECT * FROM product where idproduct = '".$idProduct."'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;
?>