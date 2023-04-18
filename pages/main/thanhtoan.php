<?php
session_start();
include("../../admincp/config/config.php");
require('../../carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;
    
$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0,9999);
$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date) VALUE('".$id_khachhang."','".$code_order."',1,'".$now."')";
$cart_query = mysqli_query($mysqli,$insert_cart);
if($cart_query){
    //them gio hang chi tiet
    foreach($_SESSION['cart'] as $key=>$value){
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_detail = "INSERT INTO tbl_cart_detail(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
        mysqli_query($mysqli, $insert_order_detail);
        $sql = "SELECT *FROM tbl_sanpham WHERE id_sanpham = '" . $id_sanpham . "' LIMIT 1 ";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        $soluongsauban = $row['soluong'] - $soluong;
        $sql_update = "UPDATE tbl_sanpham SET soluong = '".$soluongsauban."' WHERE id_sanpham = '" . $id_sanpham . "'";
        $queryl = mysqli_query($mysqli,$sql_update);

    }
}
unset($_SESSION['cart']);
header('Location:../../index.php?quanly=camon');
?>