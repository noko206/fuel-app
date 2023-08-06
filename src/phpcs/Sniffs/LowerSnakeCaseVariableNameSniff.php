<?php

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class LowerSnakeCaseVariableNameSniff implements Sniff
{
	public function register()
	{
		return array(T_VARIABLE);
	}

	public function process(File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();
		$variableName = $tokens[$stackPtr]['content'];

		if (strtolower($variableName) !== $variableName) {
			$error = '変数名は全て小文字のスネークケースを使用してください。';
			$phpcsFile->addError($error, $stackPtr, 'Found');
		}
	}
}
