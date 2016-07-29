<?php
namespace T3ROOKIES\Ligatures\Hooks;
use T3ROOKIES\Ligatures\Utility\LigaturesUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class replaceLigaturesHook
 */
class replaceLigaturesHook {
	
	/**
	 * @param $row
	 * @param $configuration
	 */
	public function modifyDBRow(&$row, $configuration) {
		if ($configuration !== 'tt_content') {
			return;
		}
		
		/** @var LigaturesUtility $ligatureUtility */
		$ligatureUtility = GeneralUtility::makeInstance(LigaturesUtility::class);
		
		$row['header'] = $ligatureUtility->getCharacter($row['header']);
		$row['bodytext'] = $ligatureUtility->getCharacter($row['bodytext']);
	}
}