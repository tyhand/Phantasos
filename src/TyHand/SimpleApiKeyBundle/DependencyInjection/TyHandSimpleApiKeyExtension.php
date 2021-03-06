<?php

namespace TyHand\SimpleApiKeyBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

/**
 * Extension class
 */
class TyHandSimpleApiKeyExtension extends Extension
{
    /**
     * @see Extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // Load the configs
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration( $configuration, $configs );
        $loader = new YamlFileLoader($container, new FileLocator( __DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        // Put the parameter values into the container
        $container->setParameter('tyhand.simple_apikey.key_name', $config['key_name']);
        $container->setParameter('tyhand.simple_apikey.storage_service_name', $config['storage_service']);
    }
}
