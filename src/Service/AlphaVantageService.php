<?php

namespace Parser\Service;

use AlphaVantage\Client;

class AlphaVantageService
{

    private const API_KEY = 'CJDV0XEMQ6HU5K8E';

    /** @var Client */
    protected $_alphaClient;

    public function __construct()
    {
        $this->_alphaClient = new Client(static::API_KEY);
    }

    public function getClient() : Client
    {
        return $this->_alphaClient;
    }
}