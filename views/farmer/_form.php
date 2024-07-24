<?php

use app\models\Cities;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Districts;
use app\models\Farmertype;
use app\models\Talukas;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use kartik\datecontrol\DateControl;
use app\models\Sex;
use app\models\Caste;


$sex = ArrayHelper::map(sex::getAll(), 'id', 'name');
$cast = ArrayHelper::map(Caste::getAll(), 'id', 'name');

//$form = ActiveForm::begin(['id' => 'city-form', 'enableClientValidation' => true, 'enableAjaxValidation' => false, 'options' => ['enctype' => 'multipart/form-data', 'autocomplete' => "off"]]);
$disrict = ArrayHelper::map(Districts::getAll(), 'id', 'name');
$farmertype = ArrayHelper::map(Farmertype::getAll(), 'id', 'name');
$taluka = ArrayHelper::map(Talukas::find()->andWhere(['district_id' => $model->district_id])->all(), "id", 'name');
$city =  ArrayHelper::map(Cities::find()->andWhere(['taluka_id' => $model->taluka_id])->all(), "id", 'name');
$form = ActiveForm::begin([
    'id' => 'farmer-form',
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'options' => ['enctype' => 'multipart/form-data', 'autocomplete' => "off"]
]);

?>



<div class="row mb-4">
    <div class="col-4 font">
        <?php echo $form->field($model, 'name'); ?>
    </div>
    <div class="col-4">
        <?php echo $form->field($model, 'father_name'); ?>
    </div>
    <div class="col-4">
        <?php echo $form->field($model, 'last_name'); ?>
    </div>

</div>
<div class="row mb-4">
    <div class="col-4">
        <?php
        echo $form->field($model, 'district_id')->widget(Select2::classname(), [
            'data' => $disrict,
            'options' => ['placeholder' => 'Select District'],
            'pluginOptions' => [
                'allowClear' => true,
                'selectOnClose' => true,
            ],
        ]);
        ?>
    </div>
    <div class="col-4">
        <?php
        echo $form->field($model, 'taluka_id')->widget(DepDrop::classname(), [
            'type' => DepDrop::TYPE_SELECT2,
            'data' => !empty($model->district_id) ? $taluka : [],
            'select2Options' => [
                'pluginOptions' => [
                    'selectOnClose' => true,
                ],
            ],
            'pluginOptions' => [
                'depends' => ['farmer-district_id'],
                'placeholder' => 'Select Taluka',
                'initialize' => true,
                'url' => Url::to(['comman/talukalist']),
            ]
        ]);
        ?>
    </div>
    <div class="col-4">
        <?php
        echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
            'type' => DepDrop::TYPE_SELECT2,
            'data' => !empty($model->taluka_id) ? $city : [],
            'select2Options' => [
                'pluginOptions' => [
                    'selectOnClose' => true,
                ],
            ],
            'pluginOptions' => [
                'depends' => ['farmer-taluka_id'],
                'placeholder' => 'Select City',
                'initialize' => true,
                'url' => Url::to(['comman/citylist']),
            ]
        ]);
        ?>
    </div>
    <div class="row mb-4">
        <div class="col-4">
            <?php
            echo $form->field($model, 'birth_date')->widget(DateControl::classname(), [
                'type' => DateControl::FORMAT_DATE,
                'ajaxConversion' => false,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]
            ]);
            ?>
        </div>
        <div class="col-4">
            <?php
            //echo $form->field($model, 'joining_date')->widget(DateControl::classname());
            echo $form->field($model, 'joining_date')->widget(DateControl::classname(), [
                'type' => DateControl::FORMAT_DATE,
                'ajaxConversion' => false,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]
            ]); 
            ?>
        </div>
        <div class="col-4">
            <?php 
            echo $form->field($model, 'regi_date')->widget(DateControl::classname(), [
                'type' => DateControl::FORMAT_DATE,
                'ajaxConversion' => false,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]
            ]); 
            ?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-4">
            <?php echo $form->field($model, 'farm_type_id')->widget(Select2::classname(), [
                'data' => $farmertype,
                'options' => ['placeholder' => 'Select Farmer Type '],
                'pluginOptions' => [
                    'allowClear' => true,
                    'selectOnClose' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-4">
            <?php
            echo $form->field($model, 'sex_id')->widget(Select2::classname(), [
                'data' => $sex,
                'options' => ['placeholder' => 'Select Gender'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'selectOnClose' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-4">
            <?php
            echo $form->field($model, 'cast_id')->widget(Select2::classname(), [
                'data' => $cast,
                'options' => ['placeholder' => 'Select Caste'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'selectOnClose' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-4">
            <?php
            echo $form->field($model, 'tharav_date')->widget(DateControl::classname(), [
                'type' => DateControl::FORMAT_DATE,
                'ajaxConversion' => false,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]
            ]); 
            ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'tharav_no')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'pan_card')->textInput([]); ?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-4">
            <?php echo $form->field($model, 'addhar_card_no')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'voter_id_no')->textInput(["class" => "text-uppercase"]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'mobile_number')->textInput(['inputmode' => 'text', 'lang' => 'en-US',]); ?>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="border-bottom mb-2">
        <h4>ખેડૂત ના ખાતા નંબર</h4>
    </div>
</div>
<div class="container-fluid">
    <div class="row"></div>
    <div class="row mb-4">
        <div class="col-4">
            <?php echo $form->field($model, 'sav_ac_no')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'emp_cif_no')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'emp_cif1_no')->textInput([]); ?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-4">
            <?php echo $form->field($model, 'tkcc_short')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'tkkc_3L')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'kisan_mitra')->textInput([]); ?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-4">
            <?php echo $form->field($model, 'tkishan_su')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'tgowndown_mm')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'tjlg_grp')->textInput([]); ?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-4">
            <?php echo $form->field($model, 'pasu_loan')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'tmadhyamudat_m')->textInput([]); ?>
        </div>
        <div class="col-4">
            <?php echo $form->field($model, 'other_cd1')->textInput([]); ?>
        </div>
    </div>
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