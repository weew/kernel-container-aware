<?php

namespace Tests\Weew\Kernel\ContainerAware\Mocks;

use Weew\Collections\IDictionary;

class ComplexProvider {
    public $status;
    public $create;
    public $configure;
    public $initialize;
    public $boot;
    public $shutdown;

    public function __construct(Foo $foo, IDictionary $shared) {
        $this->create = $foo;
        $this->status = $shared->get('status');
    }

    public function configure(Bar $bar, IDictionary $shared) {
        $this->configure = $bar;
        $this->status = $shared->get('status');
    }

    public function initialize(Bar $bar, IDictionary $shared) {
        $this->initialize = $bar;
        $this->status = $shared->get('status');
    }

    public function boot(Bar $bar, IDictionary $shared) {
        $this->boot = $bar;
        $this->status = $shared->get('status');
    }

    public function shutdown(Bar $bar, IDictionary $shared) {
        $this->shutdown = $bar;
        $this->status = $shared->get('status');
    }
}
