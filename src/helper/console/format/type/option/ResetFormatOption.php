<?php

namespace helper\console\format\type\option;

class ResetFormatOption extends FormatOption {

	public function getName() : string {
		return "reset";
	}

	public function getSetCode() : int {
		return 0;
	}

	public function getUnsetCode() : int {
		return 0;
	}

}