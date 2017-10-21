<?php

/**
 * ForegroundColor.php – DevelopmentHelper
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

namespace helper\console\format\type\color\foreground;

use helper\console\format\type\color\FormatColor;

abstract class ForegroundColor extends FormatColor {

	public function getUnsetCode() : int {
		return 39;
	}

}