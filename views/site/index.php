<?php
use app\models\Buku;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php
    $model = Buku::findOne(44);
    print $model->nama;
    print $model->tahun_terbit;
    print $model->id_penerbit;

    // $model->nama = "ubah dari kode";
    $model->save();
    ?>
     
<hr>
     
    <?php $listBuku = Buku::findAll(['44']);  ?>
    <?php foreach ($listBuku as $buku)?>
    <p><?=$buku->nama; ?> - <?= $buku->sinopsis; ?></p>
    <p><?=$buku->tahun_terbit; ?> - <?= $buku->id_penulis; ?></p>
</div>
</div>