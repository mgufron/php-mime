<?php
include '../MimeType.php';
class MimeTypeTest extends PHPUnit_Framework_TestCase
{
	public function testType()
	{
		$mimeType = new MimeType;
		$file = dirname(__FILE__).'/../Screenshot from 2013-05-13 11:14:38.png';

		$type = $mimeType->get($file)->type();
		$this->assertEquals($file, $mimeType->getFile());
		$this->assertEquals('png',$mimeType->extension());
		$this->assertEquals('image/png',$type);
	}	
}