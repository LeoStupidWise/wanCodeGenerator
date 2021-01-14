<div class="layui-collapse" lay-accordion="">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">通过 layTPL 获取渲染用的 html</h2>
        <div class="layui-colla-content">
<pre class="layui-code">
let renderHtml = "";
layTpl($('#tpl-add-plan').html()).render(data, function (html) {
    renderHtml = html;
});
return renderHtml;
</pre>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">layer.open 参数大全</h2>
        <div class="layui-colla-content">
<pre class="layui-code">
layer.open({
    // type 会影响在 layer.open 中再使用 layer.msg()
    type: 1,
    title: '添加备注',
    content: renderHtml,
    area: ['500px', '280px'],
    // 位置设置，一般不需要设置，但如果页面出现奇怪的问题，就要用到这里了
    offset: '100px',
    btn: ['确定', '取消'],
    success: function () {
        // open 成功后的回调
        layForm.render();
    },
    yes: function (index, layero) {
        // 第一个按钮的回调
    },
    btn1: function (index, layero) {
        // 第二个按钮的回调
    },
    cancel: function () {
        // 右上角叉叉的回调
    },
})
</pre>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">日期插件的渲染</h2>
        <div class="layui-colla-content">
<pre class="layui-code">
layDate.render({
    elem: '#search-register-time',
    range: true,
    value: "2020-01-10",    // 默认值
    type: 'date',   // 选择的格式，date 对应可选择 年月日，datetime 对应可选择 年月日-时分秒
    format: 'yyyy年MM月dd日 HH:mm:ss', //可任意组合
    change: function(value, date, endDate){
        $("#search-register-time").val(value);
        $('#layui-laydate1').remove();
    }
});
</pre>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">JQ 选择器获取复选框的值？</h2>
        <div class="layui-colla-content">
<pre class="layui-code">
let serveCatIds = [];
$('input[type=checkbox][name="category"]:checked').each(function() {
    serveCatIds.push($(this).val());
});

// JQ 设置 checkbox 不选中
$(this).prop("checked", false);

// 弹出框中，如果下拉选的选项过多，导致出现纵向滚动条，可以加上下面这个
.layui-layer-content {
    overflow: visible !important;
}
</pre>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">以对象的形式获取到表单中的数据</h2>
        <div class="layui-colla-content">
<pre class="layui-code">
// proofFrom 就是表单的 ID
$("#proofForm").serializeArray().map(function(x){
    let pushValue = x.value.trim() || '';
    // if (x.name !== "pictureAids" && x.name !== "nextFollowTime") {
    // 这里是特殊处理的一个值
    if (x.name === "documentAddress") {
        let tempValue = (x.value || '').split("-=Zoe=-");
        pushValue = {
            value: tempValue[0],
            name: tempValue[1]
        }
    }
    if (data[x.name] !== undefined) {
        if (!data[x.name].push) {
            data[x.name] = [data[x.name]];
        }
        data[x.name].push(pushValue);
    } else {
        data[x.name] = pushValue;
    }
});
</pre>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">占位-TEST</h2>
        <div class="layui-colla-content">
            内容
        </div>
    </div>
</div>