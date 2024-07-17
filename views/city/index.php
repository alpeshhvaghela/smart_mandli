<?php

use app\models\Districts;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use app\models\Talukas;

?>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">શહેર/ગામ</h5>
            <?php echo yii\helpers\Html::a('Create City', ["city/create"], ['class' => 'btn btn-sm btn-primary mr-2']); ?>
        </div>
        <?php 
        Pjax::begin(); 
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
             
                'id',
                [
                    'label' => 'City /village Name',
                    'attribute' => 'name',
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
                    'template' => '{update}',
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