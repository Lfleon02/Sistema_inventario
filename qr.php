<?php
/**
 *  Application zanagess
 *
 * @package zanagess-application
 */
require 'includes/php/cnf.php';

$smarty->assign("Name", "Inicio");
$smarty->assign("Title", "QR");
$smarty->display('qr.tpl');
