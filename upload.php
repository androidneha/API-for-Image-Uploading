<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
$data = array();
$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES['filedata']['name']);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$uploadOk = 1;
$check = getimagesize($_FILES['filedata']['tmp_name']);

header('Content-Type: application/json');  
if ($check !== false) {  
//  echo json_encode(array('status' => $check['mime']));
  $uploadOk = 1;
} else {  
//  echo json_encode(array('status' => 'upload failed'));
  $uploadOk = 0;
}

if (file_exists($target_file)) {  
  echo json_encode(array('status' => 'file already exists'));
  $uploadOk = 0;
}

if ($uploadOk == 0) {  
  //
} else {
  if (move_uploaded_file($_FILES['filedata']['tmp_name'], $target_file)) {  
    echo json_encode(array('status' => basename($_FILES['filedata']['name']) . " has been uploaded",
    'file_url' => '/uploads/' . $_FILES['filedata']['name']));
  } else {
    echo json_encode(array('status' => 'upload failed. check permission please.'));
  }

}
}
else
{
	echo "error";
}