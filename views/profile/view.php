<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $dataProvider string */
/* @var $form ActiveForm */
/*<?php $form = ActiveForm::begin(); ?>
<?php
if($model->user)
    echo $form->field($model->user, 'username');
?>
<?= $form->field($model, 'first_name') ?>
<?= $form->field($model, 'last_name') ?>

<div class="form-group">
    <?= Html::submitButton('Редактировать', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>*/
?>
<div class="main-profile">

    <div class="profile_block">
            <div class="row">
                <div class="col-xs-3">
                    <div class="profile_avatar">
                        <img src="http://brandonmathis.com/projects/fancy-avatars/demo/images/avatar_male_dark_on_clear_200x200.png" width="200" height="200">
                    </div>
                    <div class="profile_button">
                        <?php
                            Modal::begin([
                                'header' => '<h3>Редактировать</h3>',
                                'toggleButton' => [
                                    'label' => 'Редактировать',
                                    'tag' => 'button',
                                    'class' => 'btn btn-primary',
                                ],
                                //'footer' => ''
                            ]);?>
                        <?php $form = ActiveForm::begin([
							'action' => ['/profile/update', 'id' => $model->id],
							'method' => 'post'
						]); ?>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#panel1">Личные данные</a></li>
                            <li><a data-toggle="tab" href="#panel2">Контакты</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="panel1" class="tab-pane fade in active">
                                <?= $form->field($model, 'first_name')->textInput() ?>
                                <?= $form->field($model, 'last_name')->textInput() ?>

                            </div>
                            <div id="panel2" class="tab-pane fade">

                                <?= $form->field($model, 'phone')->textInput() ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                        <?php Modal::end(); ?>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="profile_data">
                        <div class="profile_data_head">
                            <span class="profile_name">
                                <?= Yii::$app->user->identity['username'] ?>
                                <?php if($model->last_name != NULL || $model->first_name != NULL): ?>
                                    <span class="profile_FSM">
                                        (
                                            <?= $model->last_name ?>
                                            <?= $model->first_name ?>
                                        )
                                    </span>
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="profile_body">
                            <table class="profile_table">
                                <tr>
                                    <td class="profile_info">Город:</td>
                                    <td class="profile_data_text">
										<?= $model->address ?>
									</td>
                                </tr>
                                <?php if ($model->phone != null):?>
                                <tr>
                                    <td class="profile_info">Контакты:</td>
                                    <td class="profile_data_text">
                                        <?= $model->phone ?>
                                    </td>
                                </tr>
                                <?php endif;?>
                                <tr>
                                    <td class="profile_info">О себе:</td>
                                    <td class="profile_data_text">none</td>
                                </tr>
                            </table>
                        </div>
                        <div class="profile_footer">

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <h2 class="profile_h">Заказанный товар</h2>
    <div class="profile_order_view">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model) {
                return $this->render('/main/order_profile',[
                    'model' => $model
                ]);
            },
        ]) ?>
    </div>
</div><!-- main-profile -->
