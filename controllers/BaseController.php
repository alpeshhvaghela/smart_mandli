<?php

namespace app\components;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        $language = Yii::$app->request->get('language');
        if ($language) {
            Yii::$app->language = $language;
        }

        return parent::beforeAction($action);
    }
}
