<ul class="nav navbar-nav side-nav">
	<li>
		<a href="<?php echo base_url() ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
	</li>
	<li>
		<a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-user"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="user" class="collapse">
			<li>
				<a href="<?php echo base_url() ?>user/list">User List</a>
			</li>
			<li>
				<a href="<?php echo base_url() ?>user/list_edit">User Add</a>
			</li>
		</ul>
	</li>
</ul>