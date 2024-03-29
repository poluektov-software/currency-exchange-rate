<?php namespace Poluektov\CurrencyExchangeRate\Interfaces;

/**
 * Interface CurrencySourceInterface
 *
 * @package Poluektov\CurrencyExchangeRate\Interfaces
 */
interface CurrencySourceInterface
{
    /**
     * Get the exchange rate.
     *
     * @param string $firstCurrency First currency symbol
     * @param string $secondCurrency Second currency symbol
     * @return float|null
     */
    public function getRate(string $firstCurrency, string $secondCurrency): ?float;
}
