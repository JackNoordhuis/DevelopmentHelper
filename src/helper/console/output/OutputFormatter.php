<?php

namespace helper\console\output;

use helper\console\format\FormatStyle;
use helper\console\format\type\color\foreground\BlackForegroundColor;
use helper\console\format\type\color\foreground\BlueForegroundColor;
use helper\console\format\type\color\foreground\CyanForegroundColor;
use helper\console\format\type\color\foreground\DarkGrayForegroundColor;
use helper\console\format\type\color\foreground\ForegroundColor;
use helper\console\format\type\color\foreground\GreenForegroundColor;
use helper\console\format\type\color\foreground\LightBlueForegroundColor;
use helper\console\format\type\color\foreground\LightCyanForegroundColor;
use helper\console\format\type\color\foreground\LightGrayForegroundColor;
use helper\console\format\type\color\foreground\LightGreenForegroundColor;
use helper\console\format\type\color\foreground\LightMagentaForegroundColor;
use helper\console\format\type\color\foreground\LightRedForegroundColor;
use helper\console\format\type\color\foreground\LightYellowForegroundColor;
use helper\console\format\type\color\foreground\MagentaForegroundColor;
use helper\console\format\type\color\foreground\RedForegroundColor;
use helper\console\format\type\color\foreground\WhiteForegroundColor;
use helper\console\format\type\color\foreground\YellowForegroundColor;
use helper\console\format\type\option\BlinkFormatOption;
use helper\console\format\type\option\BoldFormatOption;
use helper\console\format\type\option\FormatOption;
use helper\console\format\type\option\HiddenFormatOption;
use helper\console\format\type\option\ResetFormatOption;
use helper\console\format\type\option\ReverseFormatOption;
use helper\console\format\type\option\UnderlineFormatOption;
use Psr\Log\InvalidArgumentException;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Formatter\OutputFormatterStyleInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyleStack;

class OutputFormatter implements OutputFormatterInterface {

	private $decorated;

	/** @var FormatStyle[] */
	private $styles = [];
	private $styleStack;

	/**
	 * Escapes '<' special char in given text.
	 *
	 * @param string $text Text to escape
	 *
	 * @return string Escaped text
	 */
	public static function escape($text) {
		$text = preg_replace("/([^\\\\]?)</", "$1\\<", $text);
		return self::escapeTrailingBackslash($text);
	}

	/**
	 * Escapes trailing '\' in given text.
	 *
	 * @param string $text Text to escape
	 *
	 * @return string Escaped text
	 *
	 * @internal
	 */
	public static function escapeTrailingBackslash($text) {
		if("\\" === substr($text, -1)) {
			$len = strlen($text);
			$text = rtrim($text, "\\");
			$text = str_replace('\0', "", $text);
			$text .= str_repeat('\0', $len - strlen($text));
		}
		return $text;
	}

	/**
	 * Initializes console output formatter.
	 *
	 * @param bool $decorated Whether this formatter should actually decorate strings
	 * @param OutputFormatterStyleInterface[] $styles Array of 'name => FormatterStyle' instances
	 */
	public function __construct($decorated = false, array $styles = []) {
		$this->decorated = (bool) $decorated;

		$this->loadDefaultStyles(); // load the default options first so they can be overwritten

		$this->setStyles($styles);
		$this->styleStack = new OutputFormatterStyleStack();
	}

	/**
	 * Load the default styles
	 */
	protected function loadDefaultStyles() {
		$styles = [];

		foreach([
			new BlinkFormatOption(),
			new BoldFormatOption(),
			new HiddenFormatOption(),
			new ResetFormatOption(),
			new ReverseFormatOption(),
			new UnderlineFormatOption(),
		] as $option) {
			/** @var $option FormatOption */
			$styles[$option->getName()] = new FormatStyle(null, null, [$option]);
		}

		foreach(
			[
				new BlackForegroundColor(),
				new BlueForegroundColor(),
				new CyanForegroundColor(),
				new DarkGrayForegroundColor(),
				new GreenForegroundColor(),
				new LightBlueForegroundColor(),
				new LightCyanForegroundColor(),
				new LightGrayForegroundColor(),
				new LightGreenForegroundColor(),
				new LightMagentaForegroundColor(),
				new LightRedForegroundColor(),
				new LightYellowForegroundColor(),
				new MagentaForegroundColor(),
				new RedForegroundColor(),
				new WhiteForegroundColor(),
				new YellowForegroundColor(),
			] as $foregroundColor) {
			/** @var $foregroundColor ForegroundColor */
			$styles[$foregroundColor->getName()] = new FormatStyle($foregroundColor);
		}

		$this->setStyles($styles);
	}

