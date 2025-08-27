<?php
session_start();
$log_user = $_SESSION['username'];
$log_depart_session = $_SESSION['depart_mykapten'];
include_once("controller/controller_mysqli.php");
$push_data = $_POST['push_value'];
//echo ($push_data['id_key']); 
////bri////
$sql_user_va = "SELECT * FROM tb_daf_copy where key_fal = '".$push_data['id_key']."';"; //echo $sql_user_va;
$query_profile_va = mysqli_query($koneksi_daf,$sql_user_va);	
$result_profile = mysqli_fetch_assoc($query_profile_va);
////end////
/* if($result_profile['bayar'] == '600,001'){
$bayar = (str_replace(',', "", $result_profile['bayar']) - 1);
}else{ */
//}
echo $result_profile['tanggal'];
?>
<label>Nama</label>
    <div class="form-group">
        <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= $result_profile['tanggal']?>" disabled>		
    </div>
<label>Nama</label>
    <div class="form-group">
        <input type="text" class="form-control" name="nama_profile" id="nama_profile" value="<?= $result_profile['nama_lengkap']?>" disabled>		
    </div>
<label>Paket <code>Mbps</code></label>
    <div class="form-group">
        <input type="text" class="form-control" name="paket" id="paket" value="<?= $result_profile['paket_kapten']?>" disabled>
    </div>
<label>No. Whatsapp</label>
    <div class="form-group">
        <input type="text" id="no_wa" class="form-control" value="<?= $result_profile['no_wa'];?>" disabled>		
    </div>
<label>Alamat</label>
    <div class="form-group">
        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $result_profile['alamat']?>" disabled>		
    </div>
<label>foto ktp</label>
    <div class="form-group">
        <input type="text" class="form-control" name="foto_ktp" id="foto_ktp" value="<?= $result_profile['foto_ktp']?>" disabled>		
    </div>
<label>foto rumah</label>
    <div class="form-group">
        <input type="text" class="form-control" name="foto_rumah" id="foto_rumah" value="<?= $result_profile['foto_rumah']?>" disabled>		
    </div>	
<div class="col-auto">
    <a href="https://pendaftaran.kaptennaratel.com/Foto_KTP/<?php echo $result_profile['foto_ktp'];?>" target="_blank" class="btn btn-primary mb-3">Foto Rumah</a>
  </div>
<div class="col-auto">
    <a href="https://pendaftaran.kaptennaratel.com/Foto_Rumah/<?php echo $result_profile['foto_rumah'];?>" target="_blank" class="btn btn-primary mb-3">Foto Rumah</a>
  </div>

