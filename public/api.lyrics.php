<?php
if(isset($_REQUEST['id'])){
$id = $_REQUEST["id"];
require_once '../inc/func.php';
require_once '../cfg.php';
echo '<pre>';
echo get_lyr($id);
echo '</pre>';
}
