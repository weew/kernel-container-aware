<?php

namespace Tests\Weew\Kernel\ContainerAware;

use PHPUnit_Framework_TestCase;
use Weew\Container\Container;
use Weew\Kernel\ContainerAware\Kernel;
use Weew\Kernel\ContainerAware\ProviderInvoker;
use Weew\Kernel\IProviderInvoker;

class KernelTest extends PHPUnit_Framework_TestCase {
    public function test_kernel_uses_container_aware_provider_invoker() {
        $kernel = new Kernel(new Container());
        $this->assertTrue(
            $kernel->getProviderInvoker() instanceof ProviderInvoker
        );
    }

    public function test_get_and_set_kernel() {
        $kernel = new Kernel(new Container());
        $container = new Container();
        $kernel->setContainer($container);
        $this->assertTrue($kernel->getContainer() === $container);
    }

    public function test_changing_container_changes_invoker() {
        $kernel = new Kernel(new Container());
        $invoker = $kernel->getProviderInvoker();
        $container = new Container();
        $kernel->setContainer($container);
        $this->assertTrue($kernel->getProviderInvoker() !== $invoker);
        $this->assertTrue($kernel->getProviderInvoker() instanceof IProviderInvoker);
    }
}
