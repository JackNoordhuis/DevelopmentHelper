<?php

/**
 * KernelVersionCommand.php – DevelopmentHelper
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

namespace helper\command\defaults\kernel;

use helper\command\HelperCommand;
use helper\console\format\FormatStyle;
use helper\console\format\type\color\foreground\LightYellowForegroundColor;
use helper\console\format\type\option\BoldFormatOption;
use helper\HelperApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class KernelVersionCommand extends HelperCommand {

	protected function configure() {
		$this->setName("version")
			->setDescription("Relays information about the application");
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$output->getFormatter()->setStyle("kernel_name", new FormatStyle(new LightYellowForegroundColor(), null, [new BoldFormatOption()]));

		$output->writeln("<light_green>This kernel is running <kernel_name>" . HelperApplication::KERNEL_NAME . "</kernel_name> <cyan>v" . HelperApplication::KERNEL_VERSION . "</cyan> targeting <light_cyan>" . HelperApplication::TARGET_VARIANT ."</light_cyan> API <light_magenta>" . HelperApplication::TARGET_API . "</light_magenta></light_green>");
	}

}