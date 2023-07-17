<?php

namespace Wim\Sniffs\ArrowFunction;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class CoreTechSniff implements Sniff
{
	public function register()
	{
		return array(T_STRING);
	}

	public function process(File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();
		if ($tokens[$stackPtr]['content'] === 'Test' && $tokens[$stackPtr + 1]['content'] === '::' && $tokens[$stackPtr + 2]['content'] === 'isNullOrEmpty') {
			$error = 'isNullOrEmpty関数は使用しないでください。';
			$fix = $phpcsFile->addFixableError($error, $stackPtr, 'Found');
			if ($fix) {
				$phpcsFile->fixer->replaceToken($stackPtr, '');
				$phpcsFile->fixer->replaceToken($stackPtr + 1, '');
				$phpcsFile->fixer->replaceToken($stackPtr + 2, 'empty');
			}
		}
	}
}
