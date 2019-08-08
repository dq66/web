<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Alert;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台 - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">

    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <link href="/admin/css/style.min.css-v=4.0.0.css" rel="stylesheet">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">
<?php
            // 后台错误输出提示
if (Yii::$app->getSession()->hasFlash('error')) {
    echo Alert::widget([
        'options' => ['class' => 'alert-error'],
        'body' => Yii::$app->session->getFlash('error')
    ]);
}
            // 后台成功输出提示
if (Yii::$app->getSession()->hasFlash('success')) {
    echo Alert::widget([
        'options' => ['class' => 'alert-success'],
        'body' => Yii::$app->session->getFlash('success')
    ]);
}
?>
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">H+</h1>

            </div>
            <h3>后端管理</h3>
            <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'm-t',
                    'role' => 'form'
                ]
            ]); ?>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="pwd" class="form-control" placeholder="密码" required="">
                </div>

                <?= html::submitButton('登录', ['class' => 'btn btn-primary block full-width m-b']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <script src="/admin/js/jquery.min.js-v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js-v=3.3.5"></script>
</body>

</html>
