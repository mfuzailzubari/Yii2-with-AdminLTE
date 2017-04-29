<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppLoginAsset;

$assets = AppLoginAsset::register($this);
$baseURL = $assets->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition login-page">
        <?php $this->beginBody() ?>

        <div class="login-box">
            <div class="login-logo">
                <a href="/">
                    <!--<b>Booking Advisors</b><br/>-->
                    Admin <?= $this->title ?></a>
            </div>
            <!-- /.login-logo -->

            <?= $content ?>

        </div>
        <!-- /.login-box -->

        <?php $this->endBody() ?>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',

                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
<?php $this->endPage() ?>
