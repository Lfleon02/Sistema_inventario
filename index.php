<?php
/**
 *  Application zanagess
 *
 * @package zanagess-application
 */
require 'includes/php/cnf.php';
$logueo = new login;

if (isset($_POST['acceso']) && $_POST['tot']=="1") {

	echo$logueo->acceso($_POST['username'], $_POST['password']);
	
}

$smarty->assign("Name", "Inicio");
$smarty->assign("Title", "Test");
$smarty->display('index.tpl');
