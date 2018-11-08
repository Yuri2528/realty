<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RealtySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Realties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Realty'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'short_content:ntext',
            'content:ntext',
            'category_id',
            // 'users_id',
            // 'country',
            // 'city',
            // 'area',
            // 'adress',
            // 'square',
            // 'nuber_of_storeys',
            // 'floor',
            // 'price',
            // 'image_url:url',
            // 'gallery_id',
            // 'created_at',
            // 'updated_at',
            // 'phone',
            // 'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
