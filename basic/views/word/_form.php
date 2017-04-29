<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\WordManagement\Language;

/* @var $this yii\web\View */
/* @var $model app\models\WordManagement\Word */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="word-form">

    <?php $form = ActiveForm::begin(['class' => 'form-horizontal']); ?>

    <!--?= $form->field($model, 'word_lang_id')->textInput() ?>-->

    <?= $form->field($model, 'word_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'word_detais')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'word_lang_id')->dropDownList(yii\helpers\ArrayHelper::map( Language::getLanguages(), 'lang_id', 'lang_name'))->label('Language') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
