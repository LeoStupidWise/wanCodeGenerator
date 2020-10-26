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
        <li class="layui-this">选择模板</li>
        <li>通用</li>
        <li>小贴士</li>
        <li><a href="{{ url('table') }}">数据列表</a></li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <div id="vue-app">
                <div>
                    <div class="layui-form" lay-filter="radio-type-select">
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <input type="radio" lay-filter="radio-type-select" name="type"
                                       data-type="threeColumnInfo" title="三列基本信息">
                                <input type="radio" lay-filter="radio-type-select" name="type"
                                       data-type="twoSelect" title="二级联动">
                                <input type="radio" lay-filter="radio-type-select" name="type"
                                       data-type="singleTextarea" title="弹出框-仅仅textarea">
                                <input type="radio" lay-filter="radio-type-select" name="type"
                                       data-type="justRadio" title="弹出框-单选">
                                <input type="radio" lay-filter="radio-type-select" name="type"
                                       data-type="singleFileUpload" title="单个文件上传">
                                <input type="radio" lay-filter="radio-type-select" name="type"
                                       data-type="simpleForm" title="表单">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="area-model">
                </div>

                <div>
                    <pre class="layui-code" v-pre id="area-code-twoSelect" style="display: none"
                    >{!!
                        htmlspecialchars(
                            file_get_contents(
                                resource_path("/views/templates/twoSelect.blade.php")
                            )
                        )
                    !!}</pre>

                    <pre class="layui-code" v-pre id="area-code-threeColumnInfo" style="display: none"
                    >{!!
                        htmlspecialchars(
                            file_get_contents(
                                resource_path("/views/templates/threeColumnInfo.blade.php")
                            )
                        )
                    !!}</pre>

                    <pre class="layui-code" v-pre id="area-code-justRadio" style="display: none"
                    >{!!
                        htmlspecialchars(
                            file_get_contents(
                                resource_path("/views/templates/alert/justRadio.blade.php")
                            )
                        )
                    !!}</pre>

                    <pre class="layui-code" v-pre id="area-code-singleTextarea" style="display: none"
                    >{!!
                        htmlspecialchars(
                            file_get_contents(
                                resource_path("/views/templates/alert/singleTextarea.blade.php")
                            )
                        )
                    !!}</pre>

                    <pre class="layui-code" v-pre id="area-code-singleFileUpload" style="display: none"
                    >{!!
                        htmlspecialchars(
                            file_get_contents(
                                resource_path("/views/templates/alert/singleFileUpload.blade.php")
                            )
                        )
                    !!}</pre>

                    <pre class="layui-code" v-pre id="area-code-simpleForm" style="display: none"
                    >{!!
                        htmlspecialchars(
                            file_get_contents(
                                resource_path("/views/templates/simpleForm.blade.php")
                            )
                        )
                    !!}</pre>
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

@include("generator.vueInit")
@include("templates.threeColumnInfo")
@include("templates.twoSelect")
@include("templates.alert.singleTextarea")
@include("templates.alert.justRadio")
@include("templates.alert.singleFileUpload")
@include("templates.simpleForm")

<script>
    const vueApp = new Vue({
        el: "#vue-app",
        data: getVueData(),
        methods: {
            initLayUi: function () {
                layInit();
            },
            initListener: function () {
                twoSelectListener();
                justRadioListener();
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
