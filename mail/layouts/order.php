<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08.05.2017
 * Time: 5:10
 */

$session = Yii::$app->session;
?>

<?php echo $this->render('/cart/cart_view', compact('session')); ?>

