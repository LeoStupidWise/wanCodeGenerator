@verbatim
    <\?php $this->widget('application.widgets.BreadCrumbsWidget', ['data'=>['其他', '业务配置', '添加质保期配置']]);?>
    <\script src="/public/js/vue/2-6-11-min.js"><\/script>
    <\style>
        .width-180 {
            width: 180px;
        }
        .color-red {
            color: red;
        }
        .layui-inline {
            width: 100%;
        }
    <\/style>

    <\div id="vue-app">
        <\div id="view-search">
            <\form class="layui-form" lay-filter="filter-form-data">
                <\div class="panel panel-default">
                    <\div class="panel-heading">
                        <\span class="span-title">质保期配置<\/span>
                    <\/div>
                    <\div class="panel-body">
                        <\div class="layui-col-md-offset1">
                            <\div class="layui-form-item layui-col-md10">
                                <\div class="layui-inline">
                                    <\label class="layui-form-label width-180">
                                        <\span class="color-red">*<\/span>订单类型:<\/label>
                                    <\div class="layui-input-block" style="padding-left: 100px;">
                                        <\input type="checkbox"
                                               lay-filter="checkboxOrderType"
                                               v-for="(val, key, index) in orderTypesAll"
                                               name="orderType"
                                               :disabled="window.pageType == window.pageTypeShow"
                                               v-bind:title="val.text"
                                               v-bind:value="val.value"
                                               :checked="val.selected"
                                               lay-skin="primary">
                                    <\/div>
                                <\/div>
                            <\/div>
                            <\div class="layui-form-item layui-col-md10">
                                <\div class="layui-inline">
                                    <\label class="layui-form-label width-180">
                                        <\span class="color-red">*<\/span>一级服务:<\/label>
                                    <\div class="layui-input-block" style="padding-left: 100px;">
                                        <\input type="checkbox"
                                               name="firstLevelServeAll"
                                               lay-skin="primary"
                                               lay-filter="filter-checkbox-serve-all"
                                               :checked="firstLevelServeSelectedAll"
                                               title="全选"
                                        >
                                        <\input type="checkbox"
                                               v-for="(val, key, index) in firstLevelServe"
                                               name="firstLevelServe"
                                               :disabled="window.pageType == window.pageTypeShow"
                                               v-bind:title="val.name"
                                               v-bind:value="val.id"
                                               :checked="val.checked"
                                               lay-filter="filter-checkbox-serve"
                                               lay-skin="primary">
                                    <\/div>
                                <\/div>
                            <\/div>
                            <\div id="display-control-enterprise" style="display: none">
                                <\div class="layui-form-item layui-col-md10">
                                    <\div class="layui-inline">
                                        <\label class="layui-form-label width-180">
                                            总包合作用户:
                                        <\/label>
                                        <\div class="layui-input-inline">
                                            <\input type="radio"
                                                   lay-filter="enterpriseUsers"
                                                   v-for="(val, key, index) in enterpriseUserType"
                                                   name="enterpriseUsers"
                                                   :disabled="window.pageType == window.pageTypeShow"
                                                   v-bind:value="val.value"
                                                   :checked="val.selected"
                                                   v-bind:title="val.text">
                                        <\/div>
                                    <\/div>
                                <\/div>
                                <\div class="layui-form-item layui-col-md10">
                                    <\div class="layui-inline">
                                        <\label class="layui-form-label width-180">
                                        <\/label>
                                        <\div class="layui-input-inline">
                                    <\textarea name="enterpriseUserDetail"
                                              id="enterpriseUserDetail"
                                              placeholder="请输入用户手机号或用户ID，最多 5000 个，英文逗号分隔"
                                              style="width: 500px"
                                              v-html="pageData.enterpriseUsers"
                                              :disabled="window.pageType == window.pageTypeShow"
                                              class="layui-textarea"><\/textarea>
                                        <\/div>
                                    <\/div>
                                <\/div>
                            <\/div>
                            <\div class="layui-form-item" >
                                <\div class="layui-inline">
                                    <\label class="layui-form-label width-180">
                                        <\span class="color-red">*<\/span>质保期时间:<\/label>
                                    <\div class="layui-input-inline">
                                        <\input type="number"
                                               max="25"
                                               id="qualityTime"
                                               name="qualityTime"
                                               class="layui-input"
                                               onKeyDown="
                                              if(event.keyCode==190 || event.keyCode==110) return false;
                                           "
                                               :disabled="window.pageType == window.pageTypeShow"
                                               v-bind:value="pageData.qualityTime"
                                               style="width: 50%; display: inline-block;"
                                        ><\span>个月<\/span>
                                    <\/div>
                                <\/div>
                            <\/div>
                            <\div class="layui-form-item" >
                                <\div class="layui-inline">
                                    <\label class="layui-form-label width-180">
                                        <\span class="color-red">*<\/span>质保内容:
                                    <\/label>
                                    <\div class="layui-input-inline">
                                    <\textarea name="content"
                                              id="content"
                                              placeholder="请输入质保内容，该内容会在用户、师傅、总包端展示，折行输入后前端也折行显示，最多 500 字"
                                              style="width: 500px"
                                              v-html="pageData.content"
                                              :disabled="window.pageType == window.pageTypeShow"
                                              class="layui-textarea"><\/textarea>
                                    <\/div>
                                <\/div>
                            <\/div>
                            <\div class="layui-form-item" v-if="window.pageType != window.pageTypeShow">
                                <\div class="layui-inline">
                                    <\label class="layui-form-label width-180"><\/label>
                                    <\div class="layui-input-inline" style="width: 600px;">
                                    <\span style="width: 100%; color: #F59A23;">
                                        请谨慎操作，配置成功后用户下单时就能查看到该质保期内容，师傅也将履行质保内容！！
                                    <\/span>
                                    <\/div>
                                <\/div>
                            <\/div>
                        <\/div>
                    <\/div>
                <\/div>
                <\div v-if="window.pageType != window.pageTypeShow">
                    <\div class="layui-form">
                        <\div class="layui-col-md-offset2">
                            <\div class="layui-form-item layui-col-md10">
                                <\div class="layui-inline">
                                    <\label class="layui-form-label width-180"><\/label>
                                    <\div class="layui-input-block">
                                        <\input class="layui-btn layui-btn-normal"
                                               id="btn-submit"
                                               type="button"
                                               v-bind:value="addBtnText"/>
                                    <\/div>
                                <\/div>
                            <\/div>
                        <\/div>
                    <\/div>
                <\/div>
            <\/form>
        <\/div>
    <\/div>

    <\script src="/public/js/helper.js"><\/script>
    <\script>
        window.pageType = "<\?php if(isset($pageType)) { echo $pageType; } else { echo 'add'; } ?>";
        window.primaryId = "<\?php if(isset($_GET['id'])) { echo $_GET['id']; } else { echo 0; } ?>";
        window.pageTypeAdd = '<\?php echo ArOrderQualityAssurance::PAGE_TYPE_ADD; ?>';
        window.pageTypeEdit = '<\?php echo ArOrderQualityAssurance::PAGE_TYPE_EDIT; ?>';
        window.pageTypeShow = '<\?php echo ArOrderQualityAssurance::PAGE_TYPE_SHOW ?>';

        let vueApp = new Vue({
            el: '#vue-app',
            data: {
                layForm: null,
                // 一级类目
                firstLevelServe: [
                    // {name: '名称', id: 主键, checked: '是否被选中，0: 未被选中，1: 已被选中'}
                    // {name: '名称-TEST', id: 1, checked: 0},
                ],
                // 一级类目是否全选，0：否，1：是
                firstLevelServeSelectedAll: 0,
                // 订单类型
                // {text: '名称', value: 主键, selected: '是否被选中，0: 未被选中，1: 已被选中'}
                orderTypesAll: [],
                orderTypeEnterprise: 'enterprise',
                // 总包合作用户类型
                enterpriseUserType: [
                    // {text: '手机号', value: 'phone'},
                    // {text: 'ID', value: 'id'},
                ],
                addBtnText: '添加',

                // 页面已有的数据
                pageData: {
                    firstLevelServe: [],
                    orderTypes: [],
                    // 总包合作用户类型
                    enterpriseUserType: null,
                    // 总包合作用户详情
                    enterpriseUsers: '',
                    // 质保期时间
                    qualityTime: null,
                    // 添加说明
                    content: null,
                },
            },
            methods: {
                renderLayUi: function () {
                    layui.use(['jquery','layer','table','form','laydate'],function(){
                        vueApp.layForm = layui.form;
                        vueApp.layer = layui.layer;
                        let theLoad = layerLoad();
                        vueApp.getBaseInfo().then(function (result) {
                            vueApp.rerender();
                            layer.close(theLoad);
                        });
                        vueApp.listenCheckboxOrderType();
                        vueApp.listenRadioEnterpriseType();
                        vueApp.listenCheckboxFirstLevel();

                        $('#btn-submit').on('click', function () {
                            vueApp.getFormData();
                            let errMsg = vueApp.formDataValidate();
                            if (errMsg !== '') {
                                layerError(errMsg);
                                return false;
                            }
                            let url = '/master/orderConfig/qualityAssuranceAdd';
                            let actionType = 'add';
                            if (pageType == pageTypeEdit) {
                                url = '/master/orderConfig/qualityAssuranceEdit';
                                actionType = 'edit';
                            }
                            let theLoad = layerLoad();
                            $.ajax({
                                url: '/master/orderConfig/noauthCheckAddAndEditParams',
                                data: {
                                    params: JSON.stringify(vueApp.pageData),
                                    primaryId: primaryId,
                                    actionType: actionType,
                                },
                                async: false,
                                type: 'POST',
                                success: function(data) {
                                    data = JSON.parse(data)
                                    if (data.code != 1) {
                                        layerError(data.msg);
                                        return false;
                                    }

                                    layer.confirm('提交确认？', {
                                        btn: ['确定', '取消'],
                                        content: '<\div>提交前请检查配置内容，该内容提交后则会立即生效！生效后只能调整质保期时间与内容，但不能进行删除\n' +
                                            '\n<\/div>'
                                    }, function(index, layero){
                                        theLoad = layerLoad();
                                        $.ajax({
                                            url: url,
                                            data: {
                                                params: JSON.stringify(vueApp.pageData),
                                                primaryId: primaryId,
                                                actionType: actionType,
                                            },
                                            type: 'POST',
                                            success: function(data) {
                                                data = JSON.parse(data)
                                                if (data.code != 1) {
                                                    layerError(data.msg);
                                                } else {
                                                    layerSuccess('操作成功');
                                                    setTimeout(function () {
                                                        window.location.reload();
                                                    }, 1500)
                                                }
                                            },
                                            error: function() {

                                            },
                                            complete: function() {
                                                vueApp.layer.close(theLoad);
                                            }
                                        });
                                    }, function(index){
                                        //按钮【按钮二】的回调
                                    });
                                },
                                error: function() {

                                },
                                complete: function() {
                                    layer.close(theLoad);
                                }
                            });
                        })

                        /**
                         * 监听一级服务的全选
                         */
                        vueApp.layForm.on('checkbox(filter-checkbox-serve-all)', function (data) {
                            let checkStatus = data.elem.checked ? 1 : 0;
                            for (let i=0; i<\vueApp.$data.firstLevelServe.length; i++) {
                                vueApp.$data.firstLevelServe[i].checked = checkStatus;
                            }
                            vueApp.firstLevelServeSelectedAll = checkStatus;
                            vueApp.rerender(100);
                        })
                    });
                },
                /**
                 * 监听一级服务的选择，用以和全选联动
                 */
                listenCheckboxFirstLevel: function() {
                    vueApp.layForm.on('checkbox(filter-checkbox-serve)', function (data) {
                        let checkStatus = data.elem.checked ? 1 : 0;
                        if (vueApp.firstLevelServeSelectedAll) {
                            // 此时已经全选
                            vueApp.firstLevelServeSelectedAll = 0;
                        } else {
                            if (checkStatus) {
                                if (
                                    $("input[name='firstLevelServe']:checked").length
                                    == vueApp.$data.firstLevelServe.length
                                ) {
                                    vueApp.firstLevelServeSelectedAll = 1;
                                }
                            }
                        }
                        vueApp.rerender(100);
                    })
                },
                /**
                 * 监听订单类型多选框的变化
                 */
                listenCheckboxOrderType: function() {
                    vueApp.layForm.on('checkbox(checkboxOrderType)', function(data){
                        let isChecked = data.elem.checked;
                        let value = data.value;
                        vueApp.resetEnterpriseUser(value, isChecked);
                    });
                },
                /**
                 * 监听总包用户类型的单选的变化
                 */
                listenRadioEnterpriseType: function() {
                    vueApp.layForm.on('radio(enterpriseUsers)', function(data){
                        // console.log(data);
                    });
                },
                /**
                 * 重置总包用户的页面和数值
                 */
                resetEnterpriseUser: function(value, isChecked) {
                    if (value == vueApp.$data.orderTypeEnterprise) {
                        let dom = $('#display-control-enterprise');
                        if (isChecked) {
                            dom.show();
                        } else {
                            // 重置数值
                            vueApp.$data.pageData.enterpriseUserType = null;
                            $("input[name='enterpriseUsers']").each(function() {
                                $(this).removeAttr('checked')
                            });
                            vueApp.layForm.render('radio');
                            vueApp.$data.pageData.enterpriseUsers = '';
                            $("#enterpriseUserDetail").val('')
                            // 隐藏输入
                            dom.hide();
                        }
                    }
                },
                /**
                 * 表单数据检查
                 */
                formDataValidate: function() {
                    if (vueApp.pageData.firstLevelServe.length === 0) {
                        return '请选择一级服务';
                    }
                    if (vueApp.pageData.orderTypes.length === 0) {
                        return '请选择订单类型';
                    }
                    if (!isEmpty(vueApp.pageData.enterpriseUserType)) {
                        if (isEmpty(vueApp.pageData.enterpriseUsers)) {
                            return '请填写总包用户';
                        }
                    }
                    if (isEmpty(vueApp.pageData.qualityTime)) {
                        return '请填写质保期时间';
                    }
                    if (vueApp.pageData.qualityTime > 99 || vueApp.pageData.qualityTime <\ 0) {
                        return '质保期时间最多只能填写 2 位正整数';
                    }
                    if (isEmpty(vueApp.pageData.content)) {
                        return '请填写质保内容';
                    }
                    if (vueApp.pageData.content.length > 500) {
                        return '质保内容最多 500 字';
                    }
                    return '';
                },
                /**
                 * 获取表单的输入的值，重置 vueApp.pageData 到最新
                 */
                getFormData: function() {
                    vueApp.pageData.firstLevelServe = [];
                    vueApp.pageData.orderTypes = [];

                    $("input[name='firstLevelServe']:checked").each(function () {
                        let value = $(this).val();
                        vueApp.pageData.firstLevelServe.push(value);
                    });
                    $("input[name='orderType']:checked").each(function () {
                        let value = $(this).val();
                        vueApp.pageData.orderTypes.push(value);
                    });
                    vueApp.pageData.enterpriseUserType = $("input[name='enterpriseUsers']:checked").val()
                    vueApp.pageData.enterpriseUsers = $("#enterpriseUserDetail").val()
                    vueApp.pageData.qualityTime = $("#qualityTime").val()
                    vueApp.pageData.content = $("#content").val()
                },
                /**
                 * 重新渲染表单，因为 vue 在更新数据也需要时间，所以需要等一会儿才能重新渲染 layui
                 */
                rerender: function (time = 200) {
                    setTimeout(function () {
                        vueApp.layForm.render();
                    }, time);
                },
                /**
                 * 获取渲染所需初始数据
                 */
                getBaseInfo: function() {
                    return new Promise((resolve, reject) => {
                        $.ajax({
                            url: '/master/orderConfig/noauthGetQualityAssurancePageData',
                            data: {
                                id: window.primaryId
                            },
                            type: 'POST',
                            success: function(data) {
                                data = JSON.parse(data);
                                vueApp.$data.firstLevelServe = data.data.serveData;
                                vueApp.$data.orderTypesAll = data.data.orderTypesAll;
                                vueApp.$data.orderTypeEnterprise = data.data.orderTypeEnterprise;
                                vueApp.$data.enterpriseUserType = data.data.userTypeAll;
                                // 如果一级服务被全选
                                let firstLevelServeSelectedAll = 1;
                                for (let i=0; i<\vueApp.$data.firstLevelServe.length; i++) {
                                    if (!vueApp.$data.firstLevelServe[i].checked) {
                                        firstLevelServeSelectedAll = 0;
                                        break;
                                    }
                                }
                                if (firstLevelServeSelectedAll) {
                                    vueApp.firstLevelServeSelectedAll = 1;
                                } else {
                                    vueApp.firstLevelServeSelectedAll = 0;
                                }
                                // 触发订单类型被勾选事件
                                for (let i=0; i<\vueApp.$data.orderTypesAll.length; i++) {
                                    if (vueApp.$data.orderTypesAll[i].selected) {
                                        vueApp.resetEnterpriseUser(vueApp.$data.orderTypesAll[i].value, true);
                                    }
                                }
                                // 如果有记录（查看/编辑），覆盖默认值
                                if (!isEmpty(data.data.qualityAssuranceRcd)) {
                                    vueApp.pageData.content = data.data.qualityAssuranceRcd.qa_content;
                                    vueApp.pageData.qualityTime = data.data.qualityAssuranceRcd.qa_time;
                                    vueApp.pageData.enterpriseUsers = data.data.qualityAssuranceRcd.user;
                                }
                                resolve('getBaseInfo');
                            },
                            error: function() {

                            },
                            complete: function() {
                                //
                            }
                        });
                    })
                }
            },
            created: function () {
                //
            },
            mounted: function () {
                if (window.pageType == window.pageTypeEdit) {
                    this.addBtnText = '更改';
                }
                this.renderLayUi();
            }
        });
    <\/script>
@endverbatim