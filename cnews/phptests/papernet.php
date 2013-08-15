<?php

class TestLogin extends PHPUnit_Extensions_Selenium2TestCase {

    public function setUp()
	{
		$this->setHost('localhost');
		$this->setPort(4444);
		$this->setBrowser('firefox');

        $url = getenv('TEST_URL');

		$this->setBrowserUrl( $url );

        $this->assertTrue( !empty( $url ), "export missing, please set environment variable TEST_URL first!" );

    }

    public function testFoodnetArticleShare(){

		$this->url( getenv('TEST_URL') );
		$this->byCssSelector('h2.post-title.top > a')->click();

        $this->timeouts()->implicitWait(10000);

		$elements = $this->byCssSelector( '.share.span6' );
		$this->assertEquals( 1, count($elements) );
    }

    public function testComments(){

    	$this->url( getenv('TEST_URL') );
    	$this->byCssSelector('h2.post-title.top > a')->click();
    	$this->timeouts()->implicitWait(10000);

    	$elements = $this->byCssSelector( '.share.span6' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '#comments' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '#author' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '#lname' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '#email' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '#url' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '#submit' );
		$this->assertEquals( 1, count($elements) );
    }

    public function testFooter(){

    	$this->url( getenv('TEST_URL') );

    	$elements = $this->byCssSelector( '.span6.copy' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '.container.basis-footer.shadow.footers' );
		$this->assertEquals( 1, count($elements) );

		$this->assertTrue((bool)preg_match('/^[\s\S]*Tryffelslingan 10, Box 72001, 181 72 Lidingö[\s\S]*$/',$this->byCssSelector("BODY")->text()));

    }

    public function testSearchTestFunction(){

		$this->url( getenv('TEST_URL') );
        $this->byId("appendedInputButton")->value("bra");
        $this->byId("searchform")->submit();
        $this->byId("appendedInputButton")->value("hodor");
        $this->byId("searchform")->submit();
        $this->byId("appendedInputButton")->value("bra");
        $this->byCssSelector("button.btn")->click();
        $this->byId("appendedInputButton")->value("hodor");
        $this->byCssSelector("button.btn")->click();

    }

    public function testTopTestMenu(){

		$this->url( getenv('TEST_URL') );
        $this->byXPath("/html/body/div/div/div[2]/header/div[2]/div/nav/ul/li[3]/a")->click();
        for ($second = 0; ; $second++) {
                if ($second >= 60) $this->fail("timeout");
                try {
                        if ($this->byCssSelector("div.breadcrumbs_menu")->displayed()) break;
                } catch (Exception $e) {}
                sleep(1);

        $this->timeouts()->implicitWait(10000);
    	}
	}

	public function testTwitter(){

		$this->url( getenv('TEST_URL') );

		$elements = $this->byCssSelector( '.textwidget' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '#l' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '.tweet.h-entry.with-expansion.customisable-border' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '.i.ic-fav.ic-mask' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '.button.load-more.customisable' );
		$this->assertEquals( 1, count($elements) );

		$elements = $this->byCssSelector( '.tweet-box-button web-intent' );
		$this->assertEquals( 1, count($elements) );
		
	}

}
  
?>