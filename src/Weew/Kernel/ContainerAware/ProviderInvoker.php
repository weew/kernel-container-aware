<?php

namespace Weew\Kernel\ContainerAware;

use Weew\Container\IContainer;
use Weew\Foundation\IDictionary;
use Weew\Kernel\IProviderInvoker;
use Weew\Kernel\Provider;

class ProviderInvoker implements IProviderInvoker {
    /**
     * @var IContainer
     */
    protected $container;

    /**
     * @param IContainer $container
     */
    public function __construct(IContainer $container) {
        $this->container = $container;
    }

    /**
     * @param $providerClass
     * @param IDictionary $shared
     *
     * @return Provider
     */
    public function create($providerClass, IDictionary $shared) {
        return $this->container->get($providerClass, ['shared' => $shared]);
    }

    /**
     * @param object $provider
     * @param IDictionary $shared
     */
    public function initialize($provider, IDictionary $shared) {
        $this->container->callMethod($provider, 'initialize', ['shared' => $shared]);
    }

    /**
     * @param object $provider
     * @param IDictionary $shared
     */
    public function boot($provider, IDictionary $shared) {
        $this->container->callMethod($provider, 'boot', ['shared' => $shared]);
    }

    /**
     * @param object $provider
     * @param IDictionary $shared
     */
    public function shutdown($provider, IDictionary $shared) {
        $this->container->callMethod($provider, 'shutdown', ['shared' => $shared]);
    }
}
