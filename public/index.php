<?php
namespace Subtext\Autowiring;

try {
    require_once('../vendor/autoload.php');
    $bootstrap = new Bootstrap;
    $app = $bootstrap->getApplication();
    $app->execute();
} catch (\Throwable $err) {
    echo "<pre>";
    echo $err->getMessage();
    echo "\n";
    echo $err->getFile();
    echo ": ";
    echo $err->getLine();
    echo "\n";
    echo "</pre>";
}
