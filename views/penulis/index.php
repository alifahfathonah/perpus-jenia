<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenulisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penulis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penulis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Penulis', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export Word', ['export-word'], ['class' => 'btn btn-round btn-danger']) ?>
        <?= Html::a('Export Excel', ['penulis/export-excel'], ['class' => 'btn btn-round btn-warning']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
             [
               'attribute' =>'nama',
               'headerOptions' => ['style' => 'text-align:center;'],
               'contentOptions' => ['style' => 'text-align:center']
           ],
              [
               'attribute' =>'alamat',
               'headerOptions' => ['style' => 'text-align:center;'],
               'contentOptions' => ['style' => 'text-align:center']
           ],
            // 'telepon',
            // 'email:email',
            [
                'label' => 'Jumlah Buku',
                'value'=>function($data){
                    return $data->getJumlahBuku();
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
