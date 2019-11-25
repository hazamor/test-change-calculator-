<?php


namespace AppBundle\Registry;


use AppBundle\Calculator\CalculatorChain;
use AppBundle\Calculator\CalculatorInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CalculatorRegistry
 * Use to get a calculator by his name (string)
 *
 * @package AppBundle\Registry
 */
class CalculatorRegistry implements CalculatorRegistryInterface
{
    protected $calculatorChain;
    /**
     * CalculatorRegistry constructor.
     */
    public function __construct(CalculatorChain $calculatorChain)
    {
        $this->calculatorChain= $calculatorChain;
    }

    /**
     * @inheritDoc
     */
    public function getCalculatorFor(string $model): ?CalculatorInterface
    {
        foreach ($this->calculatorChain->getAllCalculators() as $calculator){
            /** @var \AppBundle\Calculator\CalculatorInterface $calculator*/
            if($calculator->getSupportedModel()===$model){
                return $calculator;
            }
        }

        throw new NotFoundHttpException('Model not found');

        return null;
    }

}
