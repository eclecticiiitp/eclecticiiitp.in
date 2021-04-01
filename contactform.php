<?php
 
$msg = '';
 
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && $_POST['name'] != "" && $_POST['email'] != "" && $_POST['message'] != "") {
   $msg = '<div class="alert alert-success">We will reach back to you.</div>';
   mail('eclecticiiitp@gmail.com',htmlentities($_POST['name']).' - via eclecticiiitp.in contact form',$_POST['message'],'From: '.htmlentities($_POST['email']));
} else {
   $msg = "";
}

echo json_encode(array('msg' => $msg));