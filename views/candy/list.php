<h1>CandyList</h1>

<!--<a href="--><?php //echo \yii\helpers\Url::toRoute(['/candy/update']) ?><!--">Update</a><br>-->

<table>
<?php
foreach ($model as $value){
?>
    <tr>
        <td>
            <?= $value['name']; ?>
        </td>
        <td>
            <a href="<?php echo \yii\helpers\Url::toRoute(['/candy/update/'.$value['id']]) ?>">Update </a><br>
        </td>
        <td>
            <a href="<?php echo \yii\helpers\Url::toRoute(['/candy/show/'.$value['id']]) ?>"> Show </a><br>
        </td>
    </tr>
<?php } ?>
</table>

