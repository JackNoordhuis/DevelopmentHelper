<?php

/**
 * FormatType.php – DevelopmentHelper
 *
 * Copyright (C) 2015-2017 Jack Noordhuis
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author Jack Noordhuis
 *
 */

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