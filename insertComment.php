<?php
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

$stmnts = $db->prepare('SELECT MAX(id_comment) as id_comment FROM comments');
$stmnts->execute();
$id_comment = $stmnts->fetchAll(PDO::FETCH_ASSOC);

$stmnts = $db->prepare('SELECT * FROM comments WHERE id_comment = :id_comment');
$stmnts->bindParam(':id_comment', $id_comment[0]['id_comment']);
$stmnts->execute();
$comment = $stmnts->fetchAll(PDO::FETCH_ASSOC)[0];

if (!empty($_FILES)) {
    foreach ($_FILES['picture']['name'] as $key => $value) {
        $statements2 = $db->prepare('INSERT INTO photos (namePhoto, id_comment) VALUES (:namePhoto, :id_comment)');
        $statements2->bindParam(':namePhoto', $value);
        $statements2->bindParam(':id_comment', $id_comment[0]['id_comment']);
        $statements2->execute();
        @copy($_FILES['picture']['tmp_name'][$key], 'Photo/' . $value);
    }
}
$_FILES = [];
$_POST = [];
$statements = $db->prepare('SELECT * FROM photos WHERE id_comment = :id_comment');
$statements->bindParam(':id_comment', $comment['id_comment']);
$statements->execute();
$photos = $statements->fetchAll(PDO::FETCH_ASSOC);
$comment['photos'] = $photos;
extract($comment);
ob_start();
include 'viewComment.php';
$comment = ob_get_contents();

