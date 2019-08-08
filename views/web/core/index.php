<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveField;
use yii\bootstrap\Alert;
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
                <h5>文章列表</h5>
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
                                    <button type="button" class="btn btn-outline btn-default" onclick="add()">
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

    <script src="/admin/js/jquery.min.js-v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js-v=3.3.5"></script>
    <script src="/admin/js/content.min.js-v=1.0.0"></script>
    <script src="/admin/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/admin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/admin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="/admin/layui/layui.js"></script>
    <script>

        $(function(){
            $('#table').bootstrapTable({
                url: "<?= Url::to(['web/core/selall']); ?>",
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
                    field:'id',
                    title:'ID',
                    sortable:true
                },{
                    field:'title',
                    title:'标题',
                    sortable:true
                },{
                    field:'keyword',
                    title:'关键词',
                },{
                    field:'source',
                    title:'来源',
                },{
                    field:'time',
                    title:'创建日期',
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
                    <a href="../../web/core/update?id=${value}"><i class='glyphicon glyphicon-pencil'></i></a>&nbsp;&nbsp;
                    <a href='#' onclick='del(${value})'><i class='glyphicon glyphicon-remove'></i></a>
                    `;
            }

        })

        function add(){
            window.location.href="<?= Url::to(['web/core/add']) ?>";
        }

        // 根据ID删除
        function del($id){
            // console.log($id);
            if(confirm("你确定要将ID为："+$id+ "的数据删除吗？")){
                // console.log('已删除');
                $.ajax({
                    url:'<?= Url::to(['web/core/delete']) ?>',
                    type:'get',
                    data:{id:$id},
                    success:function(da){
                        // console.log(da);
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
