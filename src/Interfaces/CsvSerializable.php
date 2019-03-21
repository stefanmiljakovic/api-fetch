<?php

namespace Parser\Interfaces;

interface CsvSerializable
{
    public function csvSerialize() : string;
}