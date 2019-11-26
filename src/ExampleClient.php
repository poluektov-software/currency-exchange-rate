<?php namespace Poluektov\CurrencyExchangeRate;

use Poluektov\CurrencyExchangeRate\Facades\CurrencyFacade;
use Poluektov\CurrencyExchangeRate\Interfaces\ApiInterface;
use Poluektov\CurrencyExchangeRate\Interfaces\CacheInterface;
use Poluektov\CurrencyExchangeRate\Interfaces\DBInterface;

/**
 * Class ExampleClient
 *
 * @package Poluektov\CurrencyExchangeRate
 */
class ExampleClient
{
    /**
     * Client constructor.
     *
     */
    public function __construct()
    {
        // Somewhere in the client code, the following components are created.
        $cache = new class() implements CacheInterface {};
        $db = new class() implements DBInterface {};
        $api = new class() implements ApiInterface {};

        // ...

        // Somewhere in the client code, this facade is created.
        $currency = new CurrencyFacade($cache, $db, $api);

        // ...

        // Then, in any place of the project, you can inject this facade and work with the object.
        $this->example($currency);
    }

    /**
     * Client action.
     *
     * @param CurrencyFacade $currency
     */
    public function example(CurrencyFacade $currency)
    {
        // Injected facade for working with currencies.
        $rate = $currency->getExchangeRate('RUB', 'EUR')
            ?: 'не удалось получить';

        // ...
        echo("Курс указанной пары валют: $rate");
    }
}
