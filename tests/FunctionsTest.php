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
        $selected = ['beef','cheese','bun'];

        return [
            [$selected,['included_ingredients'=>'beef,cheese,bun'], true],
            [$selected,['included_ingredients'=>'chocolate, marshmallow, graham'], false],
            [$selected,['included_ingredients'=>'beef,cheese'], true],
            [$selected,['included_ingredients'=>'beef,cheese,bun,pickle'], false]
        ];
    }
}

class SetBodyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider scriptData
     */
    public function test_setBody($input, $expected)
    {
        $this->assertEquals($expected, setBody($input));
    }

    public function scriptData()
    {
        return [
            ['index.php','tab1'],
            ['select.php', 'tab2'],
            ['browse.php', 'tab3']
        ];
    }
}

class KeyedUpTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dbResponseData
     */
    public function test_keyedUp($input, $expected)
    {
        $this->assertEquals($expected, keyedUp($input));
    }

    public function dbResponseData()
    {
        $testdata =[['short_name' => 'beef', 'display_name' => 'Ground Beef'],
                    ['short_name' => 'cone', 'display_name' => 'Ice Cream Cones'],
                    ['short_name' => 'graham', 'display_name'=> 'Graham Crackers'],
                    ['short_name' => 'carrot', 'display_name' => 'Carrots']];
        $result =  ['beef' => 'Ground Beef',
                    'cone' => 'Ice Cream Cones',
                    'graham' => 'Graham Crackers',
                    'carrot' => 'Carrots'];
        return [[$testdata, $result]];
    }
}

class RecipeHtmlTest extends PHPUnit_Framework_TestCase{
    /**
     * @dataProvider recipeData
     */

    public function test_recipeToHtml($input, $expected)
    {
        $this->assertEquals($expected, recipeToHtml($input));
    }

    public function recipeData()
    {
        $rawData = ['recipe_name' => 'Any Recipe',
                    'recipe_body' => 'ingredient1+ingredient2##This is how you do it. Servings: 1-2'];
        $expectedHtml = '<h3>Any Recipe</h3><ul><li>ingredient1</li><li>ingredient2</li></ul><p>This is how you do it.</p><h4>Servings: 1-2</h4>';

        return [[$rawData, $expectedHtml]];
    }
}

class DisplayResultsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getIdData
     */
    public function test_resultsSearch($input, $expected)
    {
        $this->assertEquals($expected, resultsSearch($input));
    }

    public function getIdData()
    {
        return [
            ['8 12','SELECT id, recipe_name, included_ingredients FROM `recipes` WHERE id = 8 OR id = 12 ORDER BY recipe_name;'],
            ['8','SELECT id, recipe_name, included_ingredients FROM `recipes` WHERE id = 8 ORDER BY recipe_name;'],
            ['5 8 12','SELECT id, recipe_name, included_ingredients FROM `recipes` WHERE id = 5 OR id = 8 OR id = 12 ORDER BY recipe_name;'],
        ];
    }
}
