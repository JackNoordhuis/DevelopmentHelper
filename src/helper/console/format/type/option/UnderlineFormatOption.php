<?php

namespace helper\console\format\type\option;

class UnderlineFormatOption extends FormatOption {

	public function getName() : string {
		return "underline";
	}

	public function getSetCode() : int {
		return 4;
	}

	public function getUnsetCode() : int {
		return 24;
	}

}