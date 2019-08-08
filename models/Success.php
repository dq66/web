<?php
namespace app\models;

use yii\db\ActiveRecord;


class Success extends ActiveRecord
{

    public static function tableName()
    {
        return "{{success}}";
    }

    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id'])->asArray();
    }
}
