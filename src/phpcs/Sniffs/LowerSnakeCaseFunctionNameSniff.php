<?php

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class LowerSnakeCaseFunctionNameSniff implements Sniff
{
	public function register()
	{
		return array(T_FUNCTION);
	}

	public function process(File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		$whiteSpace = $tokens[$stackPtr + 1]['content'] ?? '';
		$functionName = $tokens[$stackPtr + 2]['content'] ?? '';

		if ($whiteSpace !== ' ') return;

		if (strtolower($functionName) !== $functionName) {
			$error = '関数名は全て小文字のスネークケースを使用してください。';
			$phpcsFile->addError($error, $stackPtr + 2, 'Found');
		}
	}
}
