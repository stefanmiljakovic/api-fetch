<?php
include "../vendor/autoload.php";

$service = new \Parser\Service\AlphaVantageService();

$code = isset($_GET['code']) && !empty($_GET['code']) ? $_GET['code'] : null;
$interval = $_GET['interval'];
$time = (new DateTime())->format('d/m/Y H:i:s');

$controller = new \Parser\Controller\VantageTimeInterval($service, $code);

$value = $controller->execute([
    'value' => $interval
]);

if(!isset($_GET['type'])) {
    return;
}
else {
    $type = $_GET['type'];
    if($type == 'csv') {
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"$code - $interval ($time).csv\"");

        $keys = array_keys($value);

        $out = fopen('php://output', 'w');
        $csv = \League\Csv\Writer::createFromStream($out);
        $csv->setDelimiter(',');
        foreach($value[$keys[0]] as $entry) {
            $csv->insertOne(array($entry));
        }
        $csv->insertOne(['open', 'high', 'low', 'close', 'volume']);

        $csv->insertAll($value[$keys[1]]);
        fclose($out);
    }
    else if ($type == 'json') {
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"$code - $interval ($time).json\"");

        $out = fopen('php://output', 'w');
        fputs($out, json_encode($value));
        fclose($out);
    }
    else {
        return;
    }
}

?>

<script>window.location = "/"</script>
