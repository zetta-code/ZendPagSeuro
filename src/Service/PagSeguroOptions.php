<?php
/**
 * @link      http://github.com/zetta-repo/zend-pagseguro for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace Zetta\ZendPagSeguro\Service;

use Laminas\Stdlib\AbstractOptions;
use PagSeguro\Configuration\Configure;
use PagSeguro\Domains\AccountCredentials;
use PagSeguro\Domains\ApplicationCredentials;

class PagSeguroOptions extends AbstractOptions
{

    /**
     * @var string
     */
    protected $environment;

    /**
     * @var string
     */
    protected $charset;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $appId;

    /**
     * @var string
     */
    protected $appKey;

    /**
     * @var string
     */
    protected $authorizationCode;

    /**
     * @var array
     */
    protected $log;

    /**
     * @var string
     */
    protected $credential;

    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * production or sandbox
     *
     * @param string $environment
     * @return PagSeguroOptions
     */
    public function setEnvironment($environment)
    {
        if ($environment !== 'production' && $environment !== 'sandbox') {
            $environment = 'sandbox';
        }

        Configure::setEnvironment($environment);
        $this->environment = $environment;

        return $this;
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * UTF-8 or ISO-8859-1
     *
     * @param string $charset
     * @return PagSeguroOptions
     */
    public function setCharset($charset)
    {
        Configure::setCharset($charset);
        $this->charset = $charset;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return PagSeguroOptions
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return PagSeguroOptions
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     * @return PagSeguroOptions
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @param string $appKey
     * @return PagSeguroOptions
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @param string $authorizationCode
     * @return PagSeguroOptions
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    /**
     * @return array
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @param array $log
     * @return PagSeguroOptions
     */
    public function setLog(array $log)
    {
        Configure::setLog($log['active'], $log['location']);
        $this->log = $log;
        return $this;
    }

    /**
     * @return string
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * @param mixed $credential
     */
    public function setCredential($credential)
    {
        if ($credential !== 'account' && $credential !== 'application') {
            $credential = 'account';
        }

        $this->credential = $credential;
    }

    /**
     * @return AccountCredentials
     */
    public function getAccountCredentials()
    {
        Configure::setAccountCredentials($this->email, $this->token);

        return Configure::getAccountCredentials();
    }

    /**
     * @return ApplicationCredentials
     */
    public function getApplicationCredentials()
    {
        Configure::setApplicationCredentials($this->appId, $this->appKey);

        return Configure::getApplicationCredentials()->setAuthorizationCode($this->authorizationCode);
    }
}