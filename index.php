<script src="dist/scripts/jquery.js"></script>
<script src="dist/scripts/main.js"></script>
<?php

include "vendor/autoload.php";

/** @var $service \Parser\Service\AlphaVantageService */
global $service;
$service = new \Parser\Service\AlphaVantageService();

include "inputs.php";



