<?php

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function testParamsToHtmlWithKeyValShouldReturnCorrectString()
    {
        $params = [
            'key1' => 'val1',
        ];
        $markup = \WonderWp\Functions\paramsToHtml($params);
        $this->assertEquals(' key1="val1"', $markup);
    }

    public function testParamsToHtmlWithArrayShouldReturnCorrectString()
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

    public function testParamsToHtmlWithObjectShouldReturnCorrectString()
    {
        $val1 = new stdClass();
        $val1->value = 'test';
        $params = [
            'key1' => $val1,
        ];
        $markup = \WonderWp\Functions\paramsToHtml($params);
        $this->assertEquals(' key1=""', $markup);
    }

    public function testParamsToHtmlWithUnescapedValShouldReturnCorrectString()
    {
        $params = [
            'key1' => '<strong>val1</strong>',
        ];
        $markup = \WonderWp\Functions\paramsToHtml($params);
        $this->assertEquals(' key1="val1"', $markup);
    }
}
