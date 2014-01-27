<?php

/**
 * MRouter class file.
 *
 * @author Oleg Lunegov <testuser@mail.linpax.org>
 * @link https://github.com/antivir88/micro
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license http://opensource.org/licenses/MIT
 * @package micro
 * @subpackage web
 * @version 1.0
 * @since 1.0
 */
class MRouter
{
	/** @property array $routes */
	public $routes = array(
		'/'=>'/default',
		'<module:(\w)+>/<controller:(\w)+>/<action:(\w)+>' => '/<module>/<controller>/<action>',
		'<controller:(\w)+>/<action:(\w)+>' => '/<controller>/<action>',
	);


	/**
	 * Construct for route scaner
	 *
	 * @param array $routes
	 * @return void
	 */
	public function __construct($routes) {
		$this->routes = array_merge($this->routes, $routes);
	}
	/**
	 * Parsing uri
	 *
	 * @param string $uri
	 * @return string
	 */
	public function parse($uri) {
		// default path
		if ($uri == '/' OR $uri == '') {
			return '/default';
		}
		// scan routes
		foreach ($routes AS $condition => $replacement) {
			// slice path
			if ($uri == $condition) {
				return $replacement;
			}
			// pattern path
			if ($validated = $this->validatedRule($uri, $condition, $replacement)) {
				return $validated;
			}
		}
		// return raw uri
		return $uri;
	}
	/**
	 * Validated router rule
	 *
	 * @param string $uri
	 * @param string $condition
	 * @param string $replacement
	 * @return string
	 */
	private function validatedRule($uri, $pattern, $replacement) {
		return preg_replace(str_replace('/', '\/', $pattern), $replacement, $uri);
	}
}