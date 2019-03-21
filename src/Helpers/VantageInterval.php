<?php

namespace Parser\Helpers;

class VantageInterval
{
    /** @var \Closure */
    protected $_callback;

    /** @var string */
    protected $_value;

    public function __construct(string $value, \Closure $callback)
    {
        $this->_value = $value;
        $this->_callback = $callback;
    }

    public function getName()
    {
        return $this->_value;
    }

    public function execute()
    {
        return $this->_callback->call($this);
    }
}