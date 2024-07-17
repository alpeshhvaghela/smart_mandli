<?php

use app\models\Districts;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\Pjax;

?>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">Taluka</h5>
            <?php echo yii\helpers\Html::a('Create Taluka', ["taluka/create"], ['class' => 'btn btn-sm btn-primary mr-2']); ?>
        </div>
        <?php 
        Pjax::begin(); 
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
               'id',
                [
                    'label' => 'Taluka Name',
                    'attribute' => 'name',
                ],
                [
                    'label' => 'District Name',
                    'attribute' => 'district_id',
                    'value' => 'district.name'
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