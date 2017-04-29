<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WordManagement\Language */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="language-form">

    <?php $form = ActiveForm::begin(['class' => 'form-horizontal']); ?>

    <?= $form->field($model, 'lang_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lang_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
