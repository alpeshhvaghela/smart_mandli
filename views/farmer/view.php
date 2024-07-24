<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="farmer-view">
    <div class="bg-info hdr">
        <h2>Farmer Details</h2>
    </div>
    <div>
        <?php
        $this->registerCssFile("@web/css/farmer.css", [
            'depends' => [\yii\web\YiiAsset::class],
        ]);        

        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'father_name',
                'last_name',
                [
                    'attribute' => 'city_id',
                    'label' => 'City',
                    'value' => $model->city->name
                ],
                [
                    'attribute' => 'taluka_id',
                    'label' => 'Taluka',
                    'value' => $model->taluka->name
                ],
                [
                    'attribute' => 'district_id',
                    'label' => 'District',
                    'value' => $model->district->name
                ],
                'mobile_number',
                [
                    'attribute' => 'birth_date',
                    'format' => 'date',
                    // 'type' => DetailView::INPUT_DATE,

                ],
                [
                    'attribute' => 'joining_date',
                    'format' => 'date',
                    // 'type' => DetailView::INPUT_DATE,


                ],
                [
                    'attribute' => 'regi_date',
                    'format' => 'date',
                    // 'type' => DetailView::INPUT_DATE,


                ],
                [
                    'attribute' => 'sex_id',
                    // 'label' => 'District',
                    'value' => $model->sex->name
                ],
                [
                    'attribute' => 'farm_type_id',
                    // 'label' => 'District',
                    'value' => $model->farmertype->name
                ],
                [
                    'attribute' => 'cast_id',
                    'label' => 'Caste',
                    'value' => $model->cast->name
                ],
                [
                    'attribute' => 'tharav_date',
                    'format' => 'date',
                    // 'type' => DetailView::INPUT_DATE,

                ],
                'tharav_no',
                [
                    'attribute' => 'sav_ac_no',
                    'value' => !empty($model->sav_ac_no)?$model->sav_ac_no:"",
                ],
                [
                    'attribute' => 'emp_cif_no',
                    'value' => !empty($model->emp_cif_no)?$model->emp_cif_no:"",
                ],
                [
                    'attribute' => 'emp_cif1_no',
                    'value' => !empty($model->emp_cif1_no)?$model->emp_cif1_no:""
                ],
                [
                    'attribute' => 'tkcc_short',
                    'value' => !empty($model->tkcc_short)?$model->tkcc_short:""
                ],
                [
                    'attribute' => 'tkishan_su',
                    'value' => !empty($model->tkishan_su)?$model->tkishan_su:""
                ],
                [
                    'attribute' => 'tmadhyamudat_m',
                    'value' => !empty($model->tmadhyamudat_m)?$model->tmadhyamudat_m:""  
                ],
                [
                    'attribute' => 'tgowndown_mm',
                    'value' => !empty($model->tgowndown_mm)?$model->tgowndown_mm:""
                ],
                [
                    'attribute' => 'tjlg_grp',
                    'value' => !empty($model->tjlg_grp)?$model->tjlg_grp:""
                ],
                [
                    'attribute' => 'other_cd1',
                    'value' => !empty($model->other_cd1)?$model->other_cd1:""
                ],
                [
                    'attribute' => 'tkkc_3L',
                    'value' => !empty($model->tkkc_3L)?$model->tkkc_3L:"",
                ],
                [
                    'attribute' => 'kisan_mitra',
                    'value' => !empty($model->kisan_mitra)?$model->kisan_mitra:""
                ],
                'pan_card',
                'voter_id_no',
                'addhar_card_no',

            ],
            
        ]);
        ?>
    </div>
    <div>
        <?php echo Html::a('Add', ['add'], ['class' => 'btn btn-primary fr-v']) ?>
        <?php echo Html::a('Update', ['update'], ['class' => 'btn btn-primary fr-v']) ?>
        <?php echo Html::a('Delete', ['delete'], ['class' => 'btn btn-primary fr-v']) ?>
        <?php echo Html::a('First', ['first'], ['class' => 'btn btn-primary fr-v']) ?>
        <?php echo Html::a('Previous', ['previous', 'id' => $model->id], ['class' => 'btn btn-primary fr-v']) ?>
        <?php echo Html::a('Next', ['next', 'id' => $model->id], ['class' => 'btn btn-primary fr-v']) ?>
        <?php echo Html::a('Last', ['last'], ['class' => 'btn btn-primary fr-v']) ?>
    </div>
</div>