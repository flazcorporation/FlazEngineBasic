<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$menu['title'] 						= "User Group";
	$menu['url']						= "#";
	$menu['icon'] 						= "users";
	$menu['access']						= "user-group-menu";
	$menu['sub_menu'] 					= array(
			  								array(
			  								"title" 	=> "User Group List",
			  								"url"		=> uri_link('user-group-list'),
			  								"icon"		=> "list",
											"access" 	=> "user-group-list"
			  								),
			  								array(
			  								"title" 	=> "Add User Group",
			  								"url"		=> uri_link('user-group-form'),
			  								"icon"		=> "plus",
											"access" 	=> "user-group-form"
			  								)
										);	
	menu($menu);
?>