<?php

use yii\widgets\ActiveForm;

$form = ActiveForm::begin();

echo $form->field($user, 'first_name');
echo $form->field($user, 'last_name');
echo $form->field($user, 'email')->input('email');
echo $form->field($user, 'password')->input('password');
echo $form->field($user, 'password_confirm')->input('password');

echo \yii\helpers\Html::submitButton();

ActiveForm::end();
?>