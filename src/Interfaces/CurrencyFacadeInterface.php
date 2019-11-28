<?php namespace Poluektov\CurrencyExchangeRate\Interfaces;

/**
 * Interface CurrencyFacadeInterface
 *
 * @package Poluektov\CurrencyExchangeRate\Interfaces
 */
interface CurrencyFacadeInterface
{
    /**
     * Get the exchange rate.
     *
     * @param string $firstCurrency First currency symbol
     * @param string $secondCurrency Second currency symbol
     * @return float|null
     */
    public function getExchangeRate(string $firstCurrency, string $secondCurrency): ?float;
}
