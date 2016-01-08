<?php

namespace Tests\Weew\Kernel\ContainerAware;

use PHPUnit_Framework_TestCase;
use Tests\Weew\Kernel\ContainerAware\Mocks\Bar;
use Tests\Weew\Kernel\ContainerAware\Mocks\ComplexProvider;
use Tests\Weew\Kernel\ContainerAware\Mocks\Foo;
use Weew\Container\Container;
use Weew\Collections\Dictionary;
use Weew\Kernel\ContainerAware\ProviderInvoker;

class ProviderInvokerTest extends PHPUnit_Framework_TestCase {
    public function test_invoker_uses_container() {
        $invoker = new ProviderInvoker(new Container());
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

    public function test_invoker_puts_provider_instance_into_the_container() {
        $container = new Container();
        $invoker = new ProviderInvoker($container);
        $provider = $invoker->create(ComplexProvider::class, new Dictionary());

        $this->assertTrue($container->has(ComplexProvider::class));
        $this->assertTrue($provider === $container->get(ComplexProvider::class));
    }
}
