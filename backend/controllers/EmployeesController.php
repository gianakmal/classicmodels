<?php

namespace backend\controllers;

use Yii;
use backend\models\Employees;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Offices;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * EmployeesController implements the CRUD actions for Employees model.
 */
class EmployeesController extends Controller
{
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
     * Lists all Employees models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Employees::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employees model.
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
     * Creates a new Employees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employees();

        $officeCode0 = Offices::find()->all();
        $officeCode0 = ArrayHelper::map($officeCode0,'officeCode','city');

        $reportsTo0 = Employees::find()->all();
        $reportsTo0 = ArrayHelper::map($reportsTo0,'reportsTo','firstName');
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //mulai dari sini untuk upload gambar
            // echo '<pre>';
            // print_r($image);
            // exit;
            // echo '</pre>';
            // $model->save();
            // $picId=$model->id;
            // $image = UploadedFile::getInstance($model, 'pic');
            // $imgName = 'pic_'.$picId.'.'.$image->getExtension();
            // $image->saveAs(YIi::getAlias('@picImgPath') . '/' .$imgName);//here we need to give path where to upload this function works same as move_uploaded_file in php
            // $model->pic = $imgName;
            // $model->save();
            
            // $picture = UploadedFile::getInstance($model,'picture');
            // $model->pic = $picture->name;
            // $model->save();
            // $picture->saveAs(Yii::$app->basePath . '/web/upload/' . $picture->name);
                        
            return $this->redirect(['view', 'id' => $model->employeeNumber]);
        }

        return $this->render('create', [
            'model' => $model,
            'officeCode0' => $officeCode0,
            'reportsTo0' => $reportsTo0,
        ]);
    }

    /**
     * Updates an existing Employees model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $officeCode0 = Offices::find()->all();
        $officeCode0 = ArrayHelper::map($officeCode0,'officeCode','city');

        $reportsTo0 = Employees::find()->all();
        $reportsTo0 = ArrayHelper::map($reportsTo0,'reportsTo','firstName');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->employeeNumber]);
        }

        return $this->render('update', [
            'model' => $model,
            'officeCode0' => $officeCode0,
            'reportsTo0' => $reportsTo0,
        ]);
    }

    /**
     * Deletes an existing Employees model.
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
     * Finds the Employees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employees::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
