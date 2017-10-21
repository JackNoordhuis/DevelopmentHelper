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

use helper\command\defaults\kernel\KernelVersionCommand;
use helper\HelperApplication;

class HelperCommandMap {

	/** @var HelperApplication */
	private $app;

	public function __construct(HelperApplication $app) {
		$this->app = $app;

		$this->registerDefaults();
	}

	public function getApp() {
		return $this->app;
	}

	protected function registerDefaults() {
		$this->app->addCommands(
			[
				new KernelVersionCommand(),
			]
		);
	}

}