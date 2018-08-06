<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peminjaman".
 *
 * @property int $id
 * @property int $id_buku
 * @property int $id_anggota
 * @property string $tanggal_pinjam
 * @property string $tanggal_kembali
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */


     public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'nama');
    } 
    public static function tableName()
    {
        return 'peminjaman';
    }

      public function getBuku()
    {
       $model = Buku::findOne($this->id_buku);
       if ($model !==null) {
         return $model->nama;
       }else{
        return null;
       }
    }

public function getAnggota()
    {
       $model = Anggota::findOne($this->id_anggota);
       if ($model !==null) {
         return $model->nama;
       }else{
        return null;
       }
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
            'id_buku' => 'Nama Buku',
            'id_anggota' => 'Nama Anggota',
            'tanggal_pinjam' => 'Tanggal Pinjam',
            'tanggal_kembali' => 'Tanggal Kembali',
        ];
    }
}
