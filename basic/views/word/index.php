<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Words');
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Word            <small>Vocabulary Time</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Word</a></li>
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
                    <?= Html::a(Yii::t('app', 'Add Word'), ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'word_id',
                        'word_name',
                        'word_detais',
                        [
                            'format' => 'raw',
                            'label' => 'Word Language',
                            'value' => function ($model) {
                                return Html::a($model->getWordLang()->one()->lang_name, Yii::$app->homeUrl . 'language/view?id=' . $model->word_lang_id);
                            },
                            'attribute' => 'Name',
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
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