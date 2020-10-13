<script>
    window.increaseId = 1;

    /**
     * 获取一个搜素项的模型
     */
    function getNewSearchItem() {
        return {
            id: window.increaseId,                      // 主键
            label: '',                                  // 标签名称
            placeholder: '',                            // 占位提示语
            paramName: '',                              // 传递到后台的参数名
            isSelect: 0,                                // 是否是下拉选
        }
    }
    /**
     * 获取一个页面操作的模型
     */
    function getNewPageAction() {
        return {
            id: increaseId,                             // 主键
            name: '',                                   // 按钮名称
            funcName: '',                               // 对应触发的 JS 函数名
        }
    }
    /**
     * 获取一个表格列的模型
     */
    function getNewTableList() {
        return {
            id: increaseId,                             // 主键
            columnName: '',                             // 列名，表格第一行
            paramName: '',                              // 列从 AJAX 返货参数获取的字段名
        }
    }
    /**
     * 获取一个行内操作的模型
     */
    function getNewRowAction() {
        return {
            id: increaseId,                             // 主键
            name: '',                                   // 操作名
            funcName: '',                               // 对应触发的 JS 函数名，或 lay-filter
        }
    }

    /**
     * 获取 Vue 实例的初始化数据
     */
    function getVueData() {
        return {
            // isTest 不为 0 时，开启调试模式
            isTest: <?php echo $_GET["isTest"] ?? 0; ?>,
            layer: null,
            layForm: null,
            layTpl: null,
            layElement: null,
            layDate: null,
            indexMenu: '',                              // 导航面包屑，用逗号隔开不同模块
            searchItems: [],                            // 搜索项
            pageActions: [],                            // 页面操作
            tableLists: [],                             // 表格展示列
            rowActions: [],                             // 行内操作
            codes: {                                    // 代码预览
                view: '',
                model: '',
                service: '',
            },
            testFormData: {
                indexMenu: '用户,黑名单,测试',
                searchItems: [
                    {id: 1, label: '总包信息', placeholder: '请输入总包信息', paramName: 'userInfo', isSelect: 0},
                    {id: 1, label: '限制功能', placeholder: '请输入限制功能', paramName: 'phone', isSelect: 0},
                    {id: 1, label: '状态', placeholder: '请选择状态', paramName: 'status', isSelect: 1},
                    {id: 1, label: '备注', placeholder: '选择备注', paramName: 'remark', isSelect: 0},
                    {id: 1, label: '类型', placeholder: '选择类型', paramName: 'type', isSelect: 1},
                ],
                pageActions: [
                    {id: 1, name: '添加黑名单',funcName: 'addNewBlack()',}
                ],
                tableLists: [
                    {id: 1, columnName: '服务商名称', paramName: 'enterpriseName'},
                    {id: 1, columnName: '限制功能', paramName: 'limitedFuncName'},
                    {id: 1, columnName: '当前状态', paramName: 'statusText'},
                    {id: 1, columnName: '操作人', paramName: 'actor'},
                    {id: 1, columnName: '备注', paramName: 'remark'},
                    {id: 1, columnName: '最近更新时间', paramName: 'updateTime'},
                ],
                rowActions: [
                    {id: 1, name: '解除限制', funcName: ''}
                ],
            }
        }
    }

    /**
     * 获取Vue 实例的方法
     */
    function getVueMethods() {
        return {
            layUiInit: function () {
                layui.use(['layer', 'form', 'laytpl', 'code', 'element', 'table'], function(){
                    vueApp.layer = layui.layer;
                    vueApp.layForm = layui.form;
                    vueApp.layTpl = layui.laytpl;
                    vueApp.layElement = layui.element;
                    vueApp.layDate = layui.laydate;
                    vueApp.layTable = layui.table;

                    vueApp.renderTableAll();
                });
            },
            /**
             * 页面数据初始化
             */
            dataInit: function () {
                // 是在 mounted 环节调用的这个函数，次数 vueApp 还没有实例化完成，所以这里用 this
                if (this.isTest) {
                    this.indexMenu = this.testFormData.indexMenu;
                    this.searchItems = this.testFormData.searchItems;
                    this.pageActions = this.testFormData.pageActions;
                    this.tableLists = this.testFormData.tableLists;
                    this.rowActions = this.testFormData.rowActions;
                }
                else {
                    this.searchItems.push(getNewSearchItem());
                    this.pageActions.push(getNewPageAction());
                    this.tableLists.push(getNewTableList());
                    this.rowActions.push(getNewRowAction());
                }
            },
            getCodeOfView: function () {
                $.ajax({
                    url: "/table/code",
                    type: 'GET',
                    data: {
                        searchItems: vueApp.searchItems,
                        pageActions: vueApp.pageActions,
                        tableLists: vueApp.tableLists,
                    },
                    success: function(data) {
                        vueApp.codes.view = data.view;
                        vueApp.codes.model = data.model;
                        vueApp.codes.service = data.service;
                    }
                });
            },
            /**
             * 使用 layer 进行错误输出
             * @param msg - 提示信息
             */
            layerError: function(msg) {
                vueApp.layer.msg(msg, {icon: 5});
            },
            /**
             * 增加一个搜索项
             */
            addNewSearchItem: function () {
                window.increaseId += 1;
                this.searchItems.push(getNewSearchItem());
                this.layFormReRender();
            },
            /**
             * 删除一个搜索项
             * @param searchItemId - 搜索项 ID
             */
            deleteOneSearchItem: function (searchItemId) {
                if (this.searchItems.length === 1) {
                    this.layerError('只剩最后一个搜索项，不允许删除');
                    return false;
                }
                let newSearchItems = [];
                this.searchItems.forEach(function (searchItem) {
                    if (searchItem.id !== searchItemId) {
                        newSearchItems.push(searchItem);
                    }
                });
                this.searchItems = newSearchItems;
            },
            /**
             * 增加一个页面操作
             */
            addNewPageAction: function () {
                window.increaseId += 1;
                this.pageActions.push(getNewPageAction());
            },
            /**
             * 删除一个页面操作
             * @param pageActionId - 页面操作 ID
             */
            deleteOnePageAction: function (pageActionId) {
                if (this.searchItems.length === 1) {
                    this.layerError('只剩最后一个页面操作，不允许删除，不需要保持为空即可。');
                    return false;
                }
                let newPageActions = [];
                this.pageActions.forEach(function (pageAction) {
                    if (pageAction.id !== pageActionId) {
                        newPageActions.push(pageAction);
                    }
                });
                this.pageActions = newPageActions;
            },
            /**
             * 增加一个表格列
             */
            addNewTableList: function () {
                window.increaseId += 1;
                this.tableLists.push(getNewTableList());
            },
            /**
             * 删除一个表格列
             * @param tableListId - 表格列 ID
             */
            deleteOneTableList: function (tableListId) {
                if (this.tableLists.length === 1) {
                    this.layerError('只剩最后一个表格列，不允许删除。');
                    return false;
                }
                let newTableLists = [];
                this.tableLists.forEach(function (tableList) {
                    if (tableList.id !== tableListId) {
                        newTableLists.push(tableList);
                    }
                });
                this.tableLists = newTableLists;
            },
            /**
             * 增加一个行内操作
             */
            addNewRowAction: function () {
                window.increaseId += 1;
                this.rowActions.push(getNewRowAction());
            },
            /**
             * 删除一个行内操作
             * @param rowActionId - 表格列 ID
             */
            deleteOneRowAction: function (rowActionId) {
                if (this.rowActions.length === 1) {
                    this.layerError('只剩最后一个行内操作，不允许删除，不需要保持为空即可。');
                    return false;
                }
                let newRowActions = [];
                this.rowActions.forEach(function (rowAction) {
                    if (rowAction.id !== rowActionId) {
                        newRowActions.push(rowAction);
                    }
                });
                this.rowActions = newRowActions;
            },
            /**
             * 重新渲染 checkbox、select
             */
            layFormReRender: function() {
                layui.use(['form'],function(){
                    let layForm = layui.form;
                    setTimeout(function () {
                        layForm.render('checkbox');
                        layForm.render('select');
                    }, 100);
                });
            },
            renderTableAll: function() {
                //执行一个 table 实例
                let tableColumns = [[]];
                let requestUrl = window.location.href;
                if (window.location.search === "") {
                    requestUrl += "?";
                }
                else {
                    requestUrl += "&";
                }
                requestUrl += ("columns=" + JSON.stringify(vueApp.tableLists));
                for(let tableList of vueApp.tableLists) {
                    tableColumns[0].push({
                        field: tableList.paramName,
                        align: "center",
                        title: tableList.columnName,
                    })
                }
                if (vueApp.rowActions.length > 0) {
                    // TODO 操作列需完善
                }
                vueApp.layTable.render({
                    elem: '#table-list',
                    url: requestUrl,
                    page: {
                        layout: ['count', 'prev', 'page', 'next', 'skip'],
                        curr: 1, //设定初始在第 5 页
                        groups: 10, //只显示 1 个连续页码
                        limit: 15,
                        fixed: 'right',
                        first: false, //不显示首页
                        last: false, //不显示尾页
                    },
                    toolbar: '#toolbar',
                    defaultToolbar: [],
                    loading: true, //翻页加loading
                    totalRow: false, //开启合计行
                    limit:15,
                    width: '',
                    cols: tableColumns
                });
            }
        };
    }
</script>