<?php

namespace Tests\Weew\Kernel\ContainerAware\Mocks;

class Bar {
    public $foo;

    public function __construct(Foo $foo) {
        $this->foo = $foo;
    }
}
