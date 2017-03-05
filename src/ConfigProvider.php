<?php
/**
 * @link      http://github.com/zetta-repo/zend-pagseguro for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace Zetta\ZendPagSeguro;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ServiceManager\Proxy\LazyServiceFactory;
use Zetta\ZendMPDF\View\Strategy\MpdfStrategy;

class ConfigProvider implements ConfigProviderInterface
{
    /**
     * Return configuration for this component.
     *
     * @return array
     */
    public function __invoke()
    {
        return $this->getConfig();
    }

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return [
            'view_helpers' => $this->getViewHelpers(),
            'service_manager' => $this->getServiceManager()
        ];
    }

    /**
     * Return component helpers configuration.
     *
     * @return array
     */
    public function getViewHelpers()
    {
        return [
            'aliases' => [
                'pagSeguro' => View\Helper\PagSeguro::class,
            ],
            'factories' => [
                View\Helper\PagSeguro::class => View\Helper\PagSeguroFactory::class,
            ],
        ];
    }

    /**
     * Return component helpers configuration.
     *
     * @return array
     */
    public function getServiceManager()
    {
        return [
            'factories' => [
                Service\PagSeguroService::class => Service\PagSeguroServiceFactory::class,
            ],
            'lazy_services' => [
                'class_map' => [
                    Service\PagSeguroService::class => Service\PagSeguroService::class,
                ]
            ],
            'delegators' => [
                Service\PagSeguroService::class => [
                    LazyServiceFactory::class
                ]
            ]
        ];
    }
}
