
                <ul class="product_list">
                    <?php


$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC";
$query_pro = mysqli_query($mysqli,$sql_pro);
?>
                    <?php
                    while ($row_pro = mysqli_fetch_array($query_pro)) {
                    ?>
                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>">
                        <p class="title_product"> Tên Sản Phẩm : <?php echo $row_pro['tensanpham']?> </p>
                        <p class="price_product"> Giá : <?php echo number_format($row_pro['giasp'],0,',','.').'đ'?></p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>