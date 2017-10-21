<?php

namespace helper\utils;

class Utils {

	/** @var string */
	protected static $os;

	/**
	 * Returns the current Operating System
	 * Windows => win
	 * MacOS => mac
	 * iOS => ios
	 * Android => android
	 * Linux => Linux
	 * BSD => bsd
	 * Other => other
	 *
	 * @param bool $recalculate
	 *
	 * @return string
	 */
	public static function getOS(bool $recalculate = false) : string{
		if(self::$os === null or $recalculate){
			$uname = php_uname("s");
			if(stripos($uname, "Darwin") !== false){
				if(strpos(php_uname("m"), "iP") === 0){
					self::$os = "ios";
				}else{
					self::$os = "mac";
				}
			}elseif(stripos($uname, "Win") !== false or $uname === "Msys"){
				self::$os = "win";
			}elseif(stripos($uname, "Linux") !== false){
				if(@file_exists("/system/build.prop")){
					self::$os = "android";
				}else{
					self::$os = "linux";
				}
			}elseif(stripos($uname, "BSD") !== false or $uname === "DragonFly"){
				self::$os = "bsd";
			}else{
				self::$os = "other";
			}
		}

		return self::$os;
	}

}