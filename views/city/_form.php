<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Districts;
use app\models\Talukas;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;


$form = ActiveForm::begin(['id' => 'city-form', 'enableClientValidation' => true, 'enableAjaxValidation' => false, 'options' => ['enctype' => 'multipart/form-data', 'autocomplete' => "off"]]);
$this->registerJsFile('@web/js/city.js',['depends' => [\yii\web\JqueryAsset::class]]);
?>


<div class="row mb-4">
	<div class="col-4">
        <?php
            echo $form->field($model, 'district_id')->widget(Select2::classname(), [
                'data' => Districts::getDistricts(),
                'options' => ['placeholder' => 'Select District'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
        ?>
	</div>
	<div class="col-4">
        <?php
        echo $form->field($model, 'taluka_id')->widget(DepDrop::classname(), [
            // 'data' => $district,
            'options' => ['placeholder' => 'Select ...'],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => false]],
            'pluginOptions' => [
                'depends' => ['cities-district_id'],
                'initialize' => true,
                'url' => Url::to(['comman/talukslist']),
            ],
            ]);
        ?>
    </div>
    <div class="col-4">
        <?php echo $form->field($model, 'name'); ?>
    </div>
</div>
<div class="row">
    <div class="border-bottom mb-2"></div>
</div>
<div class="text-end">
    <?php echo Html::submitButton('Submit', ['class' => 'btn btn-primary mr-2']); ?>
    <?php echo yii\helpers\Html::a('Back', ["index"], ['class' => 'btn btn-secondary']); ?>
</div>

<?php ActiveForm::end() ?>

