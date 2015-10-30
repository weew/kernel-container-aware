<?php

namespace Tests\Weew\Kernel\ContainerAware\Mocks;

use Weew\Foundation\IDictionary;

class ComplexProvider {
    public $foo;
    public $create;
    public $initialize;
    public $boot;
    public $shutdown;

    public function __construct(Foo $foo, IDictionary $shared) {
        $this->create = $foo;
        $this->foo = $shared->get('foo');
    }

    public function initialize(Bar $bar, IDictionary $shared) {
        $this->initialize = $bar;
        $this->foo = $shared->get('foo');
    }

    public function boot(Bar $bar, IDictionary $shared) {
        $this->boot = $bar;
        $this->foo = $shared->get('foo');
    }

    public function shutdown(Bar $bar, IDictionary $shared) {
        $this->shutdown = $bar;
        $this->foo = $shared->get('foo');
    }
}
