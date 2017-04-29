<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Word Translations');
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Word Translation            <small>Vocabulary Time</small>
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
                    <?= Html::a(Yii::t('app', 'Add Word Translation'), ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'format' => 'raw',
                            'label' => 'Source Word',
                            'value' => function ($model) {
                                return Html::a($model->getSourceWord(), Yii::$app->homeUrl . 'word/view?id=' . $model->wt_source_word_id);
                            },
                            'attribute' => 'Name',
                        ],
                        [
                            'format' => 'raw',
                            'label' => 'Source Language',
                            'value' => function ($model) {
                                return Html::a($model->getSourceLang(), Yii::$app->homeUrl . 'language/view?id=' . $model->wt_source_lang_id);
                            },
                            'attribute' => 'Name',
                        ],
                        [
                            'format' => 'raw',
                            'label' => 'Translated Word',
                            'value' => function ($model) {
                                return Html::a($model->getTargetWord(), Yii::$app->homeUrl . 'word/view?id=' . $model->wt_target_word_id);
                            },
                            'attribute' => 'Name',
                        ],
                        [
                            'format' => 'raw',
                            'label' => 'Translated Language',
                            'value' => function ($model) {
                                return Html::a($model->getTargetLang(), Yii::$app->homeUrl . 'language/view?id=' . $model->wt_target_lang_id);
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