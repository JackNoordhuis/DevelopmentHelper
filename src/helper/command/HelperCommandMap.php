<?php

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