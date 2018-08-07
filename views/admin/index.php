<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Buku;
use miloschuman\highcharts\Highcharts;


$this->title = "Halaman Dashboard";

?>

<div class="row">

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <!-- <div class="inner"> -->
                <h1>Jumlah Buku</h1>

                <h3><?= Yii::$app->formatter->asInteger(Buku::getCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-building"></i>
            </div>
            <a href="<?=Url::to(['buku/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
