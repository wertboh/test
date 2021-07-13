<?php
//$jsonarray = [
//    'emaiFormat' => false,
//    'emailEmpty' => false,
//    'nameUserEmpty' => false,
//    'nameUserSize' => false,
//    'rating' => false,
//    'comment' => false
//];
//
//if (!preg_match("/[0-9a-z]+@[a-z]/", $_POST['email'])) {
//    $jsonarray['emaiFormat'] = true;
//}
//
//if (empty($_POST['email'])) {
//    $jsonarray['emailEmpty'] = true;
//}
//
//if (empty($_POST['nameUser'])) {
//    $jsonarray['nameUserEmpty'] = true;
//}
//
//if (strlen($_POST['nameUser']) < 6) {
//    $jsonarray['nameUserSize'] = true;
//}
//
//if (empty($_POST['rating'])) {
//    $jsonarray['rating'] = true;
//}
//
//if (strlen($_POST['comment']) > 1000) {
//    $jsonarray['comment'] = true;
//}
//
////echo json_encode($jsonarray);
//
