<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.04.2017
 * Time: 0:45
 */

use yii\widgets\ListView;
use yii\bootstrap\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider string */
/* @var $searchModel app\models\GoodsSearch */

?>

<?php echo $this->render('search_bar', ['model' => $searchModel]); ?>

<div class="goods_list">
    <?php Pjax::begin(); ?><?= ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($searchModel) {
            return $this->render('goods_view',[
                'model' => $searchModel
            ]);
        },
    ]) ?> <?php Pjax::end(); ?>
</div>
