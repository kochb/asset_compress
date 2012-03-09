<?php
App::uses('AssetFilter', 'AssetCompress.Lib');

/**
 * CoffeeScript-PHP filter.
 *
 * A compiler for CoffeeScript written in PHP, which removes the dependency on
 * node.js.
 * 
 * You need to put CoffeeScript-PHP in your application's vendors directories.
 * You can get it from https://github.com/alxlit/coffeescript-php
 *
 * @package asset_compress
 */
class CoffeeScriptPhp extends AssetFilter {

/**
 * Where CoffeeScript-PHP can be found.
 *
 * @var array
 */
	protected $_settings = array(
		'path' => 'coffeescript-php/coffeescript/coffeescript.php'
	);

/**
 * Apply CoffeeScript-PHP to $content.
 *
 * @param string $filename
 * @param string $content Content to filter.
 * @return string
 */
	public function output($filename, $content) {
		App::import('Vendor', 'coffeescript-php', array('file' => $this->_settings['path']));
		return CoffeeScript\compile($content);
	}
}
