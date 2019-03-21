<?php
include "../vendor/autoload.php";

$service = new \Parser\Service\AlphaVantageService();

$code = isset($_GET['code']) && !empty($_GET['code']) ? $_GET['code'] : null;

$controller = new \Parser\Controller\VantageTimeInterval($service, $code);

$value = $controller->execute([
    'value' => $_GET['interval']
]);

if(!isset($_GET['type'])) {
    return;
}
else {
    $type = $_GET['type'];
    if($type == 'csv') {
        $out = fopen('php://output', 'w');
        $flat = [];

        array_walk_recursive($value, function($item) use (&$flat) {
            $flat[] = $item;
        });

        var_dump($flat);
        
        fputcsv($out, $flat);
        fclose($out);
    }
    else if ($type == 'json') {

    }
    else {
        return;
    }
}
