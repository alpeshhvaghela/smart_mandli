<?php

namespace app\controllers;
use Yii;

use app\models\Cities;
use app\models\Districts;
use app\models\Talukas;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\helpers\StringHelper;

class CommanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionTalukalist()
    {
        // \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // $result = [];
        // $post = yii::$app->request->post();
        // if(isset($post['depdrop_parents'])){
        //     $parents = $post['depdrop_parents'];

        // if( $parents != null){
        //     $district_id = $parents[0];

        //     $talukalist = Cities::getTalukaslist($district_id);
        // }    
        // if(!$district_id){
        //     return ['output' => '','selected' => ''];
        // }
        // $tl = [];
        // foreach($talukalist as $taluka){
        //     $tl [] = ['id' =>$taluka['id'],'name' => $taluka['name']];
        // }
        // return ['output' => $tl,'selected' => $district_id];
        // }

        $parents = Yii::$app->request->post('depdrop_parents');
		$out = [];
        $district_id = $parents[0];
		
		
		if ($parents[0] != "") {
			if ($parents != null) {
				if (!empty($parents)) {
					$model = Cities::getTalukaslist($district_id);
				} 

				if (!empty($model)) : foreach ($model as $value) :
						$out[] = array("id" => $value->id, "name" => $value->name);
					endforeach;
				endif;
				return Json::encode(['output' => $out, 'selected' => Yii::$app->request->get('selected')]);
			}
		}
		return Json::encode(['output' => '', 'selected' => Yii::$app->request->get('selected')]);
    }

    public function actionCitylist()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $taluka_id = $parents[0];
                $model = Cities::find()->where(['taluka_id' => $taluka_id])->all();
                foreach ($model as $city) {
                    $out[] = ['id' => $city->id, 'name' => $city->name];
                }
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);

    }

    public function actionChangeLanguage($language)
    {
        Yii::$app->session->set('language', $language);
        Yii::$app->language = $language;

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $language = Yii::$app->session->get('language', 'en-US');
        Yii::$app->language = $language;

        return true;
    }

    public static function getPageTitle($page_url, $isProductTitle = false)
	{
		$productTitle = Yii::$app->controller->id;
        echo"<pre>";print_r($productTitle);echo"</pre>";exit;
		// $model = Menus::find()->andWhere(["page_url" => $page_url])->one();
		// $pageTitle = !empty($model->name) ? $model->name : "Untitled";
		// if ($isProductTitle) {
		// 	return $productTitle . " | " . $pageTitle;
		// } else {
		// 	return $pageTitle;
		// }
	}
}
