<?php

/**
 * HiddenFormatOption.php – DevelopmentHelper
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

namespace helper\console\format\type\option;

class HiddenFormatOption extends FormatOption {

	public function getName() : string {
		return "hidden";
	}

	public function getSetCode() : int {
		return 8;
	}

	public function getUnsetCode() : int {
		return 28;
	}

}