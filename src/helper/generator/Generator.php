<?php

/**
 * Generator.php – DevelopmentHelper
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

namespace helper\generator;

use helper\HelperApplication;
use helper\utils\traits\ApplicationReference;

/**
 * Class that handles the generation of classes, files and functions.
 */
class Generator {

	use ApplicationReference;

	public function __construct(HelperApplication $app) {
		$this->setApp($app);
	}

}