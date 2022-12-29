<?php include'db_connect.php' ?>
<div class="" style = "font-family: arial; !important">
	<div class="card-tools">
				<a class="btn   btn-default btn-flat " href="./index.php?page=new_user"> Добавить нового пользователя</a>
			</div>
	<div class="card card-outline ">
		<!-- <div class="card-header">
			<div class="card-tools">
				<a class="btn   btn-default btn-flat " href="./index.php?page=new_user"> Добавить нового пользователя</a>
			</div>
		</div> -->
		<div class="">
			<table class="table " id="list">
				<thead>
					<tr>
						<th class="text-center">№</th>
						<th>Имя</th>
						<th>Контакт №</th>
						<th>Роль</th>
						<th>Почта</th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$type = array('',"Админ","Сотрудник","Пользователь");
					$qry = $conn->query("SELECT *,concat(lastname,' ',firstname,' ') as name FROM users order by concat(lastname,' ',firstname,' ') asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td><b><?php echo $row['contact'] ?></b></td>
						<td><b><?php echo $type[$row['type']] ?></b></td>
						<td><b><?php echo $row['email'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default  btn-flat  dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Действие
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_user" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Посмотреть</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_user&id=<?php echo $row['id'] ?>">Изменить</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_user" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Удалить</a>
		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_user').click(function(){
		uni_modal("Информация пользователя","view_user.php?id="+$(this).attr('data-id'))
	})
	$('.delete_user').click(function(){
	_conf("Вы уверены, что хотите удалить пользователя?","delete_user",[$(this).attr('data-id')])
	})
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					// alert_toast("Информация успешно удалена",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>