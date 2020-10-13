<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">CSS</li>
        <li v-on:click="getCodeOfView()">View</li>
        <li>Controller</li>
        <li v-on:click="getCodeOfView()">Service</li>
        <li v-on:click="getCodeOfView()">Model</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            @include("generator.table.code.css")
        </div>
        <div class="layui-tab-item">
            @include("generator.table.code.view")
        </div>
        <div class="layui-tab-item">
            <textarea name=""
                      disabled
                      style="height: 700px"
                      class="layui-textarea">@include("generator.table.code.controller")</textarea>

        </div>
        <div class="layui-tab-item">
            <textarea name=""
                      disabled
                      v-html="codes.service"
                      style="height: 700px"
                      class="layui-textarea"></textarea>
        </div>
        <div class="layui-tab-item">
            <textarea name=""
                      disabled
                      v-html="codes.model"
                      style="height: 700px"
                      class="layui-textarea"></textarea>
        </div>
    </div>
</div>