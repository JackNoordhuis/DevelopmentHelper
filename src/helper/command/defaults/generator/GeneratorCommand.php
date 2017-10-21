<?php

/**
 * GeneratorCommand.php – DevelopmentHelper
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

namespace helper\command\defaults\generator;

use helper\command\HelperCommand;

abstract class GeneratorCommand extends HelperCommand {

	/**
	 * Get the path to the stub for the class being generated
	 *
	 * @return string
	 */
	abstract protected function getStubPath() : string;

	/**
	 * Get the default path dor the class
	 *
	 * @return string
	 */
	abstract protected function getDefaultPath() : string;

	/**
	 * Get the default namespace for the class
	 *
	 * @return string
	 */
	abstract protected function getDefaultNamespace() : string;

}