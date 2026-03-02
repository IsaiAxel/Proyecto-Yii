<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Producto extends ActiveRecord
{
    public $imageFile;

    public static function tableName()
    {
        return 'producto';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        // atributos permitidos en ambos escenarios
        $attrs = ['nombre', 'kilos', 'precio', 'stock', 'imageFile'];

        $scenarios['create'] = $attrs;
        $scenarios['update'] = $attrs;

        return $scenarios;
    }

    public function rules()
    {
        return [

            // 🔴 Requeridos (menos imagen)
            [['nombre', 'kilos', 'precio', 'stock'], 'required'],

            // ✅ Imagen requerida SOLO al crear
            [['imageFile'], 'required', 'on' => 'create'],

            // 🔤 Nombre
            ['nombre', 'string', 'max' => 100],
            ['nombre', 'match',
                'pattern' => '/^[a-zA-ZÁÉÍÓÚáéíóúÑñ\s]+$/',
                'message' => 'El nombre solo puede contener letras y espacios.'
            ],

            // ⚖️ Kilos
            ['kilos', 'number', 'min' => 0.01],
            ['kilos', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => 'Los kilos deben ser mayores a 0.'],

            // 💲 Precio
            ['precio', 'number', 'min' => 0.01],
            ['precio', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => 'El precio debe ser mayor a 0.'],

            // 📦 Stock
            ['stock', 'integer', 'min' => 0],

            // 🖼 Imagen (opcional en update por skipOnEmpty => true)
            ['imageFile', 'file',
                'extensions' => ['png', 'jpg', 'jpeg'],
                'checkExtensionByMimeType' => true,
                'maxSize' => 2 * 1024 * 1024,
                'tooBig' => 'La imagen no puede pesar más de 2MB.',
                'wrongExtension' => 'Solo se permiten imágenes PNG o JPG.',
                'skipOnEmpty' => true // ✅ en update ya NO obliga
            ],
        ];
    }
}