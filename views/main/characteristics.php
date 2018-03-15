<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.05.2017
 * Time: 16:52
 */

use app\models\Characteristics;

/* @var $model app\models\ValuesCharacteristics */

$characteristics = Characteristics::findOne(['id' => $model->characteristics_id]);

?>

<tr>
    <td class="characteristics_info"><?= $characteristics->title ?>:</td>
    <td class="characteristics_data_text">
        <?= $model->values ?>
    </td>
</tr>

