<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<style>
.headerindex{
    height: 45px;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 5px;
}   
</style>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center  headerindex">
            <h5 class="card-title">Farmers</h5>
            <?php echo yii\helpers\Html::a('Create Farmer', ["farmer/create"], ['class' => 'btn btn-sm btn-primary mr-2']); ?>
        </div>
        <?php 
        Pjax::begin(); 
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id',
                'name',
                'father_name',
                'last_name',
                [
                    'label' => 'City',
                    'attribute' => 'city_id',
                    'value' => function($dataProvider) {
                        return $dataProvider->city->name;
                    }
                ],
                [
                    'label' => 'Taluka',
                    'attribute' => 'taluka_id',
                    'value' => function($data) {
                        return $data->taluka->name;
                    }
                ],
                [
                    'label' => 'District',
                    'attribute' => 'district_id',
                    'value' => function($data) {
                        return $data->district->name;
                    }
                ],
                'mobile_number',
                'birth_date',
                'joining_date',
                [
                    'attribute' => 'sex_id',
                    'value' => function($data) {
                        return $data->sex->name;
                    }
                ],
                [
                    'attribute' => 'farm_type_id',
                    'value' => function($data) {
                        return $data->farmertype->name;
                    }
                ],
                [
                    'attribute' => 'cast_id',
                    'value' => function($data) {
                        return $data->caste->name;
                    }
                ],
            ],
        ],
        
    );
        Pjax::end();
        ?>
    </div>
</div>