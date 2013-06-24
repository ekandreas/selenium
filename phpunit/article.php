<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://test.magasinetlakaren.se/");
  }

  public function testMyTestCase()
  {
    $this->open("/");
    $this->click("css=h2.post-title.top > a");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isVisible("class=share span6")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->assertTrue($this->isElementPresent("class=share span6"));
    $this->open("/");
    $this->click("xpath=/html/body/div/div/div[3]/div/div/div/section/div/div/div/aside/div/div[22]/a");
  }
}
?>