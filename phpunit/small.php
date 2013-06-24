<?php

class Example extends PHPUnit_Extensions_Selenium2TestCase{

    protected function setUp()
    {
        $this->setBrowser("phantomjs");
        //$this->setBrowser("*firefox");
        $this->setBrowserUrl("http://minarete.dev/");
    }

    public function testMyTestCase(){

        $this->url('/');
        //$this->open('/');

        //sleep(3);

        //file_put_contents('result.png', base64_decode($this->captureEntirePageScreenshot()));

        //file_put_contents('MyScreenshot.png', base64_decode($this->currentScreenshot()));

    }
}

