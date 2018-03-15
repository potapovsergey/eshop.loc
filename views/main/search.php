<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.04.2017
 * Time: 9:53
 */

use yii\widgets\ListView;
use yii\bootstrap\Html;
use yii\widgets\Pjax;
/* @var $dataProvider string */
/* @var $model app\models\GoodsSearch */
/* @var $searchModel app\models\GoodsSearch */

?>
<div class="goods_list">
    <?php Pjax::begin(); ?><?= ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model) {
            return $this->render('goods_view',[
                'model' => $model
            ]);
        },
    ]) ?> <?php Pjax::end(); ?>
</div>

