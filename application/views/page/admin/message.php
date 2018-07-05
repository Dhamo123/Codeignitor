<?php
if($this->session->flashdata('msg')) {
  $message = $this->session->flashdata('msg');	  
  ?>

<div class="<?php echo $message['class']?>">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			<h4><i class="icon fa <?php echo $message['icon'] ?>"></i> Message!</h4>
			<?php echo $message['message']  ?>
		  </div>
<?php
}
?>
