<?php

namespace helper\console\format\type\option;

class BoldFormatOption extends FormatOption {

	public function getName() : string {
		return "bold";
	}

	public function getSetCode() : int {
		return 1;
	}

	public function getUnsetCode() : int {
		return 22;
	}

}