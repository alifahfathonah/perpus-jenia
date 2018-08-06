<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Kategori;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Buku */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_terbit')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'id_penulis')->widget(Select2::classname(), [
            'data' =>  Penulis::getList(),
            'options' => [
              'placeholder' => '- Pilih penulis -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>


     <?= $form->field($model, 'id_penerbit')->widget(Select2::classname(), [
            'data' =>  Penerbit::getList(),
            'options' => [
              'placeholder' => '- Pilih penerbit -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

<?php if ($model->id_kategori == null) { ?>

    <?= $form->field($model, 'id_kategori')->widget(Select2::classname(), [
            'data' =>  Kategori::getList(),
            'options' => [
              'placeholder' => '- Pilih Kategori -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>



<?php  }  ?>
     


    <?= $form->field($model, 'sinopsis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sampul')->fileInput() ?>

    <?= $form->field($model, 'berkas')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
