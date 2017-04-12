<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<form method="post" action="" class="form-inline pull-right">
	<input type="text" name="search" class="form-control" placeholder="keyword">
	<button type="submit" name="submit_search" value="SEARCH" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
</form>
<hr>
<div class="clearfix"></div>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Created</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($data_user))
			{
				foreach ($data_user as $key => $value)
				{
					?>
					<tr data-id="<?php echo $value['id'] ?>">
						<td><?php echo $value['id'] ?></td>
						<td><a href="<?php echo base_url('user/list_edit/'.$value['id']) ?>"><?php echo $value['username'] ?></a></td>
						<td><?php echo $value['created'] ?></td>
						<td><input type="checkbox" name=""> <span class="glyphicon glyphicon-trash"></span></td>
					</tr>
					<?php
				}
			}else{
				?>
				<tr>
					<td colspan="4"><?php msg('data kosong', 'danger'); ?></td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td colspan="3">
					<?php
					 echo $pagination;
					 ?>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-trash"></span> DELETE
					</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>