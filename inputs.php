<?php

global $service;

$controller = new \Parser\Controller\VantageTimeInterval($service);
$options = $controller->getOptions();


?>

<form id="stock-form">
    <label for="interval">Interval: </label>
    <select id="interval" name="interval">
        <?php foreach ($options as $option): ?>
            <option value="<?= $option ?>"><?= $option ?></option>
        <?php endforeach; ?>
    </select>
    <br />
    <label for="stock">Stock Code: </label>
    <input type="text" name="stock" id="stock" />
</form>
<button id="submit-csv">Get CSV</button>
<button id="submit-json">Get JSON</button>