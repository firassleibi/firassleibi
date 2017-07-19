<?php
$im = new imagick();
$im->setResolution(400, 400);
$im->readimage('firas.pdf');
$im->setCompressionQuality(100);
$num_pages = $im->getNumberImages();
for($i = 0;$i < $num_pages; $i++) {
    $im->setIteratorIndex($i);
    $im->setImageFormat('jpeg');
    $im->writeImage("thumb$i.jpg");
}
$im->clear();
$im->destroy();
?>