<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">CSS</li>
        <li>View</li>
        <li>Controller</li>
        <li>Service</li>
        <li>Model</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            @include("generator.table.code.css")
        </div>
        <div class="layui-tab-item">
            @include("generator.table.code.view")
        </div>
        <div class="layui-tab-item">
            @include("generator.table.code.controller")
        </div>
        <div class="layui-tab-item">
            @include("generator.table.code.service")
        </div>
        <div class="layui-tab-item">
            @include("generator.table.code.model")
        </div>
    </div>
</div>