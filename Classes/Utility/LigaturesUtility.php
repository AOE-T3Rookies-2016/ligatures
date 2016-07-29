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
		
		$ligaturesArray = $this->getLigaturesArray();
		foreach($ligaturesArray as $origin => $ligature) {
			$originalString = preg_replace('|' . $origin . '|', $ligature, $originalString);
		}
		
		return $originalString;
	}
	
	/**
	 * @return array
	 */
	private function getTwoCharsLigaturesArray() {
		return [
			'st' => '&#64262;',
			'ff' => '&#64256;',
			'fi' => '&#64257;',
			'fl' => '&#64258;'
		];
	}
	
	/**
	 * @return array
	 */
	private function getThreeCharsLigaturesArray() {
		return [
			'ffl' => '&#64260;',
			'ffi' => '&#64259;'
		];
	}
	
	/**
	 * @return array
	 */
	private function getAllHtmlTagsWithLigature() {
		// TODO: How to deal with <span style=“”> and <span name=“test” style=“”>?
		return [
			'<&#64262;rong>' => '<strong>',
			'</&#64262;rong>' => '</strong>',
			'<&#64262;yle' => '<style>',
			'</&#64262;yle' => '</style>',
			'<&#64258;eldset' => '<fieldset>',
			'</&#64258;eldset' => '</fieldset>',
			'<&#64258;gcaption' => '<figcaption>',
			'</&#64258;gcaption' => '</figcaption>',
			'<&#64258;gure' => '<figure>',
			'</&#64258;' => '</figure>',
			'<p &#64262;yle' => '<p style',
		];
	}
	
	/**
	 * @return array
	 */
	private function getLigaturesArray() {
		$ligaturesArray = array_merge(
			$this->getThreeCharsLigaturesArray(),
			$this->getTwoCharsLigaturesArray(),
			$this->getAllHtmlTagsWithLigature()
		);
		return $ligaturesArray;
	}
	
}