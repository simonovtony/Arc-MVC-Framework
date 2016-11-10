<?php

require_once "../lib/autoload.php";

$application = new \Project\Lib\Application(config("setting"));
$application->run();

?>