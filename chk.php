<?php
include "conn.php";

date_default_timezone_set('Asia/Bangkok');

if(isset($_FILES['img']) && isset($_POST['name'])){
    
    $ext = pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
    $allow = array("jpeg", "png", "jpg");

    
    if(in_array($ext,$allow)){
        
        $date = date("H-i-s-A-Y-m-d"); // ຊຶ່ົໄຟໃຫ້ເປັນວັນເດືອນປີ ເວລາປັດຈຸບັນເວລາອັບໂຫລດ
        $newfilename = $date . "." . $ext;

       $tmpname = $_FILES['img']['tmp_name'];
       $path = "upload/".$newfilename;
        if(move_uploaded_file($tmpname,$path)){
            $sql_insert =$conn->prepare("INSERT INTO upload (img,name)values('".$newfilename."','".$_POST['name']."')");
            $sql_insert->execute();

            if($sql_insert){
                echo json_encode(array("status" => "1", "msg" => "success"));
            }


        }
    }

}



?>