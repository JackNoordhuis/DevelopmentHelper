<?php

/**
 * FormatStyle.php – DevelopmentHelper
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

namespace helper\console\format;

use helper\console\format\type\color\background\BackgroundColor;
use helper\console\format\type\color\foreground\ForegroundColor;
use helper\console\format\type\color\FormatColor;
use helper\console\format\type\option\FormatOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyleInterface;

class FormatStyle implements OutputFormatterStyleInterface {

	/** @var ForegroundColor|null */
	private $foreground;

	/** @var BackgroundColor|null */
	private $background;

	/** @var FormatOption[] */
	private $options = [];

	/**
	 * Initializes format style.
	 *
	 * @param FormatColor $foreground The style foreground color name
	 * @param FormatColor $background The style background color name
	 * @param FormatOption[] $options The style options
	 */
	public function __construct($foreground = null, $background = null, array $options = []) {
		if($foreground !== null) {
			$this->setForeground($foreground);
		}

		if($background !== null) {
			$this->setBackground($background);
		}

		if(!empty($options)) {
			$this->setOptions($options);
		}
	}

	/**
	 * Sets style foreground color.
	 *
	 * @param ForegroundColor|null $color The color name
	 */
	public function setForeground($color = null) {
		if(!$color instanceof FormatColor) {
			$this->foreground = null;
			return;
		}

		$this->foreground = $color;
	}

	/**
	 * Sets style background color.
	 *
	 * @param BackgroundColor|null $color
	 */
	public function setBackground($color = null) {
		if(!$color instanceof FormatColor) {
			$this->background = null;
			return;
		}

		$this->background = $color;
	}

	/**
	 * Sets some specific style option.
	 *
	 * @param FormatOption $option The option name
	 */
	public function setOption($option) {
		if(!isset($this->options[$option->getName()])) {
			$this->options[$option->getName()] = $option;
		}
	}

	/**
	 * Unsets a specific style option.
	 *
	 * @param FormatOption $option
	 */
	public function unsetOption($option) {
		if(isset($this->options[$option->getName()])) {
			unset($this->options[$option->getName()]);
		}
	}

	/**
	 * Sets multiple style options at once.
	 *
	 * @param array $options
	 */
	public function setOptions(array $options) {
		$this->options = [];
		foreach($options as $option) {
			$this->setOption($option);
		}
	}

	/**
	 * Applies the style to a given text.
	 *
	 * @param string $text The text to style
	 *
	 * @return string
	 */
	public function apply($text) {
		$setCodes = [];
		$unsetCodes = [];

		if($this->foreground !== null) {
			$setCodes[] = $this->foreground->getSetCode();
			$unsetCodes[] = $this->foreground->getUnsetCode();
		}

		if($this->background !== null) {
			$setCodes[] = $this->background->getSetCode();
			$unsetCodes[] = $this->background->getUnsetCode();
		}

		foreach($this->options as $option) {
			$setCodes[] = $option->getSetCode();
			$unsetCodes[] = $option->getUnsetCode();
		}

		if(empty($setCodes)) {
			return $text;
		}

		return sprintf("\033[%sm%s\033[%sm", implode(";", $setCodes), $text, implode(";", $unsetCodes));
	}

}