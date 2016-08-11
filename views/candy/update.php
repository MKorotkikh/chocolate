<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h1>UpdateCandy</h1>
<?php

if ( Yii::$app->session->hasFlash('success') ) {
    echo Yii::$app->session->getFlash('success') . '<br>';
    ?>
    <a href="<?php echo \yii\helpers\Url::toRoute(['/candy/list']) ?>">Update another candy</a><br>
    <?php
}elseif (Yii::$app->session->hasFlash('error') ) {
    echo Yii::$app->session->getFlash('error');
    ?>
    <a href="<?php echo \yii\helpers\Url::toRoute(['/candy/list']) ?>">Still one attempt</a><br>
    <?php
}else{?>
    <?php
    $form = ActiveForm::begin(['options'=> ['enctype' => 'multipart/form-date']]);
    ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'price') ?>
    <?= $form->field($model, 'discription')->textarea(['rows' => 5]) ?>
    <?= $form->field($model, 'image')->fileInput() ?>
    <?= Html::submitButton('Отослать', ['class' => 'btn btn-success']) ?>
    <?php
    ActiveForm::end();
    ?>

<?php } ?>