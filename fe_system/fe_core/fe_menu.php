<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
$query 					= "
						SELECT
							menu_main_f_id,
							menu_main_f_title as title,
							menu_main_f_url as url,
							menu_main_f_icon as icon,
							menu_main_f_group as access
						FROM
							fe_menu_main
						";
$menu_main			= pdo_query_array($query);
foreach($menu_main as $key => $value){
    foreach($value as $key1 => $value1){
        $group      = array();
        if($key1 == 'menu_main_f_id'){
            $id = $value1;
            continue;
        }elseif($key1 == 'access'){
            array_push($group,$value1);
            $menu[$key1] = $group;
        }else{
            $menu[$key1]  = $value1;
            $query1 					= "
                                    SELECT
                                        menu_sub_f_id,
                                        menu_sub_f_title,
                                        menu_sub_f_url,
                                        menu_sub_f_icon,
                                        menu_sub_r_menu_main_f_id,
                                        menu_sub_f_group
                                    FROM
                                        fe_menu_sub
                                    WHERE
                                        menu_sub_f_menu_main_f_id = '$id'
                                    ";
            $menu_sub			= pdo_query_array($query1);
        }
    }
    menu($menu);
}

?>