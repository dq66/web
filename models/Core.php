<?php
namespace app\models;

use yii\db\ActiveRecord;


class Core extends ActiveRecord
{
    public static function tableName()
    {
        return '{{core}}';
    }
}
