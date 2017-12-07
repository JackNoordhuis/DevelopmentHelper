<?php

/**
 * MakePluginCommand.php – DevelopmentHelper
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

namespace helper\command\defaults\plugin;

use helper\command\HelperCommand;
use helper\generator\traits\Generates;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class that handles generation of plugins
 */
class MakePluginCommand extends HelperCommand {

	use Generates;

	protected function configure() {
		$this->setName("plugin:make")
			->setDescription("Creates a new base plugin class.");
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$output->writeln("<light_green>Generating new base plugin...</light_green>");
	}

}