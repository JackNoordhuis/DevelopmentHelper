<?php

/**
 * HelperCommandMap.php – DevelopmentHelper
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

use helper\command\defaults\generator\MakePluginCommand;
use helper\command\defaults\kernel\KernelVersionCommand;
use helper\HelperApplication;
use helper\utils\traits\ApplicationReference;

class HelperCommandMap {

	use ApplicationReference;

	/** @var HelperApplication */
	private $app;

	public function __construct(HelperApplication $app) {
		$this->setApp($app);

		$this->registerDefaults();
	}

	protected function registerDefaults() {
		$this->app->addCommands(
			[
				new KernelVersionCommand($this->getApp()),
				new MakePluginCommand($this->getApp()),
			]
		);
	}

}