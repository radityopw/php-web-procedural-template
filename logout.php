<?php 
require 'prepare.php';
session_start();
require 'config.php';

$_SESSION[config_get_session_key()] = false;

header("Location: login.php?");
