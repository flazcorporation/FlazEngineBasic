<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$menu['title'] 						= "User";
	$menu['url']						= "#";
	$menu['icon'] 						= "user";
	$menu['access']						= "user-menu";
	$menu['sub_menu'] 					= array(
			  								array(
			  								"title" 	=> "User List",
			  								"url"		=> uri_link('user-list'),
			  								"icon"		=> "list",
											"access" 	=> "user-list"
			  								),
			  								array(
			  								"title" 	=> "Add User",
			  								"url"		=> uri_link('user-form'),
			  								"icon"		=> "plus",
											"access" 	=> "user-form"
			  								)
										);	
	menu($menu);
?>