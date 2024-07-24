<?php

namespace app\controllers;

use Yii;

use app\models\Farmer;
use Exception;
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

    public function actionDelete($id)
    {
        $model = Farmer::find()->where(['id' => $id])->one();
        try {
            $model->is_deleted = true;
            $model->update(false);
            Yii::$app->session->setFlash('success', 'User deleted successfully');
        } catch (Exception $e) {
            Yii::$app->session->setFlash('error', 'Some error is there.');
        }
        return $this->redirect(['index']);
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

    public function actionNext($id)
    {
        $currentRecord = Farmer::findOne($id);
        if ($currentRecord) {
            $nextRecord = $currentRecord->getNextRecord();
            if ($nextRecord) {
                return $this->redirect(['view', 'id' => $nextRecord->id]);
            }
        }

        Yii::$app->session->setFlash('error', 'This is the last record.');
        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionLast()
    {
        $lastFarmer = Farmer::find()->orderBy(['id' => SORT_DESC])->one();

        if ($lastFarmer === null) {
            throw new NotFoundHttpException('No farmer found.');
        }

        // Render a view or return data
        return $this->render('view', [
            'model' => $lastFarmer,
        ]);
    }

    
    public function actionPrevious($id)
    {
        $currentRecord = Farmer::findOne($id);
        if ($currentRecord) {
            $previousRecord = $currentRecord->getPreviousRecord();
            if ($previousRecord) {
                return $this->redirect(['view', 'id' => $previousRecord->id]);
            }
        }

        Yii::$app->session->setFlash('error', 'This is the first record.');
        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionFirst()
    {
        $lastFarmer = Farmer::find()->orderBy(['id' => SORT_ASC])->one();

        if ($lastFarmer === null) {
            throw new NotFoundHttpException('No farmer found.');
        }

        // Render a view or return data
        return $this->render('view', [
            'model' => $lastFarmer,
        ]);
    }
}
