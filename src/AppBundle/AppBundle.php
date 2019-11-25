<?php

declare(strict_types=1);

namespace AppBundle;

use AppBundle\DependencyInjection\Compiler\CalculatorPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AppBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new CalculatorPass());
    }
}