	/**
	 * {@inheritdoc}
	 */
	public function setDecorated($decorated) {
		$this->decorated = (bool) $decorated;
	}

	/**
	 * {@inheritdoc}
	 */
	public function isDecorated() {
		return $this->decorated;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setStyle($name, OutputFormatterStyleInterface $style) {
		$this->styles[strtolower($name)] = $style;
	}

	/**
	 * Sets an array of styles
	 *
	 * @param FormatStyle[] $styles
	 */
	public function setStyles(array $styles) {
		foreach($styles as $name => $style) {
			$this->setStyle($name, $style);
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function hasStyle($name) {
		return isset($this->styles[strtolower($name)]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getStyle($name) {
		if(!$this->hasStyle($name)) {
			throw new InvalidArgumentException(sprintf("Undefined style: %s", $name));
		}
		return $this->styles[strtolower($name)];
	}

	/**
	 * {@inheritdoc}
	 */
	public function format($message) {
		$message = (string) $message;
		$offset = 0;
		$output = "";
		$tagRegex = "[a-z][a-z0-9,_=;-]*+";
		preg_match_all("#<(($tagRegex) | /($tagRegex)?)>#ix", $message, $matches, PREG_OFFSET_CAPTURE);
		foreach($matches[0] as $i => $match) {
			$pos = $match[1];
			$text = $match[0];
			if(0 != $pos && "\\" == $message[$pos - 1]) {
				continue;
			}
			// add the text up to the next tag
			$output .= $this->applyCurrentStyle(substr($message, $offset, $pos - $offset));
			$offset = $pos + strlen($text);
			// opening tag?
			if($open = "/" != $text[1]) {
				$tag = $matches[1][$i][0];
			} else {
				$tag = isset($matches[3][$i][0]) ? $matches[3][$i][0] : "";
			}

			if(!$open && !$tag) {
				// </>
				$this->styleStack->pop();
			} elseif(false === $style = $this->createStyleFromString(strtolower($tag))){
				$output .= $this->applyCurrentStyle($text);
			} elseif($open) {
				$this->styleStack->push($style);
			} else {
				$this->styleStack->pop($style);
			}
		}
		$output .= $this->applyCurrentStyle(substr($message, $offset));
		if(false !== strpos($output, '\0')) {
			return strtr($output, ['\0' => "\\", "\\<" => "<"]);
		}
		return str_replace("\\<", "<", $output);
	}

	/**
	 * Tries to create new style instance from string.
	 *
	 * @param string $string
	 *
	 * @return FormatStyle|OutputFormatterStyle|false false if string is not format string
	 */
	private function createStyleFromString($string) {
		if(isset($this->styles[$string])) {
			return $this->styles[$string];
		}
		if(!preg_match_all("/([^=]+)=([^;]+)(;|$)/", $string, $matches, PREG_SET_ORDER)) {
			return false;
		}
		$style = new OutputFormatterStyle();
		foreach($matches as $match) {
			array_shift($match);
			if("fg" == $match[0]) {
				$style->setForeground($match[1]);
			} elseif("bg" == $match[0]) {
				$style->setBackground($match[1]);
			} elseif("options" === $match[0]) {
				preg_match_all("([^,;]+)", $match[1], $options);
				$options = array_shift($options);
				foreach($options as $option) {
					try {
						$style->setOption($option);
					} catch(\InvalidArgumentException $e) {
						@trigger_error(sprintf("Unknown style options are deprecated since version 3.2 and will be removed in 4.0. Exception '%s'.", $e->getMessage()), E_USER_DEPRECATED);
						return false;
					}
				}
			} else {
				return false;
			}
		}
		return $style;
	}

	/**
	 * @return OutputFormatterStyleStack
	 */
	public function getStyleStack() {
		return $this->styleStack;
	}

	/**
	 * Applies current style from stack to text, if must be applied.
	 *
	 * @param string $text Input text
	 *
	 * @return string Styled text
	 */
	private function applyCurrentStyle($text) {
		return $this->isDecorated() && strlen($text) > 0 ? $this->styleStack->getCurrent()->apply($text) : $text;
	}

}