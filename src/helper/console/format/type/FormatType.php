<?php

namespace helper\console\format\type;

abstract class FormatType {

	/**
	 * Get this formatting types name
	 *
	 * @return string
	 */
	abstract public function getName() : string;

	/**
	 * Get this formatting types set code
	 *
	 * @return int
	 */
	abstract public function getSetCode() : int;

	/**
	 * Get this formatting types unset code
	 *
	 * @return int
	 */
	abstract public function getUnsetCode() : int;

}