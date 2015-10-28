<?php

namespace Tests\Weew\Kernel;

use PHPUnit_Framework_TestCase;
use Tests\Weew\Kernel\Mocks\Bar;
use Tests\Weew\Kernel\Mocks\ComplexProvider;
use Tests\Weew\Kernel\Mocks\Foo;
use Weew\Container\Container;
use Weew\Foundation\Dictionary;
use Weew\Kernel\ContainerAwareProviderInvoker;

class ContainerAwareProviderInvokerTest extends PHPUnit_Framework_TestCase {
    public function test_invoker_uses_container() {
        $invoker = new ContainerAwareProviderInvoker(new Container());
        $shared = new Dictionary();

        $shared->set('foo', 'bar');
        $provider = $invoker->create(ComplexProvider::class, $shared);
        $this->assertTrue($provider->create instanceof Foo);
        $this->assertEquals('bar', $provider->foo);

        $shared->set('foo', 'foo');
        $invoker->initialize($provider, $shared);
        $this->assertTrue($provider->initialize instanceof Bar);
        $this->assertEquals('foo', $provider->foo);

        $shared->set('foo', 'baz');
        $invoker->boot($provider, $shared);
        $this->assertTrue($provider->boot instanceof Bar);
        $this->assertEquals('baz', $provider->foo);

        $shared->set('foo', 'yolo');
        $invoker->shutdown($provider, $shared);
        $this->assertTrue($provider->shutdown instanceof Bar);
        $this->assertEquals('yolo', $provider->foo);
    }
}
