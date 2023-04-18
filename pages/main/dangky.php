<?php
include("admincp/config/config.php");
	if(isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hovaten'];
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$matkhau = md5($_POST['matkhau']);
		$diachi = $_POST['diachi'];
		$sql = "SELECT  * FROM tbl_dangky WHERE email ='" .$email."' ";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count == 0){
		$sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
		if($sql_dangky){
			echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
			$_SESSION['dangky'] = $tenkhachhang;
			$_SESSION['email'] = $email;
			$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
			header('Location:index.php?quanly=giohang');
		}
	}
	else{
		echo '<p style="color:green">Email này đã tồn tại vui lòng đăng ký lại</p>';
	}
}
?>
<p>Đăng Ký Thành Viên</p>
<style type ="text/css">
    table.dangky tr td{
        padding: 5px;
    }
</style>
<form action="" method="POST">
<table class="dangky" border="1" width="50%" style="border-collapse: collapse;">
	<tr>
		<td  >Họ và tên</td>
		<td><input type="text" size="100%" name="hovaten"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" size="100%" name="email"></td>
	</tr>
	<tr>
		<td>Điện thoại</td>
		<td><input type="text" size="100%" name="dienthoai"></td>
	</tr>
	<tr>
		<td>Địa chỉ</td>
		<td><input type="text" size="100%" name="diachi"></td>
	</tr>
	<tr>
		<td>Mật khẩu</td>
		<td><input type="text" size="100%" name="matkhau"></td>
	</tr>
	<tr>
		
		<td><input type="submit" name="dangky" value="Đăng ký"></td>
		<td><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></td>
	</tr>
</table>

</form>