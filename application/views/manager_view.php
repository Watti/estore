<?php
$display_name = $this->session->userdata('display_name');
if ( isset($display_name) &&!empty($display_name) ) :
?>
This is Manager's home page [ <a href="#"><?php echo $display_name; ?></a> ]
<?php endif; ?>

<br/>
<br/>
<a href="<?php echo base_url(); ?>user/logout">Logout</a>
<br/>
<a href="<?php echo base_url(); ?>">Back To Home</a>