  <?php
      foreach($_SESSION['menus'] as $m){
        $master[$m['parent']][$m['id_menu']]=$m;
      } 

      foreach($master[0] as $id=>$menu){
        if(isset($master[$id])){
          if(count($master[$id])>0){
            $menus[$id]['menu']=$menu;
            $menus[$id]['submenu']=$master[$id];
          }else{
            $menus[$id]['menu']=$menu;
          }
        }else{
          $menus[$id]['menu']=$menu;
        }
      }
   
   //dump($menus);exit;      
  ?>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/images/photo/<?php echo $_SESSION['userdata']['img']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['userdata']['nama'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>

        <?php 
          
          $output='';


          foreach($menus as $menu){
            if(isset($menu['submenu'])){
              $output.='<li class="treeview">
                            <a href="#">
                              '.$menu['menu']['icon'].'<span>'.$menu['menu']['title'].'</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>
                            <ul class="treeview-menu">';
              foreach($menu['submenu'] as $submenu){
                  $output.='<li><a href=# onclick=toMenu("'.$submenu['act'].'")><i class="fa  fa-caret-right"></i><span>'.$submenu['title'].'</span></a></li>';
              }
              $output.=" </ul>
                        </li>";
            }else{
               $output.='<li><a href=# onclick=toMenu("'.$menu['menu']['act'].'")>'.$menu['menu']['icon'].' <span>'.$menu['menu']['title'].'</span></a></li>';
            }
           
          }

        echo $output;
        ?>
        <li><a href="login"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
