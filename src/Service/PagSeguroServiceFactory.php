<?php
/**
 * @link      http://github.com/zetta-repo/zend-pagseguro for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace Zetta\ZendPagSeguro\Service;

use Interop\Container\ContainerInterface;
use PagSeguro\Library;
use Zend\ServiceManager\Factory\FactoryInterface;

class PagSeguroServiceFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Configuration');
        Library::initialize();

        return new PagSeguroService($config['pagseguro']);
    }
}