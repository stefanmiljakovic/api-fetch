<?php

namespace Parser\Interfaces;

use Parser\Service\AlphaVantageService;

abstract class AbstractController
{
    /** @var AlphaVantageService */
    protected $_vantageService;

    public function __construct(AlphaVantageService $service)
    {
        $this->_vantageService = $service;
    }

    public abstract function execute($args);

}