<?php

namespace Parser\Controller;

use AlphaVantage\Resources\Stock;
use Parser\Helpers\VantageInterval;
use Parser\Service\AlphaVantageService;

class VantageTimeInterval extends \Parser\Interfaces\AbstractController
{
    /** @var VantageInterval[] */
    protected $_intervals;

    public function __construct(AlphaVantageService $service, string $stock = "GOOGL")
    {
        parent::__construct($service);
        $this->injectIntervals($stock);
    }

    protected function injectIntervals(string $stock) : void
    {
        $service = $this->_vantageService;

        $this->_intervals = [
            new VantageInterval('Monthly', function() use ($service, $stock){
                return $service->getClient()->stock()->monthly($stock,
                    Stock::OUTPUT_COMPACT, Stock::DATA_TYPE_JSON);
            }),
            new VantageInterval('Weekly', function() use ($service, $stock){
                return $service->getClient()->stock()->weekly($stock,
                    Stock::OUTPUT_COMPACT, Stock::DATA_TYPE_JSON);
            }),
            new VantageInterval('Daily', function() use ($service, $stock){
                return $service->getClient()->stock()->daily($stock,
                    Stock::OUTPUT_COMPACT, Stock::DATA_TYPE_JSON);
            }),
            new VantageInterval('Intraday - 1 hour', function() use ($service, $stock){
                return $service->getClient()->stock()->intraday($stock, Stock::INTERVAL_60MIN) ;
            }),
            new VantageInterval('Intraday - 30 minutes', function() use ($service, $stock){
                return $service->getClient()->stock()->intraday($stock, Stock::INTERVAL_30MIN);
            }),
            new VantageInterval('Intraday - 15 minutes', function() use ($service, $stock){
                return $service->getClient()->stock()->intraday($stock, Stock::INTERVAL_15MIN);
            }),
            new VantageInterval('Intraday - 5 minutes', function() use ($service, $stock){
                return $service->getClient()->stock()->intraday($stock, Stock::INTERVAL_5MIN);
            }),
            new VantageInterval('Intraday - 1 minute', function() use ($service, $stock){
                return $service->getClient()->stock()->intraday($stock, Stock::INTERVAL_1MIN);
            })
        ];
    }

    public function getOptions() : \ArrayObject
    {
        $options = new \ArrayObject();

        foreach($this->_intervals as $interval)
        {
            $options->append($interval->getName());
        }

        return $options;
    }

    public function execute($args)
    {
        $value = $args['value'];

        $found = null;

        foreach($this->_intervals as $interval){
            if($interval->getName() == $value){
                $found = $interval;
                break;
            }
        }

        if($found === null)
            return null;

        return $found->execute();
    }
}