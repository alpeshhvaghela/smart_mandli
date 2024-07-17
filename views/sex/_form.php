<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'options' => [
        'autocomplete' => 'off'
    ]
]) ?>
<div class="row mb-4">
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