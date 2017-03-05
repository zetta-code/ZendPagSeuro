<?php
/**
 * @link      http://github.com/zetta-repo/zend-pagseguro for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace Zetta\ZendPagSeguro\Service;

use PagSeguro\Domains\Account\Credentials;

class PagSeguroService
{
    /**
     * @var PagSeguroOptions
     */
    protected $options;

    /**
     * PagSeguroService constructor.
     * @param array|PagSeguroOptions $options
     */
    public function __construct($options)
    {
        $this->setOptions($options);
    }

    /**
     * @return PagSeguroOptions
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param  array|PagSeguroOptions $options
     * @return PagSeguroService
     */
    public function setOptions($options)
    {
        if (!$options instanceof PagSeguroOptions) {
            $options = new PagSeguroOptions($options);
        }

        $this->options = $options;
        return $this;
    }

    /**
     * @return string
     */
    public function getEnvironment() {
        return $this->options->getEnvironment();
    }

    /**
     * @return bool
     */
    public function isSandbox() {
        return $this->getEnvironment() === 'sandbox';
    }

    /**
     * @return Credentials
     */
    public function getCredential() {
        if ($this->options->getCredential() === 'account') {
            return $this->options->getAccountCredentials();
        } elseif ($this->options->getCredential() === 'application') {
            return $this->options->getApplicationCredentials();
        } else {
            return null;
        }
    }
}