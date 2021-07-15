<?php
$date = date("Y-m-d H:i:s");
$db = new PDO('mysql:dbname=commentaboutgoods;host=127.0.0.1;', 'root', 'root');
$count = 0;
$jsonarray = [
    'emailFormat' => false,
    'emailEmpty' => false,
    'nameUserEmpty' => false,
    'nameUserSize' => false,
    'rating' => false,
    'comment' => false
];

if (!preg_match("/[0-9a-z]+@[a-z]/", $_POST['email'])) {
    $jsonarray['emailFormat'] = true;
    $count++;
}

if (empty($_POST['email'])) {
    $jsonarray['emailEmpty'] = true;
    $count++;
}

if (empty($_POST['nameUser'])) {
    $jsonarray['nameUserEmpty'] = true;
    $count++;
}

if (strlen($_POST['nameUser']) < 6) {
    $jsonarray['nameUserSize'] = true;
    $count++;
}

if (empty($_POST['rating'])) {
    $jsonarray['rating'] = true;
    $count++;
}

if (strlen($_POST['comment']) > 1000) {
    $jsonarray['comment'] = true;
    $count++;
}
if ($count > 0) {
    echo json_encode($jsonarray);
}

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
$data = include 'viewComment.php';
$comment = ob_get_contents();

echo json_encode(['data' => $data]);


