<?php


namespace AppBundle\Calculator;


use AppBundle\Model\Change;

/**
 * Class Mk1Calculator
 * Change calculator supporting only coin1
 *
 * @package AppBundle\Calculator
 */
class Mk1Calculator implements CalculatorInterface
{
    /**
     * @inheritDoc
     */
    public function getSupportedModel(): string
    {
        return 'mk1';
    }

    /**
     * @inheritDoc
     */
    public function getChange(int $amount): ?Change
    {
        $change=  new Change();
        $change->coin1=$amount;

        return $change;
    }

}
