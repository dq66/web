<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>后台 - 修改头像</title>
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
                        <h5>修改头像</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" >选项1</a>
                                </li>
                                <li><a href="#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php $form = ActiveForm::begin([
                            'id' => 'signupForm',
                            'options' => [
                                'class' => 'form-horizontal m-t'
                            ]
                        ]); ?>
                        <!-- <form method="post" class="form-horizontal m-t" id="signupForm"> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">头像：</label>
                                <div class="col-sm-4">
                                    <!-- <img src="/admin/img/profile_small.jpg" id="avatar" alt=""> -->
                                    <img src="../../<?= $model->img; ?>">
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'img')->fileInput([
                                        'class' => 'form-control',
                                        'options' => [
                                            'enctype' => 'multipart/form-data'
                                        ]

                                    ]) ?>
                                    <!-- <input type="file" name="Admin[img]" class="form-control"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">重新上传</button>
                                </div>
                            </div>
                        <!-- </form> -->
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
    <script src="/admin/js/demo/form-validate-demo.min.js"></script>
    <!-- <script src="/admin/js/ajaxfileupload.js"></script> -->
    <!-- <script type="text/javascript">
        $("[name='img']").change(function(){
            var url="<?= Url::to(['web/index/avatar']) ?>";
            console.log(url);
            $.ajaxFileUpload({
			    url: url,
				type: 'post',
				secureuri: false, //一般设置为false
				fileElementId: "img", // 上传文件的name属性名
				dataType: 'text', //返回值类型，一般设置为json
				success: function(data) {
                    console.log(data);
					// $("#bjtp").attr("src", "/Uploads/" + data + "");
				},
				error: function(data, status, e) {
						//alert(e);
					console.log(data);
				}
			});
        });
    </script> -->
</body>

</html>
