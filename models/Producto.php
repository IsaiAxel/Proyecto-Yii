<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Producto extends ActiveRecord
{
    public $imageFile;

    public static function tableName()
    {
        return 'producto';
    }

    public function rules()
    {
        return [
            [['nombre', 'kilos', 'precio', 'stock'], 'required'],

            ['nombre', 'string', 'max' => 100],
            [['kilos', 'precio'], 'number'],
            ['stock', 'integer', 'min' => 0],

            ['imageFile', 'file',
                'extensions' => ['png', 'jpg', 'jpeg'],
                'maxSize' => 2 * 1024 * 1024,
                'skipOnEmpty' => true
            ],
        ];
    }
}
