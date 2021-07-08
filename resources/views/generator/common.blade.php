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
        <h2 class="layui-colla-title">form 表单的监听</h2>
        <div class="layui-colla-content">
layForm.on("radio(user-type)", function (data) {
    console.log(data.elem); //得到radio原始DOM对象
    console.log(data.value); //被点击的radio的value值
})
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">重置一个对象的属性值</h2>
        <div class="layui-colla-content">
            <pre class="layui-code">
    /**
    * 重置 formData 的属性值
    * @param newData
    *      比如输入 {invoiceType: 'personal'}，就会改变 vueApp.formData.invoiceType 的值为 personal
    */
    function setFormData (newData) {
        for (let attr in newData) {
            if (vueApp.formData[attr] !== undefined) {
                console.log(vueApp.formData[attr]);
                vueApp.formData[attr] = newData[attr];
            }
        }
    },
            </pre>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">监听鼠标失去焦点、移入（移出）</h2>
        <div class="layui-colla-content">
            <pre class="layui-code">
$(document).on('blur','#form-item-phone',function(){
    let phone = $(this).val();
});

$(document).on("mouseover mouseout", ".help-show-when-focus", function(event){
    if(event.type === "mouseover"){
        $(this).children('span').removeClass("display-none");
        $(this).children('span').addClass("display-inline");
    }else if(event.type === "mouseout"){
        $(this).children('span').removeClass("display-inline");
        $(this).children('span').addClass("display-none");
    }
});
            </pre>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">Vue实例化</h2>
<div class="layui-colla-content">
    <pre class="layui-code">
let vueApp = new Vue({
    el: '#vue-app',
    data: {
        layForm: null,
    },
    methods: {
        renderLayUi: function () {
            layui.use(['jquery','layer','table','form','laydate'],function(){
                let layForm = null;
                vueApp.layForm = layForm = layui.form;

                vueApp.rerender();
            });
        },
        /**
         * 重新渲染表单，因为 vue 在更新数据也需要时间，所以需要等一会儿才能重新渲染 layui
         */
        rerender: function (time = 200) {
            setTimeout(function () {
                vueApp.layForm.render();
            }, time);
        },
    },
    created: function () {

    },
    mounted: function () {
        this.renderLayUi();
    }
});
    </pre>
</div>
<div class="layui-colla-item">
    <h2 class="layui-colla-title">Vue</h2>
    <div class="layui-colla-content">
        <pre class="layui-code">
@verbatim
<\span v-if="abnormalItem.count.show"
      v-bind:class="{'margin-left-20': abnormalItem.amount.show, 'middle-number': !abnormalItem.amount.show}"
>
    abnormalItem.amount.show 为真时，用 margin-left-20 的样式，abnormalItem.amount.show 为假时（即 !abnormalItem.amount.show）
    用 middle-number 样式
    {{ abnormalItem.count.text }}{{ abnormalItem.count.value }}
<\/span>
@endverbatim
        </pre>
    </div>
</div>
        <div class="layui-colla-item">
            <h2 class="layui-colla-title">Vue+layUI构建的添加/编辑/查看三合一页面</h2>
            <div class="layui-colla-content">
用 Vue 构建的一个添加/编辑/查看，三合一页面，页面数据都通过 ajax 获得，都是通过变量来控制页面效果。之前有使用过这种写法，有个困难在于 layUI
和 Vue 无法完美融合，就是 layUI 页面变化后，需要自己对事件进行监听，然后更改 Vue。
            <br/>>
因为没做好 PHP 代码和 JS 代码的输出，所以在下面的代码中，把所有的“<”都替换成了“<\”，如果想要直接使用下面的代码，将“<\”替换回“<”即可。
        <pre class="layui-code">
    @include('common.add-use-vue')
        </pre>
            </div>
        </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">占位-TEST</h2>
        <div class="layui-colla-content">
            <pre class="layui-code">
            内容
            </pre>
        </div>
    </div>
</div>