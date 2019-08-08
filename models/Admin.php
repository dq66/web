<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Admin extends ActiveRecord
{
    public static function tableName()
    {
        return "{{admin}}";
    }

    /*public function rules()
    {
        return [
            [['name', 'pwd'], 'required'],
            ['img', 'file', 'skipOnEmpty' => false]
        ];
        // return [
        //     ['name', '', 'message' => '账号不能为空！'],
        //     ['pwd', 'required', 'message' => '密码不能为空！'],
        //     ['pwd', 'validatePass'],
        // ];
    }*/

    public function validatePass()
    {
        if (!$this->hasErrors()) {
            $data = self::find()->where('name = :name and pwd = :pwd', [':name' => $this->name, ':pwd' => md5($this->pwd)])->one();
            if (is_null($data)) {
                $this->addError('pwd', '账号或密码错误！');
            }
        }
    }

    public function login($data)
    {
        if ($this->load($data) && $this->validate()) {
            // 过期时间(一天)
            // $ilfetime = 24 * 3600;
            $session = yii::$app->session;
            $session->open();
            // session_set_cookie_params($ilfetime);
            $session['admin'] = [
                'name' => $this->name,
            ];
            return (bool)$session['admin'];
        }
        return false;
    }
}
