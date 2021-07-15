<?php
$data = '
<br><div><big>' . $nameUser . '</big>' . ' ' . '<small>' . $date . '</small></div>
<br><div><big>' . $rating . '★' . '</big></div>';
if (!empty($comment)) {
    $data = $data . '<br><div style="border: 2px solid grey; width: 1000px; border-radius: 10px; background: lightyellow; word-break: break-all;
padding-left:20px; padding-top:5px; padding-right:35px; padding-bottom:10px; ">' . $comment . '</div>';
}
foreach ($photos as $photo) {
    if (!empty($photo)) {
        $data = $data . '<html><body><img src="Photo/' . $photo['namePhoto'] . '" style="width: 50px" onclick = "openImageWindow(this.src);"></body></html>';
    }
}

$data = $data . '<br><br>';

return $data;

