<?php
session_start();
if (isset($_SESSION['mssv']) && $_SESSION['kt_dangnhap_sv'] == 1 && isset($_SESSION['id_sinhvien'])) {
	//kiem tra có được quyền đang nhâp hay không
} else {
    header('location:./Admin/login.php');
	//header("location:./../admin/login");
}
?>
