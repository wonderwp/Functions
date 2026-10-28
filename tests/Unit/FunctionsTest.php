<?php

declare(strict_types=1);

namespace WonderWp\Functions\Tests\Unit;

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function testParamsToHtmlWithKeyValShouldReturnCorrectString(): void
    {
        $params = [
            'key1' => 'val1',
        ];
        $markup = \WonderWp\Functions\paramsToHtml($params);
        $this->assertEquals(' key1="val1"', $markup);
    }

    public function testParamsToHtmlWithArrayShouldReturnCorrectString(): void
    {
        $params = [
            'key1' => [
                'val1',
                'val2',
            ],
        ];
        $markup = \WonderWp\Functions\paramsToHtml($params);
        $this->assertEquals(' key1="val1 val2"', $markup);
    }

    public function testParamsToHtmlWithObjectShouldReturnCorrectString(): void
    {
        $val1 = new \stdClass();
        $val1->value = 'test';
        $params = [
            'key1' => $val1,
        ];
        $markup = \WonderWp\Functions\paramsToHtml($params);
        $this->assertEquals(' key1=""', $markup);
    }

    public function testParamsToHtmlWithUnescapedValShouldReturnCorrectString(): void
    {
        $params = [
            'key1' => '<strong>val1</strong>',
        ];
        $markup = \WonderWp\Functions\paramsToHtml($params);
        $this->assertEquals(' key1="val1"', $markup);
    }
}
