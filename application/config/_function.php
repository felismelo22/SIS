<?php defined('BASEPATH') OR exit('No direct script access allowed');
function msg($msg = 'alert', $alert = 'default')
{
	?>
	<div class="alert alert-<?php echo $alert; ?>">
	  <strong><?php echo $alert; ?>!</strong> <?php echo $msg; ?>.
	</div>
	<?php
}