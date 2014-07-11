<?php

namespace Takeatea\TextingBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Takeatea\TextingBundle\DependencyInjection\CompilerPass\TextingCompilerPass;

class TakeateaTextingBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TextingCompilerPass());
    }
}