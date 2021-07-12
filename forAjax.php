<?php
//if (preg_match("/[0-9a-z]+@[a-z]/", $_POST['email'])) {
//    $jsonemailFormat = array('emaiFormat' => true);
//    if (!empty($_POST['email'])) {
//        $jsonemail = array('emailEmpty' => false);
//    } else $jsonemail = array('emailEmpty' => true);
//} else $jsonemailFormat = array('emaiFormat' => false);
//
//
//if (!empty($_POST['nameUser'])) {
//    $jsonname = array('nameUser' => false);
//    if (strlen($_POST['nameUser']) < 6) {
//        $jsonnameSize = array('nameUserSize' => false);
//    } else  $jsonnameSize = array('nameUserSize' => true);
//} else $jsonname = array('nameUser' => true);
//
//
//if (!empty($_POST['rating'])) {
//    $jsonrating = array('rating' => true);
//} else $jsonrating = array('rating' => false);
//
//
//if (strlen($_POST['comment']) < 1000) {
//    $jsoncomment = array('comment' => true);
//} else $jsoncomment = array('comment' => false);
//
//
//$jsonarray = array($jsonemailFormat, $jsonemail, $jsonname, $jsonnameSize, $jsonrating, $jsoncomment);
//
////foreach ($jsonarray as $value) {
//    echo json_encode($jsonarray);
////
////}