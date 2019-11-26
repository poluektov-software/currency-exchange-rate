<?php namespace Poluektov\CurrencyExchangeRate;

use Poluektov\CurrencyExchangeRate\Interfaces\ApiInterface;

/**
 * Class ApiCurrency
 *
 * @package Poluektov\CurrencyExchangeRate
 */
class ApiCurrency extends CurrencySource
{
    /**
     *
     *
     * @var ApiInterface
     */
    protected $api;

    /**
     * CacheCurrency constructor.
     *
     * @param ApiInterface $api
     */
    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }

    /**
     *
     *
     * @param string $firstCurrency
     * @param string $secondCurrency
     * @return bool
     */
    protected function getFromApi(string $firstCurrency, string $secondCurrency)
    {
        // Here you need to do API request sending.

        // The current implementation is temporary.
        return rand(0, 1) ? rand(6667, 9999) / 100 : null;
    }

    /**
     * Get the exchange rate.
     *
     * @param string $firstCurrency
     * @param string $secondCurrency
     * @return float|null
     */
    public function getRate(string $firstCurrency, string $secondCurrency): ?float
    {
        return $this->getFromApi($firstCurrency, $secondCurrency);
    }
}
