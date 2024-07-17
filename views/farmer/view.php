<?php

use kartik\detail\DetailView;
?>
<div class="row">
<h5>Farmer Details</h5>
</div>
<?php 
echo DetailView::widget([
    'model'=>$model,
    'mode'=>DetailView::MODE_VIEW,
    'attributes'=>[
        'id',
        'name',
        '',
        '',
        '',
        // ['attribute'=>'publish_date', 'type'=>DetailView::INPUT_DATE],
    ]
]);