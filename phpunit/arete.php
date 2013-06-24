<?php

class SeleneseTests extends PHPUnit_Extensions_SeleniumTestCase
{
    public static $seleneseDirectory = '.';

    protected function setUp()
    {
        $this->setBrowser('phantomjs');
        $this->setBrowserUrl('http://minarete.dev/');
    }

}

?>
