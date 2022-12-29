  <aside class="main-sidebar " style = "font-family: arial; !important" >
    <div class="dropdown" style = "color: red; !important">
   	<a href="javascript:void(0)" class="brand-link " data-toggle="dropdown" aria-expanded="true" style = "color: black; !important">
        <!-- <span class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center bg-primary text-white font-weight-500" style="width: 38px;height:50px"><?php echo strtoupper(substr($_SESSION['login_firstname'], 0,1).substr($_SESSION['login_lastname'], 0,1)) ?></span> -->
        <span class="brand-text "><?php echo ucwords($_SESSION['login_firstname']) ?></span>

      </a>
      <div class="dropdown-menu">
       
        <a class="dropdown-item" href="ajax.php?action=logout">Выйти</a>
      </div>
    </div>
    <div class="sidebar">
      <nav class="">
        <ul class="nav nav-pills flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-home" style = "color: black; margin-left: 50px; !important">
              <p>
                Главная
              </p>
            </a>
            
          </li>    
        <?php if($_SESSION['login_type'] == 1): ?>
          <li class="nav-item">
            <!-- <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Пользователи
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> -->
            <!-- <ul class="nav nav-treeview"> -->
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-new_user tree-item" style = "color: black; !important" >
                  <p>Добавить пользователя</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-user_list tree-item" style = "color: black; !important">
                  <p>Все пользователи</p>
                </a>
              </li>
            <!-- </ul> -->
          </li>
          <li class="nav-item">
            <!-- <a href="#" class="nav-link nav-is-tree nav-edit_survey nav-view_survey">
              <p>
                Опросы
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> -->
            <!-- <ul class="nav nav-treeview"> -->
              <li class="nav-item">
                <a href="./index.php?page=new_survey" class=" nav-new_survey tree-item" style = "color: black; !important">
                  <p>    Добавить опрос</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=survey_list" class=" nav-survey_list tree-item" style = "color: black; !important">
                  <p>    Все опросы</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./index.php?page=survey_report" class=" nav-survey_report" style = "color: black; !important">
              <p>
                Отчет опросов
              </p>
            </a>
          </li>     
        <?php else: ?>
          <li class="nav-item">
            <a href="./index.php?page=survey_widget" class="nav-survey_widget nav-answer_survey" style = "color: black; !important">
              <p>
                Список опросов
              </p>
            </a>
          </li>  
        <?php endif; ?>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
  		var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		if($('.nav-link.nav-'+page).length > 0){
  			$('.nav-link.nav-'+page).addClass('active')
          console.log($('.nav-link.nav-'+page).hasClass('tree-item'))
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
          $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
      $('.manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id='+$(this).attr('data-id'))
      })
  	})
  </script>