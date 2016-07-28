<?php
namespace T3ROOKIES\Ligatures\Utility;

/**
 * Class LigaturesUtility
 *
 * @package T3ROOKIES\Ligatures\Utility
 */
class LigaturesUtility {
	
	/**
	 * @param string $originalString
	 *
	 * @return string
	 */
	public function getCharacter($originalString) {
		$newString = '';
		
		$strlen = strlen($originalString);
		for( $i = 0; $i <= $strlen; $i++ ) {
			// TODO: Make sure that substr don't run out of arrays
			if ($i+2 <= count($strlen)) {
				if ($i+1 <= count($strlen)) {
					
				} else {
					$newString .= substr($originalString, $i, 1);
				}
			}
			
			$firstCharacter = substr($originalString, $i, 1 );
			$secondCharacter = substr($originalString, $i+1, 1);
			$thirdCharacter = substr($originalString, $i+2, 1);
			$twoLetterString = $firstCharacter . $secondCharacter;
			$threeLetterString = $twoLetterString . $thirdCharacter;
			
			if (in_array($twoLetterString, $this->getTwoCharsLigaturesArray())) {
				if (in_array($threeLetterString, $this->getThreeCharsLigaturesArray())) {
					$newString .= ''; // replace characters
				} else {
					$newString .= ''; // replace characters
				}
			}
			
		}
		
		return $newString;
	}
	
	/**
	 * @return array
	 */
	private function getTwoCharsLigaturesArray() {
		return [
			'st' => 'U+FB06',
			'ff' => 'U+FB00',
			'fi' => 'U+FB01',
			'fl' => 'U+FB02'
		];
	}
	
	/**
	 * @return array
	 */
	private function getThreeCharsLigaturesArray() {
		return [
			'ffl' => 'U+FB04',
			'ffi' => 'U+FB03'
		];
	}
	
}