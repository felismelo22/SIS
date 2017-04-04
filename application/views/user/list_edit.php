<?php defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php echo form_open();?>
	<div class="panel panel-default">
		<div class="panel panel-heading">
			<h4 class="panel-title">
				<?php echo 'Add '.$this->router->fetch_class(); ?>
			</h4>
		</div>
		<div class="panel panel-body">
			<?php
			echo form_label('Username', 'username');
			echo form_input(array(
				'name'     => 'username',
				'required' => 'required',
				'class'    => 'form-control'));
			echo form_label('Password', 'password');
			echo form_password(array(
				'name'     => 'password',
				'required' => 'required',
				'class'    => 'form-control'));
			echo form_label('Re-Type Password', 're-password');
			echo form_password(array(
				'name'     => 're-password',
				'required' => 'required',
				'class'    => 'form-control'));
			?>
		</div>
		<div class="panel panel-footer">
			<?php
			echo form_button(array(
        'name'    => 'submit',
        'id'      => 'submit',
        'value'   => 'true',
        'type'    => 'success',
        'content' => 'submit',
        'class'   => 'btn btn-success'));
			echo form_button(array(
        'name'    => 'reset',
        'id'      => 'reset',
        'value'   => 'true',
        'type'    => 'reset',
        'content' => 'reset',
        'class'   => 'btn btn-warning'));
			?>
		</div>
	</div>
<?php echo form_close();?>