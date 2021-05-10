<?php
include './../dulieu/kiemtradangnhap_ketoan.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> Hệ thống KTX Đại học Vinh </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="./../images/TDV.png" />
	<script type="text/javascript" src="../vendor/bootstrap.js"></script>
	<script type="text/javascript" src="../js/js_thongke_bien_lai.js"></script>
	<script type="text/javascript" src="../js/js_hien_thi_dang_tien.js"></script>
	<link rel="stylesheet" href="../vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/ad_css.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>

<body>
	<div class="container-fluid">
		<a href="index.php" title="">
			<div class="container-fluid">
				<div class="row anhbia  text-center">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<img class="img-responsive" src="../images/brand.PNG" alt="">
					</div>
				</div>
			</div>
		</a>
		<div class="container-fluid">
			<div class="row">
				<?php include 'menutrai1.php'; ?>
				<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10 benphai">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
							<h2>Quản lý thống kê biên lai</h2>
						</div>
					</div>
					<hr class="ngay_ad">
					<form action="./../dulieu/xuat_excel.php" id="" method="POST" role="form">
						<div class="row text-center">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">
								<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-justify">
									<label for="" class="form-control boviennha text-right">Tìm sinh viên ở từ ngày</label>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<input type="date" class="form-control" id="timkiem_bien_lai_ngay_batdau" name="timkiem_bien_lai_ngay_batdau" placeholder="Input field" style="    width: 45%; float:left">
									<label class="form-control boviennha" style=" width:3%; float: left">-</label>
									<input class="form-control" type="date" class=form-control id="timkiem_bien_laigngay_kethuc" name="timkiem_bien_laigngay_kethuc" placeholder="Input field" style="    width: 45%">
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<select name="timkiem_bien_lai_id_toanha" id="timkiem_bien_lai_id_toanha" class="form-control">
										<option value="">Chọn tòa nhà</option>
										<?php $qr = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha FROM toa_nha where toa_nha.xoa=0  order by toa_nha.ten_toa_nha");
										while ($r = mysqli_fetch_array($qr)) {

											echo " <option value='" . $r['id_toanha'] . "'>" . $r["ma_toa_nha"] . "-" . $r["ten_toa_nha"] . "</option>";
										}
										?>

									</select>
								</div>

								<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-left">
									<button type="button" id="tim_kiem_bien_lai" class="btn btn-primary">Tìm</button>
								</div>
							</div>
						</div>
					</form>
					<br>

					<div class="row">
						<!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="dulieu_o_phong"><?php include './../dulieu/dulieu_thongke_bien_lai.php'; ?></div>
						</div>

					</div>
				</div><!-- end thaydoi1 -->
			</div><!-- end noidungthaydoi -->
		</div> <!-- end col-9 -->
	</div> <!-- end row noi dung -->
	<br>
	<?php include 'foot.php'; ?>
	</div> <!-- end trang admin -->
</body>

</html>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});
</script>
<!-- thêm _o_phong mới -->