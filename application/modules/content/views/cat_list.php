<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<form method="get" action="<?php echo base_url('content/cat_list') ?>" class="form-inline pull-right">
	<input type="text" name="keyword" class="form-control" placeholder="keyword">
	<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
</form>
<hr>
<div class="clearfix"></div>
<?php
if(!empty($msg)&&!empty($alert))
{
	msg($msg,$alert);
}
// $this->session->__set('link_js', base_url().'templates/admin/modules/user/js/script.js');
?>
<form method="post" action="<?php echo base_url('content/cat_list'); ?>">
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Title</th>
					<th><input id="selectAll" type="checkbox">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(!empty($data))
				{
					foreach ($data as $key => $value)
					{
						?>
						<tr data-id="<?php echo $value['id'] ?>">
							<td><?php echo $value['id'] ?></td>
							<td><img src="<?php echo image_module('content',$value['image']); ?>" class="img-thumbnail img-responsive formFile-clickable" style="cursor:pointer; object-fit: cover;width: 30px;height: 30px;"></td>
							<td><a href="<?php echo base_url('user/list_edit/'.$value['id']) ?>"><?php echo $value['title'] ?></a></td>
							<td><input type="checkbox" name="del_cat[]" value="<?php echo $value['id']; ?>"> <span class="glyphicon glyphicon-trash"></span></td>
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
						<button type="submit" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-trash"></span> DELETE
						</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</form>