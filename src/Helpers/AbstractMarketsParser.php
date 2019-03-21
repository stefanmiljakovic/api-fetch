<?php

namespace Parser\Helpers;

use DateTime;

abstract class AbstractMarketsParser
{

    const DEFAULT_MONTH_SPAN = 1;
    const DATE_FORMAT = 'd.m.Y';

    /** @var DateTime */
    protected $_startDate;

    /** @var DateTime */
    protected $_endDate;

    public function __construct(DateTime $startDate = null, DateTime $endDate = null)
    {
        $this->_startDate = $startDate;
        $this->_endDate = $endDate;

        $this->setDates();
    }

    private function setDates() : void
    {
        try {
            if (!$this->_startDate)
                $this->_startDate = (new DateTime())->modify('-' . static::DEFAULT_MONTH_SPAN . ' month');
            if (!$this->_endDate)
                $this->_endDate = new DateTime();

        } catch(\Exception $exception) {
            var_dump("Error during constructor", $exception->getMessage());
        }
    }

    abstract protected function getCurrencyUrl() : string;

    public function setStartDate(DateTime $startDate) : void
    {
        $this->_startDate = $startDate;
    }

    public function setEndDate(DateTime $endDate) : void
    {
        $this->_endDate = $endDate;
    }

    public function getBuiltUrl() : string
    {
        return $this->getCurrencyUrl() . '/' . $this->_startDate->format(static::DATE_FORMAT) . '_' .
            $this->_endDate->format(static::DATE_FORMAT);
    }
}