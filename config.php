<?php 

function config_get_dir(){
	return "";
}

function config_get_session_key(){
	return "project-session-key";
}

function config_get_username(){
	return $_SESSION[config_get_session_key()];
}

function config_get_userdata(){
	return json_decode(file_get_contents(config_get_dir().'/users/'.config_get_username()),true);
}
