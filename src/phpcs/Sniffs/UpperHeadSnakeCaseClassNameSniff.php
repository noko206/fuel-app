<?php

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class UpperHeadSnakeCaseClassNameSniff implements Sniff
{
	public function register()
	{
		return array(T_CLASS);
	}

	public function process(File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		$whiteSpace = $tokens[$stackPtr + 1]['content'] ?? '';
		$className = $tokens[$stackPtr + 2]['content'] ?? '';

		if ($whiteSpace !== ' ') return;

		$has_error = false;
		foreach (explode('_', $className) as $classNameChunk) {
			if ($classNameChunk === '') continue;
			$head = substr($classNameChunk, 0, 1);
			$tail = substr($classNameChunk, 1);
			if (ctype_lower($head) || !ctype_lower($tail)) {
				$has_error = true;
			}
		}

		if ($has_error) {
			$error = 'クラス名は単語の先頭のみが大文字のスネークケースを使用してください。';
			$phpcsFile->addError($error, $stackPtr + 2, 'Found');
		}
	}
}
