<?php namespace Poluektov\CurrencyExchangeRate;

use Poluektov\CurrencyExchangeRate\Interfaces\DBInterface;

/**
 * Class DBCurrency
 *
 * @package Poluektov\CurrencyExchangeRate
 */
class DBCurrency extends CurrencySource
{
    /**
     * A database component that implements the DBInterface.
     *
     * @var DBInterface
     */
    protected $db;

    /**
     * DBCurrency constructor.
     *
     * @param DBInterface $db
     */
    public function __construct(DBInterface $db)
    {
        $this->db = $db;
    }

    /**
     * Get the exchange rate from database.
     *
     * @param string $firstCurrency
     * @param string $secondCurrency
     * @return bool
     */
    protected function getFromDB(string $firstCurrency, string $secondCurrency)
    {
        // Here you need to do getting data from DB.
        // Use $this->db component to do this.

        // The current implementation is temporary.
        return rand(0, 1) ? rand(3334, 6666) / 100 : null;
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
        $rate = $this->getFromDB($firstCurrency, $secondCurrency);

        // If the data is not in the database.
        if (!$rate) {

            $rate = parent::getRate($firstCurrency, $secondCurrency);

            // Saving data in the database.
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
        // Here you need to do saving the data to the DB.
        // Use $this->db component to do this.
    }
}
