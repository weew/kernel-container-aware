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
        parent::__construct();
        $this->setContainer($container);
    }

    /**
     * @return IContainer
     */
    public function getContainer() {
        return $this->container;
    }

    /**
     * @param IContainer $container
     */
    public function setContainer(IContainer $container) {
        $this->container = $container;
        $this->setProviderInvoker(new ProviderInvoker($this->container));
    }
}
