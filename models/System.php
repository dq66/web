<?php
namespace app\models;

use yii\db\ActiveRecord;


class System extends ActiveRecord
{
    public static function tableName()
    {
        return "{{system}}";
    }

    public function rules()
    {
        return [
            [['title', 'keywords', 'qq', 'tel', 'record', 'address'], 'required']
        ];
    }

    // 指定页面lable名称
    public function attributelabels()
    {
        return [
            'title' => '网站标题: ',
            'logo' => '网站logo: ',
            'keywords' => 'SEO关键字: ',
            'description' => '网站描述: ',
            'qq' => 'QQ: ',
            'tel' => '客户电话: ',
            'record' => '备案号: ',
            'rwm' => '二维码：',
            'bjimg' => '背景图：',
            'address' => '地址：'
        ];
    }
}
