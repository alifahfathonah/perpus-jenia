<?php

namespace app\controllers;

use Yii;
use app\models\Penerbit;
use app\models\PenerbitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpOffice\PhpWord\IOfactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * PenerbitController implements the CRUD actions for Penerbit model.
 */
class PenerbitController extends Controller
{

    public $layout = 'main';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Penerbit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenerbitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Penerbit model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Penerbit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penerbit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Penerbit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Penerbit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Penerbit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penerbit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penerbit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportWord()
    {
         $phpWord = new phpWord();
        $phpWord -> setDefaultFontSize(11);

        $section = $phpWord->addSection(
                [
                    'marginTop' => Converter::cmTotwip(1.80),
                    'marginBottom' => Converter::cmTotwip(1.80),
                    'marginLeft' => Converter::cmTotwip(1.2),
                    'marginRight' => Converter::cmTotwip(1.6),
                ]
        );  
        $fontStyle = [
            'underline' => 'dash',
            'bold'      => true,
            'italic'    => true,
        ];

        $bgColor = [
            'bgColor' => '0000ff',
        ];

        $paragraphCenter = [
                'alignment' =>'center',   
            ];

        $headerStyle = [
                'bold' =>true,
            ];

        $section->addText(
                'PERPUSTAKAAN ONLINE',
                $bgColor,
                $paragraphCenter
        );

        $section->addText(
            'Jenia Adella',
            $bgColor,
            $paragraphCenter,
            $headerStyle
        );

        $judul = $section->addTextRun($paragraphCenter);
        $judul -> addText('Daftar Penerbit', $fontStyle);
        $judul = $section->addTextRun($paragraphCenter);

        $judul ->addText('nama penerbit', ['italic'=>true]);
        $section-> addTextBreak(1);

        $table = $section->addTable([
            'alignment' => 'center',
            'bgColor'   => '000000',
            'borderSize' => 5,
        ]);

        $table->addRow(null);
        $table->addCell(500)->addText('NO', $headerStyle, $paragraphCenter);
        $table->addCell(5000)->addText('Nama Penerbit', $headerStyle, $paragraphCenter);
        $table->addCell(5000)->addText('Alamat', $headerStyle, $paragraphCenter);
        $table->addCell(5000)->addText('No. Telp', $headerStyle, $paragraphCenter);
        $table->addCell(5000)->addText('E-mail', $headerStyle, $paragraphCenter);

        $semuaPenerbit = Penerbit::find()->all(); $nomor = 1;
        foreach ($semuaPenerbit as $penerbit ) {
            $table->addRow(null);
            $table->addCell(500)->addText($nomor++, null, $paragraphCenter);
            $table->addCell(5000)->addText($penerbit->nama,null, $paragraphCenter);  
            $table->addCell(5000)->addText($penerbit->alamat,null, $paragraphCenter);  
            $table->addCell(5000)->addText($penerbit->telepon,null, $paragraphCenter);  
            $table->addCell(5000)->addText($penerbit->email,null, $paragraphCenter);  
        }

    
     $filename = time() . 'export-penulis.docx';
       $path = 'exportfile/'. $filename;
       $xmlWriter = IOfactory::createWriter($phpWord,'Word2007');
       $xmlWriter -> save($path);
       return $this -> redirect($path);
    
    }
     public function actionExportExcel() {
     
    $spreadsheet = new PhpSpreadsheet\Spreadsheet();
    $worksheet   = $spreadsheet->getActiveSheet();
     
    //Menggunakan Model

    $database = Penerbit::find()
    ->select('nama, alamat, telepon, email')
    ->all();

    $worksheet->setCellValue('A1', 'nama');
    $worksheet->setCellValue('B1', 'alamat');
    $worksheet->setCellValue('C1', 'telepon');
    $worksheet->setCellValue('D1', 'email');
  
    //JIka menggunakan DAO , gunakan QueryAll()
     
    /*
     
    $sql = "select kode_jafung,jenis_jafung from ref_jafung"
     
    $database = Yii::$app->db->createCommand($sql)->queryAll();
     
    */
     
    $database = \yii\helpers\ArrayHelper::toArray($database);
    $worksheet->fromArray($database, null, 'A2');
     
    $writer = new Xlsx($spreadsheet);
     
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="penerbit.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
     
    }
}
