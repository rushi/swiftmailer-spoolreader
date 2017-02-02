<?php
require_once dirname(__FILE__) . '/../vendor/autoload.php';
require_once dirname(__FILE__) . '/../src/SpoolReader.php';
require_once dirname(__FILE__) . '/../config/config.php';

$spoolReader = new SpoolReader(SPOOL_DIR);
if ($_GET['clear'] == 1) {
    $spoolReader->clear();
}
$messages = $spoolReader->run();
$response = json_encode($messages);

header("Content-type: application/json");
echo $response;
