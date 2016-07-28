<?php
namespace T3ROOKIES\Ligatures\Tests\Unit\Utility;

use T3ROOKIES\Ligatures\Utility\LigaturesUtility;
use TYPO3\CMS\Core\Tests\UnitTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class LigaturesUtilityTest
 *
 * @package T3ROOKIES\Ligatures\Tests\Unit\Utility
 */
class LigaturesUtilityTest extends UnitTestCase {
	
	/**
	 * @var LigaturesUtility
	 */
	protected $subject;
	
	public function setUp() {
		parent::setUp();
		$this->subject = GeneralUtility::makeInstance(LigaturesUtility::class);
		
	}
	
	/**
	 * @test
	 *
	 * @param string
	 * @param string
	 *
	 * @dataProvider getCharacterTestDataProvider
	 */
	public function getCharacterTest($input, $expected) {
		$this->assertEquals(
			$expected,
			$this->subject->getCharacter($input)
		);
	}
	
	/**
	 * @return array
	 */
	public function getCharacterTestDataProvider() {
		return [
			'String without ligatures' => [
				'input' => 'No ligatures',
				'expected' => 'No ligatures'
			],
			'String with st-character ligature' => [
				'input' => 'Test with ligature',
				'expected' => 'Te&#64262; with ligature'
			],
			'String with fi-character ligature' => [
				'input' => 'String with ligature - finish',
				'expected' => 'String with ligature - &#64257;nish'
			],
			'String with ffi-character ligature' => [
				'input' => 'String with ligature - Steffi',
				'expected' => 'String with ligature - Ste&#64259;'
			],
			'String with both ffi and fi-character ligature' => [
				'input' => 'String with both ffi and fi-character ligature',
				'expected' => 'String with both &#64259; and &#64257;-character ligature'
			],
			/*'String with html-tag strong with ligatures' => [
				'input' => '<strong>This is a simple text</strong>',
				'output' => '<strong>This is a simple text</strong>'
			]*/
		];
	}
	
}