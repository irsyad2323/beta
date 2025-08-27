<?php





include('controller.php');



   $action=$_POST['action'];



   $nama_gangguan=$_POST['nama_gangguan'];

   $tanggal_gangguan=$_POST['tanggal_gangguan'];

   $alamat_gangguan=$_POST['alamat_gangguan'];

   $jenis_gamas=$_POST['jenis_gamas'];

   $keterangan_gangguan=$_POST['keterangan_gangguan'];

   $pic_gamas=$_POST['pic_gamas'];

   $id=$_POST['id']; 
   
   $tanggal=$_POST['tanggal']; 
   
   


        //echo $nama_gangguan; die();



   // if($_POST['action']='edit'){

   //    $query=""

   // }else{

   //    $query="INSERT INTO pengguna VALUES ('$nama','$alamat','$telepon','$paket','$tgl','$val','$id','$pass','$ket')";

   //    echo $query;

   //    mysqli_query($conn,$query);

   // }
	function sendMessage($telegram_id, $message, $secret_token) {    
    /*
    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $post = [
     'chat_id' => $telegram_id,
     'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
     'text' => $message
    ];

    $url = $url . "&text=" . urlencode($message);    
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true          
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    //return(); */
    $method = "sendMessage";
    $url    = "https://api.telegram.org/bot" . $secret_token . "/". $method;
    $post = [
     'chat_id' => $telegram_id,
     'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
     'text' => $message
    ];

    $header = [
     "X-Requested-With: XMLHttpRequest",
     "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_REFERER, $refer);
    //curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $datas = curl_exec($ch);
    $error = curl_error($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
}


   if($action == "insert")

  {

//       $cekinsert="SELECT id_user FROM pengguna WHERE id_user ='$id'";

//       $cek = $conn->prepare($cekinsert);

//       $cek->execute();

//   \



//       if($cek->fetch(PDO::FETCH_ASSOC)){

//        echo "<div style='color:red'>Data gagal disimpan!</div>";

//       }







      /* $query="INSERT INTO tbl_fal VALUES ('','$nama','$alamat','$telepon','$paket_fal','$tgl_fal','$username_fal','$password_fal','$lain_lain','$kd_layananan','$latitude','$latitude','$longitude')"; */

       $query="INSERT INTO tbl_gamas (nama_gangguan, alamat_gangguan, tanggal_gangguan, jenis_gamas, keterangan_gangguan, pic_gamas) VALUES ('$nama_gangguan','$alamat_gangguan','$tanggal','$jenis_gamas', '$keterangan_gangguan','$pic_gamas');";
	   
	   $telegram_id = -645924017;
    //$telegram_id = $_POST[''];
//$message_text = 'a'//$_POST['pesan'];
$message = '📩 Gangguan Massal 📩 

<b>✔️ Nama Terdampak</b>
'.'💬 '.$nama_gangguan.'

<b>✔️ Alamat Gangguan</b>
'.'💬 '.$alamat_gangguan.'

<b>✔️ Jenis Gamas</b>
'.'💬 '. $jenis_gamas.'

<b>✔️ Keterangan Gangguan</b>
'.'💬 '. $keterangan_gangguan.'

<b>✔️ Pic Gamas</b>
'.'💬 '. $pic_gamas;

$secret_token = '5419466939:AAHADkNrQUDJ6Hiifvmygc2VD0yb3hf3W1E';
sendMessage($telegram_id, $message , $secret_token);
  }

  if($action == "edit")

  {

    $query = "UPDATE tbl_gamas SET nama_gangguan='$nama_gangguan', alamat_gangguan='$alamat_gangguan', jenis_gamas='$jenis_gamas', tanggal='$tanggal', keterangan_gangguan='$keterangan_gangguan', pic_gamas='$pic_gamas' WHERE id='$id'";

    

  }



   $statement = $conn->prepare($query);

   $statement->execute();









