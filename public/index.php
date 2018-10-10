<?php
namespace Subtext\Autowiring;

try {
    $root = \realpath('..');
    require_once($root. '/vendor/autoload.php');
    $bootstrap = new Bootstrap($root);
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
