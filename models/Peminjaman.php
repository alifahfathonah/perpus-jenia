<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buku".
 *
 * @property int $id
 * @property string $nama
 * @property string $tahun_terbit
 * @property int $id_penulis
 * @property int $id_penerbit
 * @property int $id_kategori
 * @property string $sinopsis
 * @property string $sampul
 * @property string $berkas
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_buku', 'id_anggota', 'tanggal_pinjam', 'tanggal_kembali'], 'required'],
            [['id_buku', 'id_anggota'], 'integer'],
            [['tanggal_pinjam', 'tanggal_kembali'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_buku' => 'Buku',
            'id_anggota' => 'Anggota',
            'tanggal_pinjam' => 'Tanggal Pinjam',
            'tanggal_kembali' => 'Tanggal Kembali',
        ];
    }

        //relasi

    public function getBuku()
    {
        $model = Buku::findOne($this->id_buku);
        if ($model !== null) {
            return $model->nama;
        } else{
            return null;
        }

    }

          //relasi

    public function getAnggota()
    {
        $model = Anggota::findOne($this->id_anggota);
        if ($model !== null) {
            return $model->nama;
        } else{
            return null;
        }

    }
     
}
