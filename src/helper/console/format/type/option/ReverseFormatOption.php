<?php

namespace helper\console\format\type\option;

class ReverseFormatOption extends FormatOption {

	public function getName() : string {
		return "reverse";
	}

	public function getSetCode() : int {
		return 7;
	}

	public function getUnsetCode() : int {
		return 27;
	}

}