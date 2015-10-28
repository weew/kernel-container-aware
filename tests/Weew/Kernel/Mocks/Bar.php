<?php

namespace Tests\Weew\Kernel\Mocks;

class Bar {
    public $foo;

    public function __construct(Foo $foo) {
        $this->foo = $foo;
    }
}
