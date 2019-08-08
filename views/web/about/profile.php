<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <link href="/admin/css/style.min.css-v=4.0.0.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>公司简介</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">选项1</a>
                                </li>
                                <li><a href="#" >选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php
                        $form = ActiveForm::begin([
                            "options" => [
                                'class' => 'form-horizontal m-t',
                                'id' => 'signupForm'
                            ]
                        ]);
                        ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">内容：</label>
                                <div class="col-sm-8">
                                   <div id="explain2"><?= $model['profile'] ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                <?= html::submitButton('提交', ['class' => 'btn btn-primary tj']) ?>&nbsp;&nbsp;
                                </div>
                            </div>
                            <input type="hidden" name="profile" id="ht"/>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/admin/js/jquery.min.js-v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js-v=3.3.5"></script>
    <script src="/admin/js/content.min.js-v=1.0.0"></script>
    <script src="/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/admin/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/admin/js/success.js"></script>
    <script src="https://unpkg.com/wangeditor@3.1.1/release/wangEditor.min.js"></script>
    <script>
        var E = window.wangEditor
        var editor=new E('#explain2')
        editor.customConfig.uploadFileName='file'//Upload
        editor.customConfig.uploadImgServer='<?= Url::to(['web/success/upload']) ?>'
        editor.customConfig.uploadImgHeaders = {
            '_csrf': '<?= Yii::$app->request->csrfToken ?>'
        }
        editor.create()

    </script>
    <script>
        $(function(){
            $('.tj').click(function(){
                // console.log(editor.txt.html());
                $('#ht').val(editor.txt.html());
            });
        })
    </script>

</body>

</html>
