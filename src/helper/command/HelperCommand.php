<?php

/**
 * HelperCommand.php – DevelopmentHelper
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

namespace helper\command;

use helper\HelperApplication;
use helper\utils\traits\ApplicationReference;
use Symfony\Component\Console\Command\Command;

abstract class HelperCommand extends Command {

	use ApplicationReference;

	public function __construct(HelperApplication $app, $name = null) {
		$this->setApp($app);
		parent::__construct($name);
	}

}