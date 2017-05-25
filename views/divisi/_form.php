<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Divisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="divisi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'divisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pembimbing')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
