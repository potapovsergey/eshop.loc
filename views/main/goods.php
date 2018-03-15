<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.05.2017
 * Time: 16:14
 */

use yii\bootstrap\Html;
use app\models\Characteristics;
use app\models\ValuesCharacteristics;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $model app\models\Goods */

$characteristics = ValuesCharacteristics::find();
$dataProvider = new ActiveDataProvider([
        'query' => $characteristics->where(['goods_id' => $model->id])
]);

?>
<div class="goods-view-modal">

</div>
<div class="goods_img_block">
    <?php $images = $model->getImages($model->id); ?>
    <?php foreach($images as $img): ?>
        <div class="goods_view_image">
            <img src="<?= $img->getUrl('175x175'); ?>" alt="">
        </div>
    <?php endforeach; ?>
</div>
<p class="goods_name">Краткое описание</p>
<div class="goods_view_description">
    <?= $model->small_description ?><br>
</div>
<p class="goods_name">Описание</p>
<div class="goods_view_description">
    <?= $model->description ?><br>
</div>
<p class="goods_name">Характеристики</p>
<div class="goods_view_description">
    <table class="characteristics_table">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model) {
                return $this->render('characteristics',[
                    'model' => $model
                ]);
            },
        ]) ?>
    </table>
</div>