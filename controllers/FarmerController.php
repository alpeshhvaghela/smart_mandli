<?php

namespace app\controllers;

use Yii;

use app\models\Farmer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FarmerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $searchModel = new Farmer();
        $searchModel->load(Yii::$app->request->get());
        $dataProvider = $searchModel->search();
        return $this->render('index', array(
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ));
    }

    public function actionCreate()
    {

        $model = new Farmer();
        if ($data = Yii::$app->request->post()) {
            $model->load($data);
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', "Farmer created successfully.");
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Farmer::findOne($id);
        if ($data = Yii::$app->request->post()) {
            $model->load($data);
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', "Farmer Updated successfully.");
                return $this->redirect(['view','id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
   
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Farmer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
