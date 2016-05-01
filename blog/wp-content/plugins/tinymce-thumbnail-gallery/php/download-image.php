<?php
ob_start();

$href = parse_url($_GET['href']);
$path = $href['path'];
$file = basename($path);


//echo $file;
header('Content-Disposition: attachment;filename="'.$file.'"');
$fp=fopen($_GET['href'],'r');
fpassthru($fp);
fclose($fp);
