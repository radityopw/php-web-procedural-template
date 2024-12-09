<?php 

function util_get_user($username){
	return json_decode(file_get_contents(config_get_dir().'/users/'.$username),TRUE);
}

function util_set_user($username,$data){
	file_put_contents(config_get_dir().'/users/'.$username,json_encode($data));
}

function util_h_table($tbl_header,$tbl_hasil){
	if(!isset($tbl_header) || !isset($tbl_hasil)){
?>
		<p class="notice">tidak dapat menampilkan hasil query</p>
<?php
	}else{
?>
   <figure>
         <table>
                <thead>
                        <tr>
                                <?php foreach($tbl_header as $h): ?>
                                <th><?=$h?></th>
                                <?php endforeach;?>
                        </tr>
                </thead>
                <tbody>
                        <?php foreach($tbl_hasil as $row): ?>
                        <tr>
                                <?php foreach($tbl_header as $h): ?>
                                <td><?=$row[$h]?></td>
                                <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                </tbody>

        </table>
    </figure>
<?php 
	}
}


