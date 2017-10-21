<?php

namespace helper\console\format\type\option;

class HiddenFormatOption extends FormatOption {

	public function getName() : string {
		return "hidden";
	}

	public function getSetCode() : int {
		return 8;
	}

	public function getUnsetCode() : int {
		return 28;
	}

}