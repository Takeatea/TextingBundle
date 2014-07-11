<?php

namespace Takeatea\TextingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('takeatea_texting');

        $rootNode->append($this->getManagerConfiguration());

        return $treeBuilder;
    }

    /**
     * @return \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition|\Symfony\Component\Config\Definition\Builder\NodeDefinition
     */
    protected function getManagerConfiguration()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('manager');

        $node->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('class')->defaultValue('Takeatea\Component\Texting\Manager\TextingManager')->end()
            ->end();

        return $node;
    }
}