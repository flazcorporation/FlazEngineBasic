<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
  function menu_header($menu){
    if(in_array($menu['access'],$_SESSION['access'])){
      ?>
		<li>
			<a href="<?php echo $menu['url']; ?>">
				<i class="fa fa-<?php echo $menu['icon']; ?>"></i>
				<span><?php echo $menu['title']; ?></span>
			</a>
        </li>    
      <?php
    }
  }
  
  function sub_menu($title,$url,$icon,$access){
    if(in_array($access,$_SESSION['access'])){
      ?>
          <li><a href="<?php echo $url; ?>"><i class="fa fa-<?php echo $icon; ?>"></i> <?php echo $title; ?></a></li>
      <?php      
    }
  }

  function menu($menu){
    if(in_array($menu['access'],$_SESSION['access'])){
      ?>
        <li class="treeview">
          <a href="<?php echo $menu['url']; ?>">
            <i class="fa fa-<?php echo $menu['icon']; ?>"></i>
              <span><?php echo $menu['title']; ?></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <?php
              foreach($menu['sub_menu'] as $key => $val){
                sub_menu($menu['sub_menu'][$key]['title'],$menu['sub_menu'][$key]['url'],$menu['sub_menu'][$key]['icon'],$menu['sub_menu'][$key]['access']);
              }
            ?>
          </ul>
        </li>
      <?php      
    }  
  }
?>