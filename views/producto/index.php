<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Inventario de Productos';
?>

<style>
    body {
        background: linear-gradient(135deg, #A7FFEB, #B2DFDB);
    }

    .inventory-card {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 25px;
        padding: 35px;
        backdrop-filter: blur(10px);
    }

    .inventory-title {
        font-weight: 700;
        color: #00695C;
    }

    .btn-custom {
        background-color: #00BFA5;
        border: none;
        font-weight: bold;
        color: white;
        transition: 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #009e88;
        transform: scale(1.05);
    }

    .table {
        border-radius: 15px;
        overflow: hidden;
    }

    .table thead {
        background-color: #B2DFDB;
        color: #004D40;
    }

    .table-hover tbody tr:hover {
        background-color: #E0F2F1;
    }

    .img-thumbnail {
        border-radius: 12px;
    }

    .btn-action {
        border-radius: 10px;
        font-size: 14px;
        padding: 4px 8px;
    }

    .btn-update {
        background-color: #FFC107;
        border: none;
        color: black;
    }

    .btn-delete {
        background-color: #dc3545;
        border: none;
        color: white;
    }

    .btn-update:hover {
        transform: scale(1.1);
    }

    .btn-delete:hover {
        transform: scale(1.1);
    }
    /* ===== Paginación bonita ===== */
.inventory-pagination {
  margin-top: 18px;
  display: flex;
  justify-content: center;
}

.inventory-pagination .pagination {
  gap: 8px;
  margin: 0;
}

.inventory-pagination .page-link {
  border: none;
  border-radius: 14px !important;
  padding: 10px 14px;
  color: #00695C;
  background: rgba(255,255,255,.95);
  box-shadow: 0 8px 18px rgba(2,6,23,.08);
  transition: transform .15s ease, background .15s ease, box-shadow .15s ease;
}

.inventory-pagination .page-link:hover {
  background: rgba(0,191,165,.12);
  transform: translateY(-1px);
  box-shadow: 0 10px 22px rgba(2,6,23,.12);
}

.inventory-pagination .page-item.active .page-link {
  background: #00BFA5;
  color: #fff;
  box-shadow: 0 12px 26px rgba(0,191,165,.35);
}

.inventory-pagination .page-item.disabled .page-link {
  opacity: .45;
  box-shadow: none;
}

.inventory-pagination .page-item:first-child .page-link,
.inventory-pagination .page-item:last-child .page-link {
  font-weight: 700;
}
</style>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

        <div class="inventory-card shadow-lg">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="inventory-title">📦 Inventario</h2>

                <?= Html::a('➕ Nuevo Producto', ['create'], [
                    'class' => 'btn btn-custom rounded-pill shadow'
                ]) ?>
            </div>
<?php $form = ActiveForm::begin([
    'method' => 'get',
    'action' => ['index'],
    'options' => ['class' => 'mb-3'],
]); ?>

<div class="row g-2 align-items-end">
    <div class="col-md-6">
        <?= $form->field($searchModel, 'nombre')->textInput([
            'placeholder' => 'Buscar por nombre...',
            'class' => 'form-control',
        ])->label(false) ?>
    </div>

    <div class="col-md-3">
        <?= Html::submitButton('🔍 Buscar', ['class' => 'btn btn-custom w-100 rounded-pill shadow']) ?>
    </div>

    <div class="col-md-3">
        <?= Html::a('🧹 Limpiar', ['index'], ['class' => 'btn btn-outline-dark w-100 rounded-pill shadow']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
            <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'tableOptions' => ['class' => 'table table-hover align-middle text-center'],

    // ✅ Pager con clases para que el CSS aplique
    'pager' => [
        'options' => ['class' => 'pagination'],         // ul.pagination
        'linkOptions' => ['class' => 'page-link'],      // a.page-link
        'activePageCssClass' => 'active',               // li.active
        'disabledPageCssClass' => 'disabled',           // li.disabled
        'maxButtonCount' => 5,                          // cuantos números mostrar
        'prevPageLabel' => '‹',
        'nextPageLabel' => '›',
        'firstPageLabel' => '«',
        'lastPageLabel' => '»',
    ],

    // ✅ Para poder envolver el pager con un div y darle clase
    'layout' => "{items}\n<div class=\"inventory-pagination\">{pager}</div>\n{summary}",

    'columns' => [
        [
            'attribute' => 'imagen',
            'format' => 'html',
            'value' => function ($model) {
                return $model->imagen
                    ? \yii\helpers\Html::img($model->imagen, [
                        'width' => '80',
                        'class' => 'img-thumbnail shadow-sm'
                    ])
                    : '<span class="text-muted">Sin imagen</span>';
            },
        ],
        [
            'attribute' => 'nombre',
            'contentOptions' => ['class' => 'fw-semibold text-success']
        ],
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
                        'class' => 'btn btn-update btn-action me-1'
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('🗑️', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-delete btn-action',
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
        </div>
    </div>
</div>