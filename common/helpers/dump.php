<?php
function p($var){
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}
function pd($var){
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
	die('已完成dump操作并终止脚本');
}