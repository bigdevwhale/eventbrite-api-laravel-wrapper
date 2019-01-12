<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Cost extends AbstractEntity
{

    /**
     * The ISO 4217 3-character code of a currency
     *
     * @var string
     */
    public $currency;

    /**
     * The integer value of units of the minor unit of the currency (e.g. cents for US dollars)
     *
     * @var number
     */
    public $value;

    /**
     * You can get a value in the currency's major unit - for example, dollars or pound sterling - by taking the integer
     * value provided and shifting the decimal point left by the exponent value for that currency as defined in ISO 4217
     *
     * @var string
     */
    public $majorValue;

    /**
     * Provided for your convenience; its formatting may change depending on the locale you query the API with
     * (for example, commas for decimal separators in European locales).
     *
     * @var string
     */
    public $display;
}
