<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\loginForm */
/* @var $form ActiveForm */
?>
<div class="default-login">

     <?php $form = ActiveForm::begin();?>    
        

        <?= $form->field($model, 'username') ->textInput(['autofocus' => true])?>
        <?= $form->field($model, 'password') ->passwordInput()?>
		<?= $form->field($model, 'rememberMe')->checkbox()?>
    
        <div class="form-group">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-login 