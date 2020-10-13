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

<div id="vue-app">
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">列表信息搜集</li>
            <li v-on:click="renderTableAll()">页面预览</li>
            <li v-on:click="getCodeOfView()">查看代码</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                @include("generator.table.viewForm")
            </div>
            <div class="layui-tab-item">
                @include("generator.table.viewPage")
            </div>
            <div class="layui-tab-item">
                @include("generator.table.viewCode")
            </div>
        </div>
    </div>
</div>

</body>

@include("generator.table.vueInit")

<script>
    let vueApp = new Vue({
        el: '#vue-app',
        data: getVueData(),
        methods: getVueMethods(),
        created: function () {
            //
        },
        mounted: function () {
            this.dataInit();
            this.layUiInit();
        }
    });
</script>

</html>
