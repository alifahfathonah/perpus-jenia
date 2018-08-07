<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Buku;
use app\models\Anggota;
use app\models\Penulis;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */

$this->title = "Halaman Dashboard";
?>
<div class="row">

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>Buku</h3>

                <h3>Jumlah: <?= Yii::$app->formatter->asInteger(Buku::getCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="<?=Url::to(['buku/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

 <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>Anggota</h3>

                <h3>Jumlah: <?= Yii::$app->formatter->asInteger(Anggota::getAnggotaCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?=Url::to(['anggota/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

 <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3>Penulis</h3>

                <h3>Jumlah: <?= Yii::$app->formatter->asInteger(Penulis::getPenulisCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="<?=Url::to(['penulis/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
</div>