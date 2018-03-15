<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.04.2017
 * Time: 1:13
 */

use yii\helpers\Url;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model app\models\Goods */

?>
<div class="goods_block">
    <div class="goods_head">
        <span class="goods_name"><?= $model->name ?></span>
    </div>
    <div class="goods_body">
        <div class="goods_image">
            <?php
            $image = $model->getImage($model->id);
            ?>
            <img src="<?= $image->getUrl('175x175'); ?>" alt="">
        </div>
        <div class="goods_description">
            <?php $description = substr($model->small_description, 0, 302);
                  echo $description.'...';
            ?>
        </div>
    </div>
    <div class="goods_footer">
        <span class="goods_price_footer">Цена:</span><span class="goods_price"><?= $model->price ?></span><br>
        <div class="btn-group" role="group" aria-label="...">
            <a type="button" href="<? Url::to(['/cart/add', 'id' => $model->id]) ?>" class="btn btn-primary cart_add" id="cart_add" data-id="<?= $model->id ?>">В Корзину <span class="glyphicon glyphicon-shopping-cart"></span></a>
            <a type="button" href="" class="btn btn-info btn-goods-view" data-id="<?= $model->id ?>">Подробнее <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
    </div>
</div>

<?php
    Modal::begin([
        'header' => '<h3 class="goods_name">'.$model->name.'</h3>
        <div class="goods_modal_header_text">
            <p><span class="goods_characteristic">Категория: </span>'.$model->category->title.'</p> 
            <p><span class="goods_characteristic">Производитель: </span>'.$model->manufactory->title.'</p>
        </div>
        ',
        'id' => $model->id,
        'size' => 'modal-lg',
        'footer' => '<div class="goods_count_t">Количество</div><div class="goods_modal_btn">Цена:<span class="goods_price">'. $model->price .'</span>
        <div class="input-group">
        <input type="number" class="form-control count_price" min="1" data-id="'.$model->id.'" value="1" id="count'.$model->id.'" data-value="'.$model->price.'">        
      <span class="input-group-btn">
        <a type="button" href="'. Url::to(['/cart/add', 'id' => $model->id]) .'" class="btn btn-primary cart_add_count" id="buy'.$model->id.'" data-id="'.$model->id.'">'.$model->price.' <span class="glyphicon glyphicon-shopping-cart"></span></a>
      </span>
    </div></div>'
    ]);

    echo $this->render('goods', ['model' => $model]);

    Modal::end();
?>