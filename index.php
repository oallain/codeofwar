
<?php
error_reporting(E_ALL);

/* Autorise l'exécution infinie du script */
set_time_limit(0);

require_once 'autoload.php';

$main = new Main();

$main->init();
$main->authenticate();
$main->run();
$main->end();

?>
