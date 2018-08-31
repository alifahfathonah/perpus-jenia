<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Buku;
use app\models\Anggota;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Kategori;
use app\models\Peminjaman;
use miloschuman\highcharts\Highcharts;
use yiier\chartjs\ChartJs;
// use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */

$this->title = "Halaman Dashboard";
?>
<div class="row top_tiles">
             <!--  -->
             
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count"><?= Yii::$app->formatter->asInteger(Buku::getBukuCount()); ?></div>
                  <h3>Buku</h3>
                  <p><?= Html::a('More Info', ['buku/index']) ?> <i class="fa fa-arrow-right"></i></p>
            </div>
        </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-group"></i></div>
                  <div class="count"><?= Yii::$app->formatter->asInteger(Anggota::getAnggotaCount()); ?></div>
                  <h3>Anggota</h3>
                  <p><?= Html::a('More Info', ['kategori/index']) ?> <i class="fa fa-arrow-right"></i></p>
                </div>
              </div>


                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-pencil"></i></div>
                  <div class="count"><?= Yii::$app->formatter->asInteger(Penulis::getPenulisCount()); ?></div>
                  <h3>Penulis</h3>
                  <p><?= Html::a('More Info', ['penulis/index']) ?> <i class="fa fa-arrow-right"></i></p>
                </div>
            </div>

             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments"></i></div>
                  <div class="count"><?= Yii::$app->formatter->asInteger(Peminjaman::getPeminjamanCount()); ?></div>
                  <h3>Peminjaman</h3>
                  <p><?= Html::a('More Info', ['peminjaman/index']) ?> <i class="fa fa-arrow-right"></i></p>
                </div>
            </div>

            </div>


 
    <!-- ====GRAFIK=== -->
  <!--   <div class="row"> -->
    <div class="col-sm-6">
        <!-- <div class="box box-primary">
                <h3 class="box-title">BUKU BERDASARKAN KATEGORI</h3>
            </div> -->
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'BUKU BERDASARKAN KATEGORI'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'bar' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'buku',
                                'data' => Kategori::getGrafikList(),
                            ],
                        ],
                    ],
                ]);?>
        </div>
    </div>

   <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <h3 class="box-title">GRAFIK PEMINJAMAN BUKU</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- <canvas id="mybarChart"> -->
                        <div class="box-body">
                                        <?= ChartJs::widget([
                'type' => 'bar',
                'options' => [
                    'height' => 200,
                    'width' => 600,
                    'color' => 'bg-green'
                ],
                'data' => [
                    'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                     'datasets' => [
                         [
                             'label'=> '# of Votes',
                             'data' => [65, 59, 90, 81, 56, 55, 40]
                         ],
                         [
                             'label'=> '# of Votes',
                             'data' => [28, 48, 40, 19, 96, 27, 100]
                         ]
                     ]
                ]
            ]);?>
                         
        </div> 

                   <!--  </canvas> -->
                  </div>
                </div>
              </div>
            </div>
           





</div>