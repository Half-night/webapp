<?php

class ClassMap
{

	private static $classMap = array();
	private static $classDependencies = array();

	public static function load($file) {

		if (file_exists($file)) {

			$classes = include $file;

			if (is_array($classes)) {

				foreach ($classes as $class => $path) {

					self::$classMap[$class] = $path;
				}
			} else {

				return false;
			}
		} else {

			return false;
		}
	}

	public static function add($class, $path) {
		
		self::$classMap[$class] = $path;
	}

	public static function del() {
		//TODO: implement
	}

	public static function requireClass($class) {

		if (isset(self::$classMap[$class])) {

			if (file_exists(self::$classMap[$class])) {

				require_once self::$classMap[$class];

				return true;
			} else {

				return false;
			}
		} else {

			return false;
		}
	}

	public static function getAll() {

		return self::$classMap;
	}

	public static function generateMap() {

		//TODO: implement
	}
}