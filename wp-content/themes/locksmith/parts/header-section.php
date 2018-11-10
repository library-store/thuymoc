<?php 
$locksmith_menu_style = locksmith_get_option('locksmith_menu_style','corporate');

if(isset($_GET['header']) && $_GET['header'] ){
	$locksmith_menu_style = $_GET['header'];
}

if($locksmith_menu_style == 'simple') {
	get_template_part('parts/header-1');
}else{
	get_template_part('parts/header-2');
}