<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kategori */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] ="Kategori: " . $model->nama;
?>
<div class="kategori-view">

    <h1><?= Html::encode( "Kategori: ". $model->nama) ?></h1>

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
           
            'nama',
        ],
    ]) ?>

</div>

<div>&nbsp;</div>
<h1>Daftar Buku</h1>

<?= Html::a('TAMBAH BUKU', ['buku/create', 'id_kategori' => $model->id], ['class' => 'btn btn-primary']) ?>

<div>&nbsp;</div>

<table class="table">
    <tr>
        <th>No.</th>
        <th>Nama Buku</th>
        <td>&nbsp;</td>
    </tr> 
    <?php $no=1; foreach ($model->findAllBuku() as $buku): ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= Html::a($buku->nama, ['buku/view','id'=>$buku->id]); ?></td>
            <td><?= Html::a("Edit", ["buku/update","id"=>$buku->id], ['class' => 'btn btn-primary']); ?> &nbsp;
                <?= Html::a("Hapus", ["buku/delete","id"=>$buku->id],['class' => 'btn btn-primary'], ['data-method'=>'post','data-confirm'=>'file akan di hapus?']); ?> &nbsp;
            </td>
        </tr>
        <?php $no++; endforeach ?>
</table>
