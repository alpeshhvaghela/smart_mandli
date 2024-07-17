<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Districts;

?>

<?php $form = ActiveForm::begin(['id' => 'taluka-form', 'enableClientValidation' => true, 'enableAjaxValidation' => false, 'options' => ['enctype' => 'multipart/form-data', 'autocomplete' => "off"]]);?>
<div class="row mb-4">
<div class="col-4">
        <?php echo $form->field($model, 'name'); ?>
    </div>
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
</div>
<div class="row">
    <div class="border-bottom mb-2"></div>
</div>
<div class="text-end">
    <?php echo Html::submitButton('Submit', ['class' => 'btn btn-primary mr-2']); ?>
    <?php echo yii\helpers\Html::a('Back', ["index"], ['class' => 'btn btn-secondary']); ?>
</div>



<?php ActiveForm::end() ?>