<?php

namespace Takeatea\TextingBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class TextingCompilerPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('takeatea.texting.manager')) {
            return;
        }

        $definition = $container->getDefinition('takeatea.texting.manager');
        $providers = $container->findTaggedServiceIds('takeatea_texting.provider');
        $providersId = array_keys($providers);

        foreach ($providersId as $id) {
            $definition->addMethodCall('registerProvider', array(new Reference($id)));
        }
    }
}
