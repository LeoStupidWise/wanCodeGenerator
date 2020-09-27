<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>代码参考</title>

    <script src="layui-master/src/layui.js"></script>
    <script src="vue/vue-dev.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="layui-master/src/css/layui.css" rel="stylesheet">
    <link href="css/wan.css" rel="stylesheet">

    <!-- Styles -->
</head>
<body>

<div class="layui-tab">
    <ul class="layui-tab-title">
        <li class="layui-this">自定义选择</li>
        <li>通用</li>
        <li>小贴士</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <div id="vue-app">
                <div>
                    <form class="layui-form">
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <input type="radio" name="type" data-type="threeColumnInfo" title="三列基本信息">
                                <input type="radio" name="type" data-type="twoSelect" title="二级联动">
                                <input type="radio" name="type" data-type="singleTextarea" title="弹出框-仅仅textarea">
                                <input type="radio" name="type" data-type="justRadio" title="弹出框-单选">
                            </div>
                        </div>
                    </form>
                </div>

                <div id="area-model">
                </div>

                <div>
                    <pre class="layui-code" id="area-code">@{{ templateNow }}</pre>
                </div>
            </div>
        </div>
        <div class="layui-tab-item">
            @include("generator/common")
        </div>
        <div class="layui-tab-item">
            @include("generator/tips")
        </div>
    </div>
</div>
</body>

@include("templates.threeColumnInfo")
@include("templates.twoSelect")
@include("templates.alert.singleTextarea")
@include("templates.alert.justRadio")

<script>
    const vueApp = new Vue({
        el: "#vue-app",
        data: {
            layForm: null,
            layer: null,
            layTpl: null,
            layElement: null,
            templates: {
                threeColumnInfo: "",
                twoSelect: "",
                alerts: {
                    singleTextarea: "",
                    justRadio: "",
                },
            },
            templateNow: "",
        },
        methods: {
            initLayUi: function () {
                layui.use(['layer', 'form', 'laytpl', 'code', 'element'], function(){
                    vueApp.layer = layui.layer;
                    vueApp.layForm = layui.form;
                    vueApp.layTpl = layui.laytpl;
                    vueApp.layElement = layui.element;

                    // layTpl 的开闭标签与 blade、Vue 均有冲突
                    vueApp.layTpl.config({
                        open: '{<',
                        close: '+}'
                    });

                    // 代码初始化
                    vueApp.layTpl($("#template-three-column-info").html()).render({}, function(html){
                        vueApp.templates.threeColumnInfo = html;
                    });
                    vueApp.layTpl($("#template-two-select").html()).render({}, function(html){
                        vueApp.templates.twoSelect = html;
                    });
                    vueApp.layTpl($("#template-alert-single-textarea").html()).render({}, function(html){
                        vueApp.templates.alerts.singleTextarea = html;
                    });
                    vueApp.layTpl($("#template-alert-just-radio").html()).render({}, function(html){
                        vueApp.templates.alerts.justRadio = html;
                    });

                    vueApp.layForm.on("radio", function (obj) {
                        let type = $(obj.elem).data("type");
                        let isAlert = 0;
                        let layerOpenOption = {
                            type: 1,
                            title: '标题',
                            content: "",
                            btn: ['确定', '取消'],
                        };
                        switch (type) {
                            case "threeColumnInfo":
                                vueApp.templateNow = vueApp.templates.threeColumnInfo;
                                isAlert = 0;
                                break;
                            case "singleTextarea":
                                vueApp.templateNow = vueApp.templates.alerts.singleTextarea;
                                isAlert = 1;
                                layerOpenOption.content = vueApp.templateNow;
                                layerOpenOption.area = ['500px', '280px'];
                                break;
                            case "justRadio":
                                vueApp.templateNow = vueApp.templates.alerts.justRadio;
                                isAlert = 1;
                                layerOpenOption.content = vueApp.templateNow;
                                layerOpenOption.area = ['500px', '230px'];
                                break;
                        }
                        if (isAlert) {
                            layer.open(layerOpenOption);
                            $("#area-model").css("display", "none");
                        }
                        else {
                            $("#area-model").html(vueApp.templateNow).css("display", "block");
                        }
                        vueApp.layForm.render();
                    });
                });
            },
        },
        mounted: function () {
            this.initLayUi();
        },
        created: function () {
            //
        }
    })
</script>
</html>
