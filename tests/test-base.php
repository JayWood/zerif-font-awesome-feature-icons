<?php

class BaseTest extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'ZLFA_Feature_Icons') );
	}
	
	function test_get_instance() {
		$this->assertTrue( zlfa_feature_icons() instanceof ZLFA_Feature_Icons );
	}
}
