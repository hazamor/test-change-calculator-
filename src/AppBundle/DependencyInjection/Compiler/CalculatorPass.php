<?php


namespace AppBundle\DependencyInjection\Compiler;


use AppBundle\Calculator\CalculatorChain;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class CalculatorPass
 * Add all calculator models to the calculator chain
 *
 * @package AppBundle\DependencyInjection\Compiler
 */
class CalculatorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->findDefinition(CalculatorChain::class);

        $taggedServices = $container->findTaggedServiceIds('app.calculator');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addCalculator', [new Reference($id)]);
        }
    }

}
