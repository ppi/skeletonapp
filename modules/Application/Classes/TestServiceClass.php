<?php

namespace Application\Classes;

class TestServiceClass {
    
    protected $_var = 'test';
    
    public function testMethod() {
        return $this->_var;
    }
    
}