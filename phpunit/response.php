<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://minarete.dev/");
  }

  public function testMyTestCase()
  {
    // start
    $response_name = "UI-TEST-" . uniqid(); //$this->getEval("'UI-TEST'+Math.floor(Math.random()*111111111);");
    $access_code = uniqid(); //$this->getEval("'ACCESS-'+Math.floor(Math.random()*111111111);");

    // login
    $this->open("/");
    $this->click("link=Din profil");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("link=Logga in")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("link=Logga in");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("id=user_login")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->type("id=user_login", "minarete");
    $minarete_password = "Melker04!"; //$this->getEval("minarete_password");
    $this->type("id=user_pass", $minarete_password);
    $this->click("id=wp-submit");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("id=arete_avatar_link-1")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("id=arete_avatar_link-1"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    // create response group
    $this->open("/svarsgrupper/");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("id=create_new_response_group")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("id=create_new_response_group");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("id=response_group_wizard-next-0")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->type("id=this_name", $response_name);
    $this->select("id=template", "label=Elev 7-Gy");
    $this->click("id=response_group_wizard-next-0");
    $this->type("id=notes", "Vi testar via UI-test Jenkins och Selenium");
    $this->select("id=grade", "label=Gr3");
    $this->select("id=subject", "label=Engelska");
    $this->type("id=total", "20");
    $this->type("id=school", "Testskolan");
    $this->select("id=school_type", "label=Gymnasiet");
    $this->click("id=response_group_wizard-next-1");
    $this->type("id=password", $access_code);
    $this->click("css=i.icon-arrow-right");
    $this->click("css=i.icon-arrow-right");
    $future = date('Y-m-d'); //$this->getEval("d=(new Date().getFullYear()) + '-' + (\"0\" + (new Date().getMonth()+1)).slice(-2) + '-' + (\"0\" + (new Date().getDate()+7)).slice(-2)");
    $this->type("id=start_date", $future);
    $this->click("id=button_save");
    // get response group id with open
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("link=" . $response_name)) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("link=" . $response_name);
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("id=this_name")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $survey_id = $this->getValue("id=aretesurvey_form_id");
    $this->click("link=Avbryt");
    // open response group
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("id=jqg_aretesurvey_response_group_" . $survey_id)) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("id=jqg_aretesurvey_response_group_" . $survey_id);
    $this->click("name=button_start");
    $this->waitForPageToLoad("30000");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("css=i.splashy-check")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    // answer survey
    $this->open("/svara/");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("id=surveycode")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->type("id=surveycode", $access_code);
    $this->click("css=button.btn");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("id=tick_img_surveyanswer15")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("id=tick_img_surveyanswer15");
    $this->click("id=surveyanswer15");
    $this->click("id=tick_img_surveyanswer294");
    $this->click("id=surveyanswer294");
    $this->click("id=tick_img_surveyanswer93");
    $this->click("id=surveyanswer93");
    $this->click("id=tick_img_surveyanswer242");
    $this->click("id=surveyanswer242");
    $this->click("id=tick_img_surveyanswer111");
    $this->click("id=surveyanswer111");
    $this->click("id=tick_img_surveyanswer22");
    $this->click("id=surveyanswer22");
    $this->click("id=tick_img_surveyanswer173");
    $this->click("id=surveyanswer173");
    $this->click("id=tick_img_surveyanswer64");
    $this->click("id=surveyanswer64");
    $this->click("id=tick_img_surveyanswer85");
    $this->click("id=surveyanswer85");
    $this->click("id=tick_img_surveyanswer194");
    $this->click("id=surveyanswer194");
    $this->click("id=tick_img_surveyanswer203");
    $this->click("id=surveyanswer203");
    $this->click("id=tick_img_surveyanswer122");
    $this->click("id=surveyanswer122");
    $this->click("id=tick_img_surveyanswer231");
    $this->click("id=surveyanswer231");
    $this->click("id=tick_img_surveyanswer182");
    $this->click("id=surveyanswer182");
    $this->click("id=tick_img_surveyanswer73");
    $this->click("id=surveyanswer73");
    $this->click("id=tick_img_surveyanswer134");
    $this->click("id=surveyanswer134");
    $this->click("id=tick_img_surveyanswer145");
    $this->click("id=surveyanswer145");
    $this->click("id=tick_img_surveyanswer285");
    $this->click("id=surveyanswer285");
    $this->click("id=tick_img_surveyanswer155");
    $this->click("id=surveyanswer155");
    $this->click("id=tick_img_surveyanswer215");
    $this->click("id=surveyanswer215");
    $this->click("id=tick_img_surveyanswer224");
    $this->click("id=surveyanswer224");
    $this->click("id=tick_img_surveyanswer264");
    $this->click("id=surveyanswer264");
    $this->click("id=tick_img_surveyanswer254");
    $this->click("id=surveyanswer254");
    $this->click("id=tick_img_surveyanswer164");
    $this->click("id=surveyanswer164");
    $this->click("id=tick_img_surveyanswer33");
    $this->click("id=surveyanswer33");
    $this->click("id=tick_img_surveyanswer53");
    $this->click("id=surveyanswer53");
    $this->click("id=tick_img_surveyanswer103");
    $this->click("id=surveyanswer103");
    $this->click("id=tick_img_surveyanswer43");
    $this->click("id=surveyanswer43");
    $this->click("id=tick_img_gender1");
    $this->click("id=gender1");
    $this->click("id=button_save");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("css=div.alert.alert-success")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("css=div.alert.alert-success"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    // remove response group
    $this->open("/svarsgrupper/");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("id=jqg_aretesurvey_response_group_" . $survey_id)) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("id=jqg_aretesurvey_response_group_" . $survey_id);
    $this->click("name=button_delete");
    $this->assertTrue((bool)preg_match('/^Är du säker på att du vill ta bort valda enkäter och all dess data[\s\S] Detta går inte att ångra!$/',$this->getConfirmation()));
    // logout
    $this->click("id=arete_avatar_link-1");
    $this->click("link=Logga ut");
    for ($second = 0; ; $second++) {
        if ($second >= 10) $this->fail("timeout");
        try {
            if ($this->isVisible("link=Din profil")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    // end
  }
}
?>