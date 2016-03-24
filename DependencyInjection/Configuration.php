<?php
/**
 * Bundle declaration
 *
 * PHP Version 5
 *
 * @category Bundle
 * @package  Redgem\ServicesIOBundle
 * @author   Guillaume HUGOT <guillaume.hugot@gmail.com>
 * @license  MIT
 * @link     http://github.com/ghugot/ServicesIO
 */

namespace Redgem\ServicesIOBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 *
 * @category Bundle
 * @package  Redgem\ServicesIOBundle
 * @author   Guillaume HUGOT <guillaume.hugot@gmail.com>
 * @license  MIT
 * @link     http://github.com/ghugot/ServicesIO
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('redgem_services_io');

        $rootNode
            ->children()
            	->arrayNode('http')
            		->children()
	            		->arrayNode('user_agents')
		            		->prototype('array')
			            		->children()
				            		->scalarNode('user_agent')
					            		->isRequired()
					            		->cannotBeEmpty()
				            		->end()
			            		->end()
		            		->end()
	            		->end()
	            		->arrayNode('cookies_jars')
		            		->prototype('array')
			            		->children()
				            		->scalarNode('cookies_jar')
					            		->isRequired()
					            		->cannotBeEmpty()
				            		->end()
			            		->end()
		            		->end()
	            		->end()
            			->arrayNode('interfaces')
		                    ->prototype('array')
	                            ->children()
	                                ->scalarNode('interface')
	                                    ->isRequired()
	                                    ->cannotBeEmpty()
	                                ->end()
	                            ->end()
		                    ->end()
		                ->end()
            		->end()
            	->end()
                ->arrayNode('model')
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('schema')
                            ->end()
                        ->end()
                        ->children()
                            ->arrayNode('extensions')
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode('class')
                                            ->isRequired()
                                            ->cannotBeEmpty()
                                        ->end()
                                            ->scalarNode('path')
                                            ->isRequired()
                                            ->cannotBeEmpty()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
        
        return $treeBuilder;
    }
}
