
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>Admincp</title>
</head>
<?php
 session_start();//session luu tru du lieu su dung tren nhieu trang
 if(!isset($_SESSION['dangnhap'])){
 	header('Location:login.php');
 } 
?>
<body>
      <h3 class="title">Xin chào đến Admincp</h3>
      <div class="wrapper">
      <?php
      
           include("config/config.php");
           include("modules/header.php");
           include("modules/menu.php");
           include("modules/main.php");

    ?>
      </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script type="text/javascript">
   $(document).ready(function(){
   		thongke();
	    var char = new Morris.Bar({//hoac line hoac bar hoac donut
		
		  element: 'chart',// Chart data records -- each entry in this array corresponds to a point on
  // the chart.
		
		  xkey: 'date',//ten du lieu bieu dien o cot x
		 
		  ykeys: ['order','sales','quantity'],//ten du lieu bieu dien o cot y
		
		  labels: ['Số đơn hàng','Doanh thu', 'Số lượng bán ra']//ten cac gia tri hien ra trong cot
		});

		$('.select-date').change(function(){
            var thoigian = $(this).val();//lay gia tri cho thoi gian theo lua chon
            if(thoigian=='28ngay'){
                var text = '28 ngày qua';
            }else if(thoigian=='7ngay'){
                var text = '7 ngày qua';
            }else if(thoigian=='90ngay'){
                var text = '90 ngày qua';
            }else{
                var text = '365 ngày qua';
            }

             $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{thoigian:thoigian},//xu ly thoi gian
                    success:function(data)//neu gui du lieu di thanh cong 
                    {
                        char.setData(data);//dua du lieu vao bieu do
                        $('#text-date').text(text);//gui gia tri den text date o dasboar
                    }   
                });

        })
		 function thongke(){
                var text = '365 ngày qua';
                $('#text-date').text(text);
                $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
            }
	});
  </script>





</body>
</html>