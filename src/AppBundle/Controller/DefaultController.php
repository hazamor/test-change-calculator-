<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Calculator\CalculatorInterface;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Rest\Prefix("automaton")
 * @Rest\NamePrefix("change_")
 */
class DefaultController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/{model}/change/{amount}")
     * @ParamConverter("calculator", converter="calculator_converter", options={"model" = "model"})
     *
     * @return View
     */
    public function listAction(CalculatorInterface $calculator, int $amount)
    {
        if(!$calculator){
            throw $this->createNotFoundException('Model not found');
        }

        $view=$this->view(
            $calculator->getChange($amount)
        );

        return $view;
    }
}
