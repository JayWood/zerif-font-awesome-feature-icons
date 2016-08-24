<?php

class ZLF-AFI_Widget_Testimonails_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'ZLF-AFI_Widget_Testimonails') );
	}

	function test_class_access() {
		$this->assertTrue( zlfa_feature_icons()->widget-testimonails instanceof ZLF-AFI_Widget_Testimonails );
	}
}
