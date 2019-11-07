<?php 
	$koneksi = mysqli_connect("localhost","root","","dbsaw_metode")or die("Not Connection");
	if(!$koneksi){
		echo"Gagal";
	}else{
		echo"Berhasil";
	}

 ?>

 <form>
	 <label>NIK</label>
 	<input type="text" name=""><br>
 	 <label>Nama Lengkap</label>
 	<input type="text" name=""><br>
 	 <label>Alamat</label>
 	<input type="text" name=""><br>

<?php 
	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_kriteria");
	while($data = mysqli_fetch_array($sql)){
		$kodeC= $data['kdc'];
 ?>
 	<label><?=$data['kriteria']?></label>
 	<select>
 	<?php
 		$sql2 = mysqli_query($koneksi,"SELECT * FROM tbl_nilai_kriteria WHERE kdc='$kodeC'");
 		while($data2=mysqli_fetch_array($sql2)){
 	?>
 		<option><?=$data2['keterangan']?></option>
 	<?php
		 }
 	?>
 	</select><br>
<?php 
	}
 ?>

 </form>


 <table border="1px">
 	<tr>
 		<td>nik</td>
 		<td>nama</td>
 		<td>alamat</td>
 		<?php
 			$sql3 = mysqli_query($koneksi,"SELECT * FROM tbl_kriteria");
 			while($d= mysqli_fetch_array($sql3)){
 		 ?>
 		<td><?=$d['kdc']?></td>
 		<?php 
 			}
 		 ?>
 	</tr>
 		<?php 
 			$sql4 = mysqli_query($koneksi,"SELECT * FROM tbl_warga");
 			while ($dd= mysqli_fetch_array($sql4)){
	 			$sql5 = mysqli_query($koneksi,"SELECT * FROM tbl_matrik WHERE nik='$dd[nik]'");
	 			$ddd = mysqli_fetch_array($sql5);
 		 ?>
 	<tr>
 		<td><?=$dd['nik']?></td>
 		<td><?=$dd['nama']?></td>
 		<td><?=$dd['alamat']?></td>
 		<td><?=$ddd['kriteria1_pekerjaan']?></td>
 		<td><?=$ddd['kriteria2_penghasilan']?></td>
 		<td><?=$ddd['kriteria3_jenis_rumah']?></td>
 	</tr>
 	<?php 
 		}
 	 ?>
 </table>