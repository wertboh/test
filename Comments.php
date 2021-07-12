<?php
include 'PageOfProduct.php';
$date = date("d-m-Y, h:i:s");
$db = new PDO('mysql:dbname=commentaboutgoods;host=127.0.0.1;', 'root', 'root');
$statements = $db->prepare('INSERT INTO comments (email, nameUser, rating, comment, date) 
VALUES (:email, :nameUser, :rating, :comment, :date)');
$statements->bindParam(':email', $_POST['email']);
$statements->bindParam(':nameUser', $_POST['nameUser']);
$statements->bindParam(':rating', $_POST['rating']);
$statements->bindParam(':comment', $_POST['comment']);
$statements->bindParam(':date', $date);
$statements->execute();

$stmnts = $db->prepare('SELECT * FROM comments');
$stmnts->execute();
$comments = $stmnts->fetchAll(PDO::FETCH_ASSOC);

foreach ($comments as $value) {
    extract($value);
    ob_start();
    include 'viewComment.php';
    $value = ob_get_contents();

}
//$statements1 = $db->prepare('SELECT MAX(id_comment) FROM comments');
//$statements1->execute();
//$lastID = $statements1->fetchAll(PDO::FETCH_ASSOC);



@copy($_FILES['picture']['tmp_name'], 'Photo/' . $_FILES['picture']['name']);


