<?php

if (!defined ('TYPO3_MODE')) {
	die('Access denied.');
}

if (TYPO3_MODE == 'FE') {
	$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_content_content.php']['modifyDBRow'][] = T3ROOKIES\Ligatures\Hooks\replaceLigaturesHook::class;
}