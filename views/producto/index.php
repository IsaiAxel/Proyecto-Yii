<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Inventario de Productos';
?>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">
        <h2>📦 Inventario</h2>
        <?= Html::a('➕ Nuevo Producto', ['create'], [
            'class' => 'btn btn-success rounded-pill'
        ]) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-hover table-bordered align-middle'],
        'columns' => [

      [
    'attribute' => 'imagen',
    'format' => 'html',
    'value' => function ($model) {
        return $model->imagen
            ? \yii\helpers\Html::img($model->imagen, [
                'width' => '80',
                'class' => 'img-thumbnail'
            ])
            : 'Sin imagen';
    },
],

            'nombre',
            'kilos',
            [
    'attribute' => 'precio',
    'value' => function ($model) {
        return '$ ' . number_format($model->precio, 2);
    }
],
            'stock',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('✏️', ['update', 'id' => $model->id], [
                            'class' => 'btn btn-warning btn-sm me-1'
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('🗑️', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => '¿Seguro que quieres eliminar este producto?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>

</div>