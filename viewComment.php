<?php
echo '<br><div><big>' . $nameUser . '</big>' . ' ' . '<small>' . $date . '</small></div>';
echo '<br><div><big>' . $rating . '★' . '</big></div>';
if (!empty($comment)) {
    echo '<br><div style="border: 2px solid grey; width: 1000px; border-radius: 10px; background: lightyellow; word-break: break-all;
padding-left:20px; padding-top:5px; padding-right:35px; padding-bottom:10px; ">' . $comment . '</div>';
}
foreach ($photos as $photo) {
    if (!empty($photo)) {
        echo '<img src="Photo/' . $photo['namePhoto'] . '" style="width: 50px">';
    }
}
echo '<br><br>';

