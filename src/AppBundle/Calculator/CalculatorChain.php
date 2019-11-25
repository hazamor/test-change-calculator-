<?php


namespace AppBundle\Calculator;


use \AppBundle\Calculator\CalculatorInterfac;

class CalculatorChain
{
    /**
     * @var array<CalculatorInterface>
     */
    protected $calculators=[];

    /**
     * @param CalculatorInterface $calculator
     */
    public function addCalculator(CalculatorInterface $calculator){
        $this->calculators[]=$calculator;
    }

    /**
     * @return array<CalculatorInterface>
     */
    public function getAllCalculators():array
    {
        return $this->calculators;
    }
}
