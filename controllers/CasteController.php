<?php

namespace app\controllers;

use app\models\Caste;
use PhpParser\Node\Expr\Cast;
use Yii;

use yii\web\Controller;

class CasteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $searchModel = new Caste();
        $searchModel->load(Yii::$app->request->get());
        $dataProvider = $searchModel->search();
        return $this->render('index', array(
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ));
    }

    public function actionCreate()
    {
           
        $model = new Caste();
        if ($data = Yii::$app->request->post()) {
            $model->load($data);
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', "District created successfully.");
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = Caste::findOne($id);
        if ($data = Yii::$app->request->post()) {
            $model->load($data);
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', "District Updated successfully.");
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

   
}
