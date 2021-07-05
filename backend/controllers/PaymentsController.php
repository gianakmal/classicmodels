<?php

namespace backend\controllers;

use Yii;
use backend\models\Payments;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaymentsController implements the CRUD actions for Payments model.
 */
class PaymentsController extends Controller
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
     * Lists all Payments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Payments::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Payments model.
     * @param integer $customerNumber
     * @param string $checkNumber
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($customerNumber, $checkNumber)
    {
        return $this->render('view', [
            'model' => $this->findModel($customerNumber, $checkNumber),
        ]);
    }

    /**
     * Creates a new Payments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Payments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'customerNumber' => $model->customerNumber, 'checkNumber' => $model->checkNumber]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Payments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $customerNumber
     * @param string $checkNumber
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($customerNumber, $checkNumber)
    {
        $model = $this->findModel($customerNumber, $checkNumber);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'customerNumber' => $model->customerNumber, 'checkNumber' => $model->checkNumber]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Payments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $customerNumber
     * @param string $checkNumber
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($customerNumber, $checkNumber)
    {
        $this->findModel($customerNumber, $checkNumber)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Payments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $customerNumber
     * @param string $checkNumber
     * @return Payments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($customerNumber, $checkNumber)
    {
        if (($model = Payments::findOne(['customerNumber' => $customerNumber, 'checkNumber' => $checkNumber])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
