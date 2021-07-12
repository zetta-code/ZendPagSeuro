<?php
/**
 * @link      http://github.com/zetta-repo/zend-pagseguro for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace Zetta\ZendPagSeguro\View\Helper;

use Exception;
use Laminas\View\Helper\AbstractHelper;
use PagSeguro\Services\Session;
use Zetta\ZendPagSeguro\Service\PagSeguroService;

class PagSeguro extends AbstractHelper
{
    /**
     * @var PagSeguroService
     */
    protected $pagSeguroService;

    /**
     * @var array
     */
    protected $resources = [
        'production' => [
            'js' => [
                'directpayment' => 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js'
            ]
        ],
        'sandbox' => [
            'js' => [
                'directpayment' => 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js'
            ]
        ]
    ];

    /**
     * PagSeguro constructor.
     * @param PagSeguroService $pagSeguroService
     */
    public function __construct(PagSeguroService $pagSeguroService)
    {
        $this->pagSeguroService = $pagSeguroService;
    }

    /**
     * @param null $name
     * @return string
     * @throws Exception
     */
    public function __invoke($name = null)
    {
        if ($name === null) {
            return $this;
        }

        $getter = 'get' . ucfirst($name);
        if (method_exists($this, $getter)) {
            return $this->$getter();
        } else {
            throw new Exception(
                sprintf(
                    'Property (%s) in (%s) is not accessible. You should implement %s::%s()',
                    $name,
                    get_class($this),
                    get_class($this),
                    $getter
                )
            );
        }
    }

    public function getDirectPayment()
    {
        return $this->resources[$this->pagSeguroService->getEnvironment()]['js']['directpayment'];
    }

    public function getSessionIdScript()
    {
        $session = Session::create($this->pagSeguroService->getCredential());
        $script = 'PagSeguroDirectPayment.setSessionId(\'' . $session->getResult() . '\');';
        return $script;
    }
}