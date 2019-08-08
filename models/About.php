<?php
namespace app\models;

use yii\db\ActiveRecord;
use Behat\Gherkin\Node\TableNode;


class About extends ActiveRecord
{
    public static function tableName()
    {
        return "{{about}}";
    }
}
