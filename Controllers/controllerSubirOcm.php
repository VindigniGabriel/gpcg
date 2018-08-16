<?php namespace Controllers;
$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
if (isset($_FILES['ocm'])){
if(in_array($_FILES['ocm']['type'], $mimes)){
	move_uploaded_file($_FILES['ocm']['tmp_name'], '../Upload/ocm.csv');
	echo "1";
 }else{
 	echo "2";
 	echo $_FILES['ocm']['type'];
 }
}

?>