<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$menu['title'] 						= "User Access";
	$menu['url']						= "#";
	$menu['icon'] 						= "check";
	$menu['access']						= "user-access-menu";
	$menu['sub_menu'] 					= array(
			  								array(
			  								"title" 	=> "User Access List",
			  								"url"		=> uri_link('user-access-list'),
			  								"icon"		=> "list",
											"access" 	=> "user-access-list"
			  								),
			  								array(
			  								"title" 	=> "Add User Access",
			  								"url"		=> uri_link('user-access-form'),
			  								"icon"		=> "plus",
											"access" 	=> "user-access-form"
			  								)
										);	
	menu($menu);
?>