<?php
require __DIR__.'/vendor/autoload.php';

// making sure we don't fuck up the image contents
// with some fucken warning messages
error_reporting(0);
ini_set('display_errors', 0);

// set tha variaablzzz
$logfile = 'log.txt';
$path = dirname(__FILE__).'/images/';
$image = (!empty($_GET['file']) ? $_GET['file'] : 'default.png');

// save ip address & user agent
$log = file_get_contents($logfile);
$log .= date('d.m.Y H:i:s').' - '.$_SERVER['REMOTE_ADDR']. ' - '.$_SERVER['HTTP_USER_AGENT'].' @ '.$image."\n";
file_put_contents($logfile, $log);

// rendeeeer thaaa imaaaageee
use Imagecow\Image;

if (is_file($path.$image))
    Image::fromFile($path.$image)->show();
else
    Image::fromString(file_get_contents('https://i.imgur.com/T19XMgm.jpg'))->show();
