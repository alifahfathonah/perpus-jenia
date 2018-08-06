<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Penulis;
use app\models\Kategori;
use app\models\Penerbit;
use app\models\Buku;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Buku', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('Export Word', ['buku/jadwal-pl'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama',
            'tahun_terbit',
             [
               'attribute' =>'id_penulis',
               'filter' => Penulis::getList(),
               'value' => function($data){
                return $data->getPenulis();
               }
               // 'filter' => Html::activeDropDownList($searchModel, 'id_penulis',$penulis, ['class'=>'form-control'])
           ],
             [
               'attribute' =>'id_penerbit',
               'filter' => Penerbit::getList(),
               'value' => function($data){
                return $data->getPenerbit();
               }
           ],
           [
               'attribute' =>'id_kategori',
               'filter' => Kategori::getList(),
               'value' => function($data){
                return $data->getKategori();
               }
           ],

            //'sinopsis:ntext',
            [
              'attribute' => 'sampul',
              'format' =>'raw',
              'value' => function ($model){
                if ($model->sampul != '') {
                    return Html::img('@web/upload/sampul/'. $model->sampul,['class'=>'img-responsive','style' => 'height:150px', 'align'=>'center']);
                }else{
                  return '<div align="center"><h2>No Image</h2></div>';
                }
              },
            ],
          [
                'attribute' => 'berkas',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->berkas != '') {
                        return '<a href="' . Yii::$app->homeUrl . '/../upload/berkas/' . $model->berkas . '"><div align="center"><button class="btn-primary glyphicon glyphicon-download" type="submit"></button></div></a>';
                    } else { 
                        return '<div align="center"><h1>No File</h1></div>';
                    }
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>