<?php

namespace Parser\Helpers;

use Parser\Interfaces\CsvSerializable;
use JsonSerializable;
use PHPHtmlParser\Dom;

class MarketsDomParser implements JsonSerializable, CsvSerializable
{
    /** @var Dom */
    protected $_parser;

    /** @var string */
    protected $_url;

    public function __construct(string $url)
    {
        $this->_parser = new Dom;
        $this->_url = $url;
    }

    public function parseValues() : void
    {
        $this->_parser->loadFromUrl($this->_url);
        echo $this->_parser->find('.genTbl ');
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }

    public function csvSerialize(): string
    {
        // TODO: Implement csvSerialize() method.
    }
}