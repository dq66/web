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
                        <h5>系统设置-基本参数</h5>
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
                            ],
                            'fieldConfig' => [
                                'template' => '<div class="form-group"><label class="col-sm-3 control-label">{label}</label><div class="col-sm-8">{input}</div>{error}</div>'
                            ]
                        ]);
                        ?>
                            <?= $form->field($model, 'title')->textInput([
                                'class' => 'form-control',
                                'aria-required' => 'true',
                                'aria-invalid' => 'true'
                            ]) ?>

                            <?= $form->field($model, 'logo')->fileInput() ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <img src="<?= $model->logo; ?>" id="logo" width="140px" height="40px">
                                </div>
                            </div>
                            <?= $form->field($model, 'keywords')->textInput([
                                'class' => 'form-control',
                                'aria-required' => 'true',
                                'aria-invalid' => 'true'
                            ]) ?>
                            <?= $form->field($model, 'description')->textInput([
                                'class' => 'form-control',
                                'aria-required' => 'true',
                                'aria-invalid' => 'true'
                            ]) ?>
                            <?= $form->field($model, 'qq')->textInput([
                                'class' => 'form-control',
                                'aria-required' => 'true',
                                'aria-invalid' => 'true'
                            ]) ?>
                            <?= $form->field($model, 'tel')->textInput([
                                'class' => 'form-control',
                                'aria-required' => 'true',
                                'aria-invalid' => 'true'
                            ]) ?>

                            <?= $form->field($model, 'rwm')->fileInput() ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <img src="<?= $model->rwm; ?>" id="rwm" width="177px" height="177px">
                                </div>
                            </div>
                            <?= $form->field($model, 'record')->textInput([
                                'class' => 'form-control',
                                'aria-required' => 'true',
                                'aria-invalid' => 'true'
                            ]) ?>
                            <?= $form->field($model, 'bjimg')->fileInput() ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <img src="<?= $model->bjimg; ?>" id="bjimg" width="330px" height="180px">
                                </div>
                            </div>
                            <?= $form->field($model, 'address')->textInput([
                                'class' => 'form-control',
                                'aria-required' => 'true',
                                'aria-invalid' => 'true'
                            ]) ?>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                <?= html::submitButton('提交', ['class' => 'btn btn-primary tj']) ?>&nbsp;&nbsp;
                                </div>
                            </div>
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
    <script type="text/javascript">
        $("#system-logo").change(function() {
            var formData=new FormData();
            formData.append('logo',$('#system-logo')[0].files[0]);
            $.ajax({
                url:'<?= Url::to(['web/system/logo']); ?>',
                type:'post',
                cache:false,// 上传文件不需要缓存
                data:formData,
                processData:false,
                contentType:false,
                success:function(da){
                    $('#logo').attr('src',da);
                },
                error:function(err){
                    console.log(err);
                    alert('上传logo出错：'+err);
                }
            });
        });
        $("#system-rwm").change(function() {
            var formData=new FormData();
            formData.append('rwm',$('#system-rwm')[0].files[0]);
            $.ajax({
                url:'<?= Url::to(['web/system/qrcode']); ?>',
                type:'post',
                cache:false,// 上传文件不需要缓存
                data:formData,
                processData:false,
                contentType:false,
                success:function(da){
                    $('#rwm').attr('src',da);
                },
                error:function(err){
                    console.log(err);
                    alert('上传二维码出错：'+err);
                }
            });
        });
        $("#system-bjimg").change(function() {
            var formData=new FormData();
            formData.append('bjimg',$('#system-bjimg')[0].files[0]);
            $.ajax({
                url:'<?= Url::to(['web/system/backgroundimage']); ?>',
                type:'post',
                cache:false,// 上传文件不需要缓存
                data:formData,
                processData:false,
                contentType:false,
                success:function(da){
                    $('#bjimg').attr('src',da);
                },
                error:function(err){
                    console.log(err);
                    alert('上传二背景图出错：'+err);
                }
            });
		});
    </script>
</body>

</html>
mysqli_query() expects parameter 1 to be mysqli,string given in 
