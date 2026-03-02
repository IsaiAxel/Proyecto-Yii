<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Nuevo Producto';
?>

<style>
    body {
        background: linear-gradient(135deg, #A7FFEB, #B2DFDB);
    }

    .form-card {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 25px;
        backdrop-filter: blur(10px);
        padding: 40px;
    }

    .form-title {
        font-weight: 700;
        color: #00695C;
    }

    .form-control {
        border-radius: 12px;
    }

    .preview-container {
        background-color: #B2DFDB;
        border-radius: 25px;
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

    label {
        font-weight: 600;
        color: #004D40;
    }
</style>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 95vh;">
    <div class="col-lg-11">

        <div class="form-card shadow-lg">

            <div class="row g-5 align-items-center">

                <!-- FORMULARIO -->
                <div class="col-md-6">

                    <h3 class="mb-4 form-title">📦 Registrar Producto</h3>

                    <?php $form = ActiveForm::begin([
                        'options' => ['enctype' => 'multipart/form-data']
                    ]); ?>

                    <?= $form->field($model, 'nombre')->textInput([
                        'placeholder' => 'Nombre del producto'
                    ]) ?>

                    <?= $form->field($model, 'kilos')->input('number', [
                        'step' => '0.01',
                        'placeholder' => 'Peso en kilos'
                    ]) ?>

                    <?= $form->field($model, 'precio')->input('number', [
                        'step' => '0.01',
                        'placeholder' => 'Precio'
                    ]) ?>

                    <?= $form->field($model, 'stock')->input('number', [
                        'placeholder' => 'Cantidad disponible'
                    ]) ?>

                    <?= $form->field($model, 'imageFile')->fileInput([
                        'class' => 'form-control',
                        'onchange' => 'previewImage(event)'
                    ]) ?>

                    <div class="d-grid mt-4">
                        <?= Html::submitButton('Guardar Producto', [
                            'class' => 'btn btn-custom btn-lg rounded-pill shadow'
                        ]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

                <!-- VISTA PREVIA -->
                <div class="col-md-6">
                    <div class="preview-container p-4 text-center shadow-sm">

                        <h5 class="mb-3 text-muted">Vista previa</h5>

                        <img id="imagePreview"
                             src="https://via.placeholder.com/350x350?text=Imagen+del+Producto"
                             class="img-fluid rounded-4 shadow"
                             style="max-height:450px;  object-fit:cover;">

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>