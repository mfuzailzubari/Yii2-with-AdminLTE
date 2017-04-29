<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WordManagement\WordTranslation */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Word Translation',
]) . $model->getSourceWord() . ' = ' . $model->getTargetWord();;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Word Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->wt_id, 'url' => ['view', 'id' => $model->wt_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Word Translation            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Word Translation</a></li>
            <li class="active"><?= Html::encode($this->title) ?></li>
        </ol>
    </section>
    <section class="content">

        <!--Default box--> 
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

                <!-- <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>-->
            </div>
            <div class="box-body">
                <!--Start creating your amazing application!-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
            <!--/.box-body--> 
            <div class="box-footer">
                <!--Footer-->
            </div>
            <!--/.box-footer-->
        </div>
    </section>
</div>