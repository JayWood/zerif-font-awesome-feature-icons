<?php

class ZLF-AFI_Widgettestimonials_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'ZLF-AFI_Widgettestimonials') );
	}

	function test_class_access() {
		$this->assertTrue( zlfa_feature_icons()->widgettestimonials instanceof ZLF-AFI_Widgettestimonials );
	}
}
