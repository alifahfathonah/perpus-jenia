<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Kategori;
/* @var $this yii\web\View */
/* @var $model app\models\Buku */

$this->title = "Buku :" .$model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Nama (Tahun)',
                'value' => $model->nama .  '('. $model->tahun_terbit. ')'
            ],
            [
                'attribute' => 'tahun_terbit',
                'value' => $model->tahun_terbit. '  (Tahun)'
            ],
           [
               'attribute' =>'id_penulis',
               'value' => function($data){
                return $data->getPenulis();
               }
           ],
           [
               'attribute' =>'id_penerbit',
               'value' => function($data){
                return $data->getPenerbit();
               }
           ],
           [
               'attribute' =>'id_kategori',
               'value' => function($data){
                return $data->getKategori();
               }
           ],
            'sinopsis:ntext',
              [
              'attribute' => 'sampul',
              'format' =>'raw',
              'value' => function ($model){
                if ($model->sampul != '') {
                    return Html::img('@web/upload/sampul/'. $model->sampul,['class'=>'img-responsive','style' => 'height:200px', 'align'=>'center']);
                }else{
                  return '<div align="center"><h1>No Image</h1></div>';
                }
              },
            ],
            [
              'attribute' => 'berkas',
              'format' =>'raw',
              'value' => function ($model){
                if ($model->berkas != '') {
                    return Html::a($model->berkas,   ('/../upload/berkas/'));
                }else{
                  return '<div align="center"><h1>No Berkas</h1></div>';
                }
              },
            ],
        ],
    ]) ?>

</div>
