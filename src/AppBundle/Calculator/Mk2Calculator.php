<?php


namespace AppBundle\Calculator;


use AppBundle\Model\Change;

class Mk2Calculator implements CalculatorInterface
{
    /**
     * @inheritDoc
     */
    public function getSupportedModel(): string
    {
        return 'mk2';
    }

    /**
     * @inheritDoc
     */
    public function getChange(int $amount): ?Change
    {
        $cashDivision=[
            "bill10"=>10,
            "bill5"=>5,
            "coin2"=>2
        ];


        $change=new Change();

        $sum=0;
        foreach ($cashDivision as $property =>$value){
            while ($amount>=$value && $sum<$amount ){
                $remaining= $amount-$sum-$value;
                if($remaining<0 || ($remaining>0 && $this->getChange($remaining)===null)){
                    break;
                }
                $sum += $value;
                $change->{$property}++;
            }
        }

        return ($sum!==$amount)?null:$change;
    }

}
