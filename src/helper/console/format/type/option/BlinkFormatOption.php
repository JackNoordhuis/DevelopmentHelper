<?php

namespace helper\console\format\type\option;

class BlinkFormatOption extends FormatOption {

	public function getName() : string {
		return "blink";
	}

	public function getSetCode() : int {
		return 5;
	}

	public function getUnsetCode() : int {
		return 25;
	}

}