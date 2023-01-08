<?php
require __DIR__.'/vendor/autoload.php';

$logfile = 'log.txt';
$path = __DIR__.'/images/';
$image = $_GET['file'] ?? 'default.png';

file_put_contents($logfile, file_get_contents($logfile).date('d.m.Y H:i:s').' - '.$_SERVER['REMOTE_ADDR']. ' - '.$_SERVER['HTTP_USER_AGENT'].' @ '.$image."\n");

use Imagecow\Image;

Image::fromFile(is_file($path.$image) ? $path.$image : 'https://i.imgur.com/T19XMgm.jpg')->show();
