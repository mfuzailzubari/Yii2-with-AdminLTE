<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
?>


<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <p>
        <?php
//        if ($model->hasErrors()) {
//            echo $model->getFirstErrors();
//        }
        ?>
    </p>

    <?php
    $form = ActiveForm::begin([
                'id' => 'login-form',
//                'layout' => 'horizontal',
//                'fieldConfig' => [
//                    'template' => "\n<div lass=\"form-group has-feedback\">{input}</div><span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>",
//                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
//                ],
    ]);
    ?>

    <?= $form->errorSummary($model, ['header' => '']); ?>

    <?=
    $form->field($model, 'fname', ['template' =>
        "<div class=\"form-group has-feedback\">{input}<span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span></div>"])->textInput(['autofocus' => true, 'placeholder' => 'First Name'])
    ?>

    <?=
    $form->field($model, 'lname', ['template' =>
        "<div class=\"form-group has-feedback\">{input}<span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span></div>"])->textInput(['autofocus' => true, 'placeholder' => 'Last Name'])
    ?>

    <?=
    $form->field($model, 'email', ['template' =>
        "<div class=\"form-group has-feedback\">{input}<span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span></div>"])->textInput(['autofocus' => true, 'placeholder' => 'Email'])
    ?>

    <?=
    $form->field($model, 'password', ['template' =>
        "<div class=\"form-group has-feedback\">{input}<span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span></div>"])->passwordInput(['placeholder' => 'Password'])
    ?>

    <div class="row">

        <div class="col-xs-12">
            <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
            <?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>    

    <!--    <form action="../../index2.html" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                 /.col 
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                 /.col 
            </div>
        </form>-->

    <!--<a href="#">I forgot my password</a><br>-->
    <!--<a href="register.html" class="text-center">Register a new membership</a>-->

</div>
<!-- /.login-box-body -->