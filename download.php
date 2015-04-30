<?php
$list_file = $_GET['file'];
header('Content-disposition: attachment; filename='.$list_file);
header('Content-type: text/plain');
readfile('lists/'.$list_file);
?>
