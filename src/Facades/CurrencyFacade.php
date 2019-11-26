<?php namespace Poluektov\CurrencyExchangeRate\Facades;

use Poluektov\CurrencyExchangeRate\ApiCurrency;
use Poluektov\CurrencyExchangeRate\CacheCurrency;
use Poluektov\CurrencyExchangeRate\DBCurrency;
use Poluektov\CurrencyExchangeRate\Interfaces\ApiInterface;
use Poluektov\CurrencyExchangeRate\Interfaces\CacheInterface;
use Poluektov\CurrencyExchangeRate\Interfaces\DBInterface;

/**
 * Class CurrencyFacade
 *
 * @package Poluektov\CurrencyExchangeRate\Facades
 */
class CurrencyFacade
{
    /**
     * Source of exchange rate data.
     *
     * @var
     */
    private $source;

    /**
     * CurrencyFacade constructor.
     *
     * @param CacheInterface $cache
     * @param DBInterface $db
     */
    public function __construct(CacheInterface $cache, DBInterface $db, ApiInterface $api)
    {
        // All available data sources in the exchange rate.
        $cacheSource = new CacheCurrency($cache);
        $dbSource = new DBCurrency($db);
        $apiSource = new ApiCurrency($api);

        // Chain of Responsibility initialization.
        $cacheSource->setNext($dbSource)->setNext($apiSource);
        $this->source = $cacheSource;
    }

    /**
     * Get the exchange rate.
     *
     * @param string $firstCurrency First currency code
     * @param string $secondCurrency Second currency code
     * @return float
     */
    public function getExchangeRate(string $firstCurrency, string $secondCurrency) : ?float
    {
        return $this->source->getRate($firstCurrency, $secondCurrency);
    }
}
