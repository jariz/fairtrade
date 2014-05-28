<?php
use Fairtrade\Date;

Validator::extend('datepicker_format', function($attribute, $value, $parameters)
{
    return Date::validInputDateFormat($value);
});