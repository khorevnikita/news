<?php

namespace app\models;

use yii\db\ActiveRecord;

class News extends ActiveRecord
{

    public static function tableName()
    {
        return "{{news}}";
    }

    public function rules()
    {
        return [
            [['name', 'description', 'content', 'date', 'activity'], 'required'],
            [['name'], 'match', 'pattern' => '/^[0-9A-zА-я\s]+$/u'],
            [['date'], 'date'],
            [['date'], 'filter', 'filter' => function ($value) {
                // нормализация значения происходит тут
                $nextTenYears = time() + (60 * 60 * 24 * 165 * 10);
                strtotime($value);
                return strtotime($value)<$nextTenYears?$value:date("Y-m-d");
            }],
            [['activity'], 'boolean'],
        ];
    }
}
