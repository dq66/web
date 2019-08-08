<?php
namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class Type extends ActiveRecord
{
    public static function tableName()
    {
        return "{{type}}";
    }

    public function getSuccess()
    {
        return $this->hasMany(Success::className(), ['type_id' => 'id']);
    }
}
