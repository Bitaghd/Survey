<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-default btn-flat" href="./index.php?page=new_survey"></i>Добавить новый опрос</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover" id="list">
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">№</th>
						<th>Название</th>
						<th>Описание</th>
						<th>Начало</th>
						<th>Конец</th>
						<th>Действие</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM survey_set order by date(start_date) asc,date(end_date) asc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['title']) ?></b></td>
						<td><b class="truncate"><?php echo $row['description'] ?></b></td>
						<td><b><?php echo date("M d, Y",strtotime($row['start_date'])) ?></b></td>
						<td><b><?php echo date("M d, Y",strtotime($row['end_date'])) ?></b></td>
						<td class="text-center">
							<!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item" href="./index.php?page=edit_survey&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_survey" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
		                    </div> -->
		                    <div class="btn-group">
		                        <a href="./index.php?page=edit_survey&id=<?php echo $row['id'] ?>" class="btn btn-flat">
								Изменить
		                        </a>
		                        <a  href="./index.php?page=view_survey&id=<?php echo $row['id'] ?>" class="btn btn-flat">
								Посмотреть
		                        </a>
		                        <button type="button" class="btn btn-flat delete_survey" data-id="<?php echo $row['id'] ?>">
		                        Удалить
		                        </button>
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
	$('.delete_survey').click(function(){
	_conf("Вы уверены, что хотите удалить опрос?","delete_survey",[$(this).attr('data-id')])
	})
	})
	function delete_survey($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_survey',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Информация успешно удалена",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>