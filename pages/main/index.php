<style type="text/css">
		a, a:link, a:visited, a:focus, a:hover, a:active{
        text-decoration:none;
      }
	</style>
<?php


$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 25";
$query_pro = mysqli_query($mysqli,$sql_pro);
?>
<h3>Sản Phẩm mới nhất</h3>
                <ul class="product_list">
                <?php
                    while ($row_pro = mysqli_fetch_array($query_pro)) {
                    ?>
                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>">
                        <p class="title_product"> Tên Sản Phẩm : <?php echo $row_pro['tensanpham']?> </p>
                        <p class="price_product"> Giá : <?php echo number_format($row_pro['giasp'],0,',','.').'đ';?></p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                    
                </ul>
