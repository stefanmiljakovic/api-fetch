<?php

include "vendor/autoload.php";

$parser = new Parser\Helpers\MarketsDomParser(
    'https://www.investing.com/indices/usdollar-historical-data');

$parser->parseValues();

