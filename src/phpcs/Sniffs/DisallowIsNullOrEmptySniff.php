<?php

namespace Wim\Sniffs\ArrowFunction;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class DisallowIsNullOrEmptySniff implements Sniff
{
	public function register()
	{
		return array(T_STRING);
	}

	public function process(File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		$content1 = $tokens[$stackPtr]['content'];
		$content2 = $tokens[$stackPtr + 1]['content'] ?? '';
		$content3 = $tokens[$stackPtr + 2]['content'] ?? '';

		if ($content1 === 'Func_App' && $content2 === '::' && $content3 === 'isNullOrEmpty') {
			$error = 'isNullOrEmpty関数は使用しないでください。';
			$fix = $phpcsFile->addFixableError($error, $stackPtr, 'Found');

			if ($fix) {
				$phpcsFile->fixer->replaceToken($stackPtr, 'empty');
				$phpcsFile->fixer->replaceToken($stackPtr + 1, '');
				$phpcsFile->fixer->replaceToken($stackPtr + 2, '');
			}
		}
	}
}
