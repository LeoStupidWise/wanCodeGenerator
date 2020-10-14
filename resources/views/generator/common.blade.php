<pre class="layui-code">
// 通过 layTPL 获取渲染用的 html
let renderHtml = "";
layTpl($('#tpl-add-plan').html()).render(data, function (html) {
    renderHtml = html;
});
return renderHtml;
</pre>

<pre class="layui-code">
// layer.open 参数大全
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

<pre class="layui-code">
// 日期插件的渲染
layDate.render({
    elem: '#search-register-time',
    range: true,
    value: "2020-01-10",    // 默认值
    format: 'yyyy年MM月dd日', //可任意组合
    change: function(value, date, endDate){
        $("#search-register-time").val(value);
        $('#layui-laydate1').remove();
    }
});
</pre>