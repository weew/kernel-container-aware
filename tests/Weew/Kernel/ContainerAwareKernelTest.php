<?php

namespace Tests\Weew\Kernel;

use PHPUnit_Framework_TestCase;
use Weew\Container\Container;
use Weew\Kernel\ContainerAwareKernel;
use Weew\Kernel\ContainerAwareProviderInvoker;

class ContainerAwareKernelTest extends PHPUnit_Framework_TestCase {
    public function test_kernel_uses_container_aware_provider_invoker() {
        $kernel = new ContainerAwareKernel(new Container());
        $this->assertTrue(
            $kernel->getProviderInvoker() instanceof ContainerAwareProviderInvoker
        );
    }
}
