<?php namespace Poluektov\CurrencyExchangeRate;

use Poluektov\CurrencyExchangeRate\Interfaces\CurrencySourceInterface;

/**
 * Class CurrencySource
 *
 * @package Poluektov\CurrencyExchangeRate
 */
abstract class CurrencySource implements CurrencySourceInterface
{
    /**
     *
     *
     * @var CurrencySourceInterface | null
     */
    protected $next = null;

    /**
     *
     *
     * @param CurrencySourceInterface $source
     * @return CurrencySourceInterface
     */
    public function setNext(CurrencySourceInterface $source)
    {
        $this->next = $source;

        return $source;
    }

    /**
     *
     *
     * @param string $firstCurrency
     * @param string $secondCurrency
     * @return float|null
     */
    public function getRate(string $firstCurrency, string $secondCurrency) : ?float
    {
        if ($this->next) {
            return $this->next->getRate($firstCurrency, $secondCurrency);
        }

        return null;
    }
}
