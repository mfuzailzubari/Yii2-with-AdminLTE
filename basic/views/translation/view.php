<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WordManagement\WordTranslation */

$this->title = $model->getSourceWord() . ' = ' . $model->getTargetWord();
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Word Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

                <p>
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->wt_id], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->wt_id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ])
                    ?>
                </p>

                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'format' => 'raw',
                            'label' => 'Source Word',
                            'value' => $model->getSourceWord()
                        ],
                        [
                            'format' => 'raw',
                            'label' => 'Source Language',
                            'value' => $model->getSourceLang()
                        ],
                        [
                            'format' => 'raw',
                            'label' => 'Translated Word',
                            'value' => $model->getTargetWord()
                        ],
                        [
                            'format' => 'raw',
                            'label' => 'Translated Language',
                            'value' => $model->getTargetLang()
                        ],
                    ],
                ])
                ?>
            </div>
            <!--/.box-body--> 
            <div class="box-footer">
                <!--Footer-->
            </div>
            <!--/.box-footer-->
        </div>
    </section>
</div>