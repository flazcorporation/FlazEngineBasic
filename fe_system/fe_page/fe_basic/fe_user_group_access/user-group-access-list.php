<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
$idgroup                = uri_last();
$table['name']			= "fe_user_group_access";
$table['id']			= "user_access_f_id";
$table['module']		= "user-access";
$table['path'] 			= dirname( __FILE__ );
$table['modal']			= true;
$table['thead']			= array("No.","Akses","Description","Status","Action");
$table['width'] 		= array('5%','25%','30%','15%','15%');
$table['field'] 		= array("user_access_f_id","user_access_f_url","user_access_f_desc","user_group_access_f_status");
$table['add']			= false;
$table['import']		= false;
$table['export_view']	= false;
$table['export_table']	= false;
$table['button_edit']	= false;
$table['button_delete']	= false;
$table['back']			= "dashboard";
$table['back_button']	= true;
$table['back_title']	= "Dashboard";
$table['title']			= "User Group Access List";

$table['action'][0]['title']            = "Change Status";
$table['action'][0]['icon']             = "gear";
$table['action'][0]['url']              = "";
$table['action'][0]['type']             = "warning";
$table['action'][0]['function'] 		= "changestatus";
$table['action'][0]['access'] 			= array("Administrator");
$table['action'][0]['dropdown']         = FALSE;


$table['query']			= "
						SELECT
							user_access_f_id,
							user_access_f_url,
							user_access_f_desc,
							IF((user_group_access_f_status ='Inactive' || user_group_access_f_status is null),'Inactive','Active') as user_group_access_f_status
						FROM
							fe_user_access
                        LEFT JOIN
                            fe_user_group_access
                        ON
                            fe_user_access.user_access_f_id = fe_user_group_access.user_group_access_r_user_access_f_id
						LEFT JOIN
							fe_user_group
						ON
                            fe_user_group_access.user_group_access_r_user_group_f_id = fe_user_group.user_group_f_id
						WHERE
							user_group_access_r_user_group_f_id = :user_group_access_r_user_group_f_id
						";
$table['bind']['user_group_access_r_user_group_f_id']	= $idgroup;
table($table);
?>
<script>
	$(document).ready(function(){
		window.changestatus = function(id){
			$.ajax({
				type: 'POST',
				async: false,
				url: "<?php echo uri_link('user-group-access-process/'.$idgroup.'/');?>"+id,
				cache: false,
				dataType: 'json',
				success: function(res){
					if(res['status'] === 'success'){
						$("#<?php echo str_replace('-','',$table['module']).'_table';?>").DataTable().ajax.reload();
					}else{
						alert(res['message']);
					}
				}
			});	
		}
	});
</script>