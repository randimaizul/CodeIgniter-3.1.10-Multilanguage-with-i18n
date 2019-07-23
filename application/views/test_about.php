<p>
<?php 
	if($this->lang->lang() == "en") {
		echo anchor($this->lang->switch_uri('id',$this->uri->uri_string()),'Muncul halaman indonesia');
	} else if($this->lang->lang() == "id"){
		echo anchor($this->lang->switch_uri('en',$this->uri->uri_string()),'Show English Page');
	}
	?>

	<br><br>

    <?php 
        echo lang('welcome')." <b>Randi Maizul</b>";
    ?>

    <br>

    <?='Language = <b>'.$this->lang->lang().'</b><br>';?>
    <?='Uri String = <b>'.$this->uri->uri_string().'</b>';?>
</p>
