<?php
include 'PageOfProduct.php';
$db = new PDO('mysql:dbname=commentaboutgoods;host=127.0.0.1;', 'root', 'root');

$stmnts = $db->prepare('SELECT * FROM comments');
$stmnts->execute();
$comments = $stmnts->fetchAll(PDO::FETCH_ASSOC);

foreach ($comments as $comment) {
    $statements = $db->prepare('SELECT * FROM photos WHERE id_comment = :id_comment');
    $statements->bindParam(':id_comment', $comment['id_comment']);
    $statements->execute();
    $photos = $statements->fetchAll(PDO::FETCH_ASSOC);
    $comment['photos'] = $photos;
    extract($comment);
    ob_start();
    include 'viewComment.php';
    $comment = ob_get_contents();
}

echo '<div id="comment_0"> </div>';





