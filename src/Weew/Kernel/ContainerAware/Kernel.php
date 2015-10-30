<?php

namespace Weew\Kernel\ContainerAware;

use Weew\Container\IContainer;
use Weew\Kernel\IProviderInvoker;
use Weew\Kernel\Kernel as BaseKernel;

class Kernel extends BaseKernel {
    /**
     * @var IContainer
     */
    protected $container;

    /**
     * @param IContainer $container
     */
    public function __construct(IContainer $container) {
        $this->container = $container;
        parent::__construct();
    }

    /**
     * @return IProviderInvoker
     */
    protected function createProviderInvoker() {
        return new ProviderInvoker($this->container);
    }
}
