<?php
require_once 'prepare.php';
session_start();
require_once 'config.php';
require_once 'util.php';

if(!$_SESSION[config_get_session_key()]){
	header('location: ../login.php');
	exit;
}

$user = config_get_userdata(); 
