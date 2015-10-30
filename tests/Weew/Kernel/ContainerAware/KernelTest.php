<?php

namespace Tests\Weew\Kernel\ContainerAware;

use PHPUnit_Framework_TestCase;
use Weew\Container\Container;
use Weew\Kernel\ContainerAware\Kernel;
use Weew\Kernel\ContainerAware\ProviderInvoker;

class KernelTest extends PHPUnit_Framework_TestCase {
    public function test_kernel_uses_container_aware_provider_invoker() {
        $kernel = new Kernel(new Container());
        $this->assertTrue(
            $kernel->getProviderInvoker() instanceof ProviderInvoker
        );
    }
}
