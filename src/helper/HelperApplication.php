<?php

/**
 * HelperApplication.php – DevelopmentHelper
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

namespace helper;

use helper\command\HelperCommandMap;
use helper\console\output\OutputFormatter;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\Output;

class HelperApplication extends Application {

	/**
	 * The name of our application
	 */
	const KERNEL_NAME = "Development Helper";

	/**
	 * The version of our application
	 */
	const KERNEL_VERSION = "0.0.1";

	/**
	 * The stability level of our application
	 */
	const KERNEL_STABILITY = "dev";

	/**
	 * The PocketMine variant this application is compatible with
	 */
	const TARGET_VARIANT = "PMMP";

	/**
	 * The PocketMine API this application is compatible with
	 */
	const TARGET_API = "3.0.0-ALPHA9";

	/** @var HelperCommandMap */
	private $commandMap;

	public function __construct() {
		parent::__construct(self::KERNEL_NAME, self::KERNEL_VERSION);

		//Terminal::init();

		$this->commandMap = new HelperCommandMap($this);

		$this->run(null, new ConsoleOutput(Output::VERBOSITY_NORMAL, null, new OutputFormatter()));
	}

}