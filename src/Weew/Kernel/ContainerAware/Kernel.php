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
        $this->setContainer($container);
        parent::__construct();
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
    }

    /**
     * @return IProviderInvoker
     */
    protected function createProviderInvoker() {
        return new ProviderInvoker($this->container);
    }
}
