<?php
include './Modules/conn.php';
//include 'conn.php';
if (isset($_GET['toanha'])) {
    $selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha='$_GET[toanha]' AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
} elseif (isset($_GET['loaiphong'])) {
    $selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_loaiphong='$_GET[loaiphong]' AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
} elseif (isset($_GET['thietbi'])) {
    $selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong, loaiphongcothietbi WHERE phong.xoa=0 AND toa_nha.xoa=0 AND loaiphongcothietbi.idtb='$_GET[thietbi]' and loaiphongcothietbi.xoa=0 and loaiphongcothietbi.id_loaiphong= loai_phong.id_loaiphong AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
} else {
    $selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
}
if (!mysqli_num_rows($selecet_phong)) {
    echo "<div style='text-align: center;'> Ch??a c?? d??? li???u</div>";
} else {
?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <th style="text-align:center;">STT</th>
                    <th>T??a nh??</th>
                    <th>Ph??ng</th>
                    <th>T???ng</th>
                    <th>Lo???i ph??ng</th>
                    <th>??ang ??? </th>
                    <th>???? ???</th>
                    <th>Chuy???n<br>(l?????t)</th>
                    <th>Danh s??ch</th>
                    <th>Chi ti???t</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                while ($row_phong = mysqli_fetch_array($selecet_phong)) {
                    // ????m s??? sinh vi??n ??? trong phong
                    $slsinhvien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$row_phong[idphong]'"));
                    // ?????m s??? l?????ng sinh vi??n c???a t??a nh??
                    $sl_chuyen = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_sinhvien) AS sl_chuyen FROM phong, o_phong WHERE o_phong.ngay_ket_thuc is not NULL and o_phong.chuyenphong='1' AND phong.idphong='$row_phong[idphong]' AND phong.idphong=o_phong.id_phong"));
                    // ?????m s??? l?????ng sinh vi??n c???a t??a nh??
                    $sl_da_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) AS sl_da_o FROM phong, o_phong WHERE o_phong.ngay_ket_thuc is not NULL AND phong.idphong='$row_phong[idphong]' AND phong.idphong=o_phong.id_phong"));
                    echo "
			<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinthuong canhgiua'>$row_phong[ten_toa_nha]</td>
						<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
						<td class='canhgiua'>$row_phong[stt_tang]</td>
				<td class='chuinthuong'>$row_phong[ten_loai_phong]</td>"; ?>
                    <td class="canhgiua"><?php echo $slsinhvien['slsinhvien'] . "/" . $row_phong['sl_nguoi_o']; ?></td>
                    <td class="canhgiua"><?php echo $sl_da_o['sl_da_o']; ?></td>
                    <td class="canhgiua"><?php echo $sl_chuyen['sl_chuyen']; ?></td>
                    <td class="canhgiuanek12">
                        <a href="./Admin/Views/QuanLyThongKe/thongke_chuyenphong1.php?phongo=<?php echo $row_phong['idphong']; ?>" title="">
                            <input type="button" name="view" value="Danh s??ch" id="" class="btn btn-warning btn-xs" />
                        </a>
                    </td>
                    <td class="canhgiuanek12">
                        <input type="button" name="view" value="Chi  ti???t" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-success btn-xs view_chitietphong" />
                    </td>


                <?php echo "
			</tr>
			";
                    $stt++;
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
}
?>