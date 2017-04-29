<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\WordManagement\Word;
use app\models\WordManagement\Language;

/* @var $this yii\web\View */
/* @var $model app\models\WordManagement\WordTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="word-translation-form">

    <?php $form = ActiveForm::begin(['class' => 'form-horizontal']); ?>

    <?= $form->field($model, 'wt_source_word_id')->dropDownList(yii\helpers\ArrayHelper::map(Word::getWords(), 'word_id', 'word_name'))->label('Source Word') ?>

    <?= $form->field($model, 'wt_target_word_id')->dropDownList(yii\helpers\ArrayHelper::map(Word::getWords(), 'word_id', 'word_name'))->label('Translated Word') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
