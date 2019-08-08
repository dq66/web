<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveField;

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
    <link href="/admin/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <link href="/admin/css/style.min.css-v=4.0.0.css" rel="stylesheet">
    <link href="/admin/layui/css/layui.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <!-- Panel Other -->
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>类型信息</h5>
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
                        <li><a href="#">选项2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row row-lg">
                    <div class="col-sm-12">
                        <!-- Example Events -->
                        <div class="example-wrap">
                            <div class="example">
                                <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                                    <button type="button" class="btn btn-outline btn-default" data-toggle="modal" data-target="#myModal">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-default">
                                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <table id="table"  data-mobile-responsive="true">

                                </table>
                            </div>
                        </div>
                        <!-- End Example Events -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Panel Other -->
    </div>
    <!-- 添加 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;
                        </span><span class="sr-only">关闭</span>
                    </button>
                    <h4 class="modal-title">增加类型</h4>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin([
                        'action' => 'add',
                        'method' => 'post',
                        'id' => 'signupForm',
                        'options' => [
                            'enctype' => 'multipart/form-data',
                            'class' => 'form-horizontal m-t',
                        ]
                    ]); ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">类名称：</label>
                            <div class="col-sm-8">
                                <input id="name" name="Type[type_name]" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 请输入类名称</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">图片：</label>
                            <div class="col-sm-8">
                                <input type="file" id="image" name="Type[img]">
                                <span class="help-block m-b-img"><i class="fa fa-info-circle"></i> 请选择你要上传的图片</span>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary" onclick="add()">提交</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 添加 -->
    <!-- 修改 -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;
                        </span><span class="sr-only">关闭</span>
                    </button>
                    <h4 class="modal-title">编辑类型</h4>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin([
                        'action' => 'edit',
                        'method' => 'post',
                        'id' => 'signupForm',
                        'options' => [
                            'enctype' => 'multipart/form-data',
                            'class' => 'form-horizontal m-t editform'
                        ]
                    ]) ?>
                        <input type="hidden" name="yimg" class="yimg">
                        <input type="hidden" name="Type[id]" id="editId">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">类名称：</label>
                            <div class="col-sm-8">
                                <input id="editName" name="Type[type_name]" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 请输入类名称</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">图片：</label>
                            <div class="col-sm-8">
                                <img src="" id="yimg" width="100px" height="100px">
                                <input type="file" id="editImage" name="Type[img]">
                                <span class="help-block m-b-img"><i class="fa fa-info-circle"></i> 请选择你要上传的图片</span>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary" onclick="edit()">提交</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 修改 -->
    <script src="/admin/js/jquery.min.js-v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js-v=3.3.5"></script>
    <script src="/admin/js/content.min.js-v=1.0.0"></script>
    <script src="/admin/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/admin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/admin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="/admin/layui/layui.js"></script>
    <script>

        $(function(){
            $(".m-b-none").hide();
            $(".m-b-img").hide();

            $('#table').bootstrapTable({
                url: "<?= Url::to(['web/type/typeall']); ?>",
                method:'GET',
                striped: true,           // 是否显示行间隔色
                sortable: true,          //是否启用排序
                sortOrder: "asc",        //排序方式
                search: !0,              // 搜索
                pagination: !0,          // 分页
                showRefresh: !0,         // 刷新
                showToggle: !0,          // 是否显示详细视图和列表视图的切换按钮
                showColumns: !0,         // 是否显示所有的列（选择显示的列）
                iconSize: "outline",
                toolbar: "#exampleTableEventsToolbar",
                icons: {
                    refresh: "glyphicon-repeat",
                    toggle: "glyphicon-list-alt",
                    columns: "glyphicon-list"
                },
                columns:[{
                    checkbox:true,
                    visible:true
                },{
                    field:'img',
                    title:'IMG',
                    formatter:function(value,row,index){
                        return `<img src="../../${value}" width="60px" height="60px">`;
                    }
                },{
                    field:'type_name',
                    title:'类型名称',
                    sortable:true
                },{
                    field:'id',
                    title:'操作',
                    width:120,
                    align:'center',
                    valign:'middle',
                    formatter:caozuo
                }],
                onLoadError:function(){
                    showTips('数据加载失败！');
                }
            })

            // 表格的编辑跟删除按钮
            function caozuo(value,row,index){
                // 将对象转换成json字符串
                var data = JSON.stringify(row);
                return `
                    <a href='#' onclick='showedit(${data})'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp;&nbsp;
                    <a href='#' onclick='del(${value})'><i class='glyphicon glyphicon-remove'></i></a>
                    `;
            }

            // 类名称的实时监听输入框值变化事件
            $("#name").bind('input propertychange',function(){
                var name = $("#name").val();
                if(name.length>0){
                    $(".m-b-none").hide();
                    $("#name").closest(".form-group").removeClass("has-error").addClass("has-success");
                }
            });
            // 图片的实时监听输入框值变化事件
            $("#image").bind('input propertychange',function(){
                var img = $("#iamge").val();
                if(img != ""){
                    $(".m-b-img").hide();
                    $("#image").closest(".form-group").removeClass("has-error").addClass("has-success");
                }
            });
        })
        // 添加
        function add(){
            // $('#myModal').modal('hide');
            var e = "<i class='fa fa-times-circle'></i> ";
            var name= $('#name').val();
            var img= $('#image').val();
            // console.log(name);
            // console.log(img);
            if(name.length==0 || name == undefined){
                $(".m-b-none").show();// 显示错误信息
                $("#name").closest(".form-group").removeClass("has-success").addClass("has-error");
            }else if(img.length=0 || img===undefined || img==''){
                $(".m-b-img").show();
                $("#image").closest(".form-group").removeClass("has-success").addClass("has-error");
            }else{
                $('#signupForm').submit();
            }
        }

        // 显示modal及编辑信息
        function showedit($data){
            $('#editModal').modal('show');
            $('#editId').val($data['id']);
            $('#editName').val($data['type_name']);
            $('.yimg').val($data['img']);
            $('#yimg').attr('src','../../'+$data['img']);
        }
        // 编辑
        function edit(){
            $('.editform').submit();
        }
        // 根据ID删除
        function del($id){
            // console.log($id);
            if(confirm("你确定要将ID为："+$id+ "的数据删除吗？")){
                // console.log('已删除');
                $.ajax({
                    url:'<?= Url::to(['web/type/delete']) ?>',
                    type:'get',
                    data:{id:$id},
                    success:function(da){
                        console.log(da);
                        if(da == 'ok'){
                            alert('删除成功');
                        }else{
                            alert('删除失败！');
                        }
                        window.location.reload();
                    },
                    error:function(err){
                        console.log('发生了错误');
                        console.log(err);
                    }
                });
            }
        }

    </script>

</body>

</html>
