<?php

namespace Weew\Kernel;

use Weew\Container\IContainer;
use Weew\Kernel\Kernel as BaseKernel;

class ContainerAwareKernel extends BaseKernel {
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
     * @return ContainerAwareProviderInvoker
     */
    protected function createProviderInvoker() {
        return new ContainerAwareProviderInvoker($this->container);
    }
}
