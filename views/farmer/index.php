<?php

use app\models\Talukas;
use kartik\select2\Select2;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">City/village</h5>
            <?php echo yii\helpers\Html::a('Create Farmer', ["farmer/create"], ['class' => 'btn btn-sm btn-primary mr-2']); ?>
        </div>
        <?php 
        Pjax::begin(); 
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
             
                'id',
                'name',
                'father_name',
                'last_name',
                [
                    'label' => 'City',
                    'attribute' => 'city_id',
                    'value' => function($data) {
                        return $data->city->name;
                    }
                ],
                [
                    'label' => 'Taluka',
                    'attribute' => 'taluka_id',
                    'filter' => Select2::widget([
                        'name' => 'city[taluka_id]',
                        'value' => $searchModel->taluka_id,
                        
                        'data' => Talukas::getTalukas(),
                        'options' => [
                            'placeholder' => 'તાલુકો'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]
                    ]),
                    'value' => function($data) {
                        return $data->taluka->name;
                    }
                ],
                [
                    'label' => 'District',
                    'attribute' => 'district_id',
                    // 'filter' => Select2::widget([
                    //     'name' => 'city[district_id]',
                    //     'value' => $searchModel->district_id,
                    //     'data' => Cities::getDistricts(),
                    //     'options' => [
                    //         'placeholder' => 'જિલ્લો'
                    //     ],
                    //     'pluginOptions' => [
                    //         'allowClear' => true
                    //     ]
                    // ]),
                    'value' => function($data) {
                        return $data->district->name;
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {Delete}',
                    'header' => 'Action',
                    'headerOptions' => ['class' => 'text-center'],
                    'contentOptions' => ['class' => 'col-1 text-center'],
                ],
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>