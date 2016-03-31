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

        $shared->set('status', 'created');
        $provider = $invoker->create(ComplexProvider::class, $shared);
        $this->assertTrue($provider->create instanceof Foo);
        $this->assertEquals('created', $provider->status);

        $shared->set('status', 'configured');
        $invoker->configure($provider, $shared);
        $this->assertTrue($provider->configure instanceof Bar);
        $this->assertEquals('configured', $provider->status);

        $shared->set('status', 'initialized');
        $invoker->initialize($provider, $shared);
        $this->assertTrue($provider->initialize instanceof Bar);
        $this->assertEquals('initialized', $provider->status);

        $shared->set('status', 'booted');
        $invoker->boot($provider, $shared);
        $this->assertTrue($provider->boot instanceof Bar);
        $this->assertEquals('booted', $provider->status);

        $shared->set('status', 'shutdown');
        $invoker->shutdown($provider, $shared);
        $this->assertTrue($provider->shutdown instanceof Bar);
        $this->assertEquals('shutdown', $provider->status);
    }

    public function test_invoker_puts_provider_instance_into_the_container() {
        $container = new Container();
        $invoker = new ProviderInvoker($container);
        $provider = $invoker->create(ComplexProvider::class, new Dictionary());

        $this->assertTrue($container->has(ComplexProvider::class));
        $this->assertTrue($provider === $container->get(ComplexProvider::class));
    }
}
