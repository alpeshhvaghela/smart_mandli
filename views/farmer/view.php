<?php

use kartik\detail\DetailView;
?>

<?php
echo DetailView::widget([
    'model' => $model,
    'condensed' => true,
    'hover' => true,
    'mode' => DetailView::MODE_VIEW,
    'panel' => [
        'heading' => 'Farmer Details',
        'type' => DetailView::TYPE_INFO,
    ],
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
            'value' =>$model->district->name 
        ],
        'mobile_number',
        [
            'attribute' => 'birth_date',
            'format' => 'date',
            'type' => DetailView::INPUT_DATE,
        

        ],
        [
            'attribute' => 'joining_date',
            'format' => 'date',
            'type' => DetailView::INPUT_DATE,
        

        ],
        [
            'attribute' => 'regi_date',
            'format' => 'date',
            'type' => DetailView::INPUT_DATE,
        

        ],
        [
            'attribute' => 'sex_id',
            // 'label' => 'District',
            'value' =>$model->sex->name 
        ],
        [
            'attribute' => 'farm_type_id',
            // 'label' => 'District',
            'value' =>$model->farmertype->name 
        ],
        [
            'attribute' => 'cast_id',
            // 'label' => 'District',
            'value' =>$model->cast->name 
        ],
        [
            'attribute' => 'tharav_date',
            'format' => 'date',
            'type' => DetailView::INPUT_DATE,
        

        ],
        'tharav_no',
        [
            'attribute'=>'sav_ac_no',
            'visible' => !empty($model->sav_ac_no),
        ],
        [
            'attribute'=>'emp_cif_no',
            'visible' => !empty($model->emp_cif_no),
        ],
        [
            'attribute'=>'emp_cif1_no',
            'visible' => !empty($model->emp_cif_no),
        ],
        [
            'attribute'=>'tkcc_short',
            'visible' => !empty($model->sav_ac_no),
        ],
        [
            'attribute'=>'tkishan_su',
            'visible' => !empty($model->emp_cif_no),
        ],
        [
            'attribute'=>'tmadhyamudat_m',
            'visible' => !empty($model->emp_cif_no),
        ],
        [
            'attribute'=>'tgowndown_mm',
            'visible' => !empty($model->emp_cif_no),
        ],
        [
            'attribute'=>'tjlg_grp',
            'visible' => !empty($model->tjlg_grp),
        ],
        [
            'attribute'=>'other_cd1',
            'visible' => !empty($model->emp_cif_no),
        ],
        [
            'attribute'=>'tkkc_3L',
            'visible' => !empty($model->emp_cif_no),
        ],
        [
            'attribute'=>'kisan_mitra',
            'visible' => !empty($model->emp_cif_no),
        ],
        'pan_card',
        'voter_id_no',
        'addhar_card_no',

    ]
]);
