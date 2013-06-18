<?php

/**
 * PHP Mime extensions - based on PHP Mime - Comprehensive MIME type mapping API for PHP.
 *
 * @author      Rafael García <rafaelgarcia@profesionaldiacronos.com>
 * @author 		Mochamad Gufron Efendi <mgufronefendi@gmail.com>
 * @link 		https://github.com/mgufron
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

include 'libs/diacronos/Mime/Mime.php';

// use the class
use \diacronos\Mime\Mime;

// Load our local copy of http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
Mime::load(dirname(__FILE__).'/etc/mime.types');

// Overlay enhancements we've had requests for (and that seem to make sense)
Mime::load(dirname(__FILE__).'/etc/extra.types');


/**
* 
* @package 	MimeType
* @author 	Mochamad Gufron
* @depends 	Mime 
* @since 	1.0.0
*/
class MimeType extends Mime
{
	/**
	* Current file that will used to get the extension or the mime type
	* @access private
	* @var string 
	*/
	private $file;

	/**
	* A shortcut to call get function
	* @access public
	* @var string 
	*/
	public function __construct($file='')
	{
		if(!empty($file))
		return $this->get($file);
	}
	/**
	* @access public
	* @param string $file set the file that you want to use
	* @return objec self
	*/
	public function get($file)
	{
		$this->file = $file;
		return $this;
	}

	/**
	* getting current file
	* @access public
	* @return string
	*/
	public function getFile()
	{
		return $this->file;
	}

	/**
	* get mime type of the current file
	* @access public
	* @return string
	*/
	public function type()
	{
		return self::lookup($this->file);
	}

	/**
	* get extension of the current file
	* @access public
	* @return string
	*/
	public function extension()
	{
		$type = $this->type();
		return self::getExtension($type);
	}
}