<?php include('db_connect.php') ?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row" style = "font-family: arial; !important">
          <div class="  " >
            <div class="info-box">

              <div class="info-box-content">
                <span class="info-box-text">Всего пользователей</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM users where type = 3")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class=" col-md-2">
            <div class="info-box mb-3">

              <div class="info-box-content">
                <span class="info-box-text">Всего опросов</span>
                 <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM survey_set")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
      </div>

<?php else: ?>
	 <div class="">
          <!-- <div class="">
          	<div class="">
          		Добро пожаловать <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div> -->
      </div>
      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
             

              <div class="info-box-content">
                <span class="info-box-text">Пройденные опросы</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT distinct(survey_id) FROM answers  where user_id = {$_SESSION['login_id']}")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
      </div>
          
<?php endif; ?>
