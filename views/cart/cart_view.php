<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.04.2017
 * Time: 16:51
 */

use yii\helpers\Url;
use yii\bootstrap\Html;
use app\assets\AppAsset;
use yii\widgets\Pjax;

$this->registerJsFile('@web/js/cart.js');
?>
<?php if (!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th><span class="glyphicon glyphicon-remove"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['count'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <?php Pjax::begin(); ?>
                    <td><?= Html::a('<span class="glyphicon glyphicon-remove text-danger"></span>', ['/cart/delete', 'id' => $id]); ?></td>
                    <?php Pjax::end(); ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">Итого: </td>
                <td><?= $session['cart.count'] ?></td>
            </tr>
            <tr>
                <td colspan="3">Сумма: </td>
                <td><?= $session['cart.sum'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>В Корзине пусто</h3>
<?php endif; ?>
