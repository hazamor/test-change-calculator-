<?php
namespace AppBundle\Converter;

use AppBundle\Registry\CalculatorRegistryInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CalculatorConvertor
 * Convert the name of the model to a calculator
 *
 * @package AppBundle\Converter
 */
class CalculatorConvertor implements ParamConverterInterface
{
    protected $calculatorRegistry;
    /**
     * CalculatorRegistryConvertor constructor.
     */
    public function __construct(CalculatorRegistryInterface $calculatorRegistry)
    {
        $this->calculatorRegistry=$calculatorRegistry;
    }

    /**
     * @inheritDoc
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        $modalParamName=$configuration->getOptions()['model']??'model';
        $model=$request->get($modalParamName);

        $calculator=$this->calculatorRegistry->getCalculatorFor($model);

        $request->attributes->set($configuration->getName(), $calculator);

        return true;
    }

    /**
     * @inheritDoc
     */
    public function supports(ParamConverter $configuration)
    {
        return !empty($configuration->getOptions()['model']);
    }

}
