<?php
require_once 'functions.php';

class CheckForIngredientsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider ingredientsData
     */
    public function test_checkForIngredients($input, $list, $expected)
    {
        $this->assertEquals($expected, checkForIngredients($input, $list));
    }

    public function ingredientsData()
    {
        return [
            [['beef','cheese','bun'],['included_ingredients'=>'beef,cheese,bun'], true],
            [['beef','cheese','bun'],['included_ingredients'=>'chocolate, marshmallow, graham'], false],
            [['beef','cheese','bun'],['included_ingredients'=>'beef,cheese'], true],
            [['beef','cheese','bun'],['included_ingredients'=>'beef,cheese,bun,pickle'], false]
        ];
    }
}
