<?php

/**
 * ApplicationReference.php – DevelopmentHelper
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

namespace helper\utils\traits;

use helper\HelperApplication;

/**
 * Simple trait to provide a reference to the main application
 */
trait ApplicationReference {

	/** @var HelperApplication */
	private $app;

	protected function setApp(HelperApplication $app) {
		$this->app = $app;
	}

	public function getApp() {
		return $this->app;
	}

}