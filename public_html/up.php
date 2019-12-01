<?php

include_once "config.php";
global $config;
$link = mysqli_connect("localhost", $config['dbLogin'], $config['dbPass'], $config['dbName']);

$query = mysqli_query($link, "CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) unsigned NOT NULL auto_increment,
    `user_login` varchar(30) NOT NULL,
    `user_password` varchar(32) NOT NULL,
    `user_hash` varchar(32) NOT NULL default '',
    `user_name` varchar(100) NOT NULL,
    PRIMARY KEY (`user_id`)
) DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;");