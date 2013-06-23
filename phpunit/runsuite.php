<?php

class TestSuite extends PHPUnit_Extensions_Selenium2TestCase{

    public function setUp(){
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://minarete.dev/');
    }


    function testLogin(){

        $this->url('/login');

        $username = $this->byName("log");
        $password = $this->byName("pwd");

        $this->assertEquals('',$username->value());
        $this->assertEquals('',$password->value());

    }

}



?>