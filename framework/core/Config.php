<?php

class Config
{
	private static $settings = array();

	public static function load($file) {

		if (file_exists($file)) {

			$settings = require_once $file;

			if (is_array($settings)) {

				foreach ($settings as $key => $value) {
					self::$settings[$key] = $value;
				}

				return true;
			} else {

				return false;
			}
		} else {

			return false;
		}
	}

	public static function set($key, $value) {

		self::$settings[$key] = $value;

		return true;
	}

	public static function get($key) {
		if (isset(self::$settings[$key])) {

			return self::$settings[$key];
		} else {

			return false;
		}
	}

	public static function delete($key) {
		if (isset(self::$settings[$key])) {

			unset(self::$settings[$key]);

			return true;
		} else {

			return false;
		}
	}

	public static function getAll() {

			return self::$settings;
	}
}