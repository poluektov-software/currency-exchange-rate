<?php namespace Poluektov\CurrencyExchangeRate;

use Poluektov\CurrencyExchangeRate\Interfaces\CacheInterface;

/**
 * Class CacheCurrency
 *
 * @package Poluektov\CurrencyExchangeRate
 */
class CacheCurrency extends CurrencySource
{
    /**
     * A cache component that implements the CacheInterface.
     *
     * @var CacheInterface
     */
    protected $cache;

    /**
     * CacheCurrency constructor.
     *
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Get the exchange rate from cache.
     *
     * @param string $firstCurrency
     * @param string $secondCurrency
     * @return bool
     */
    protected function getFromCache(string $firstCurrency, string $secondCurrency)
    {
        // Here you need to do getting the data from the cache.
        // Use $this->cache component to do this.

        // The current implementation is temporary.
        return rand(0, 1) ? rand(1, 3333) / 100 : null;
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
        $rate = $this->getFromCache($firstCurrency, $secondCurrency);

        // If the data is not in the cache.
        if (!$rate) {

            $rate = parent::getRate($firstCurrency, $secondCurrency);

            // Saving data in the cache.
            if ($rate) {
                $this->setRate($firstCurrency, $secondCurrency, $rate);
            }
        }

        return $rate;
    }

    /**
     * Save the exchange rate.
     *
     * @param string $firstCurrency
     * @param string $secondCurrency
     * @param float $rate
     */
    public function setRate(string $firstCurrency, string $secondCurrency, float $rate = 1): void
    {
        // Here you need to do saving the data to the cache.
        // Use $this->cache component to do this.
    }
}
