<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
?>
<div class="site-reg">

    <?php $form = ActiveForm::begin([
        'id' => 'Reg-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput()?>
    
        <div class="form-group">
		 <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
			</div>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-reg -->
