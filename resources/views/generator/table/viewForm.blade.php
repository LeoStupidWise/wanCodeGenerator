<div class="layui-fluid">
    <form class="layui-form" id="serachForm">
        <div class="layui-card">
            <div class="layui-card-body layui-col-md-offset3">
                <!-- 面包屑 -->
{{--                <h1>--}}
{{--                    面包屑--}}
{{--                </h1>--}}
{{--                <div class="layui-form-item">--}}
{{--                    <label class="layui-form-label">导航</label>--}}
{{--                    <div class="layui-inline">--}}
{{--                        <div class="layui-input-inline">--}}
{{--                            <input type="text"--}}
{{--                                   style="width: 270px"--}}
{{--                                   lay-filyer="required"--}}
{{--                                   v-model="indexMenu"--}}
{{--                                   class="layui-input"--}}
{{--                                   placeholder="如：客服,投诉管理,添加投诉"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- 面包屑 -->

                <!-- 搜索项 -->
                <h1>
                    搜索项
                </h1>
                <div v-for="(searchItem, index) in searchItems">
                    <div class="layui-form-item">
                        <label class="layui-form-label">搜索项 @{{ index+1 }}</label>
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text"
                                       lay-filyer="required"
                                       v-model="searchItem.label"
                                       class="layui-input"
                                       placeholder="标签名，如：用户信息"/>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text"
                                       v-model="searchItem.placeholder"
                                       class="layui-input"
                                       placeholder="placeholder 提示语"/>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text"
                                       v-model="searchItem.paramName"
                                       lay-filyer="required"
                                       class="layui-input"
                                       placeholder="控制器接受的参数名"/>
                            </div>
                            <button type="button"
                                    v-on:click="addNewSearchItem"
                                    class="layui-btn ayui-btn-primary layui-btn-sm">
                                增加搜索项
                            </button>
                            <button type="button"
                                    v-on:click="deleteOneSearchItem(searchItem.id)"
                                    class="layui-btn layui-btn-danger layui-btn-sm">
                                删除
                            </button>
                            <br/>
                            <div class="layui-input-inline">
                                <input type="checkbox"
                                       lay-filter="filter-is-select"
                                       v-bind:data-id="searchItem.id"
                                       title="下拉选">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 搜索项 -->

                <!-- 页面操作 -->
                <h1>
                    页面操作
                </h1>
                <div v-for="(pageAction, index) in pageActions">
                    <div class="layui-form-item">
                        <label class="layui-form-label">页面操作 @{{ index+1 }}</label>
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text"
                                       lay-filyer="required"
                                       v-model="pageAction.name"
                                       class="layui-input"
                                       placeholder="操作名，如：新增黑名单"/>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text"
                                       v-model="pageAction.funcName"
                                       lay-filyer="required"
                                       class="layui-input"
                                       placeholder="操作触发的函数名"/>
                            </div>
                            <button type="button"
                                    v-on:click="addNewPageAction"
                                    class="layui-btn ayui-btn-primary layui-btn-sm">
                                新增
                            </button>
                            <button type="button"
                                    v-on:click="deleteOnePageAction(pageAction.id)"
                                    class="layui-btn layui-btn-danger layui-btn-sm">
                                删除
                            </button>
                        </div>
                    </div>
                </div>
                <!-- 页面操作 -->

                <!-- 表格列 -->
                <h1>
                    表格列
                </h1>
                <div v-for="(tableList, index) in tableLists">
                    <div class="layui-form-item">
                        <label class="layui-form-label">表格列 @{{ index+1 }}</label>
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text"
                                       lay-filyer="required"
                                       v-model="tableList.columnName"
                                       class="layui-input"
                                       placeholder="列名"/>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text"
                                       v-model="tableList.paramName"
                                       lay-filyer="required"
                                       class="layui-input"
                                       placeholder="从后台获取数据的字段名"/>
                            </div>
                            <button type="button"
                                    v-on:click="addNewTableList"
                                    class="layui-btn ayui-btn-primary layui-btn-sm">
                                新增
                            </button>
                            <button type="button"
                                    v-on:click="deleteOneTableList(tableList.id)"
                                    class="layui-btn layui-btn-danger layui-btn-sm">
                                删除
                            </button>
                        </div>
                    </div>
                </div>
                <!-- 表格列 -->

                <!-- 行内操作 -->
                <h1>
                    行内操作
                </h1>
                <div v-for="(rowAction, index) in rowActions">
                    <div class="layui-form-item">
                        <label class="layui-form-label">行内操作 @{{ index+1 }}</label>
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text"
                                       lay-filyer="required"
                                       v-model="rowAction.name"
                                       class="layui-input"
                                       placeholder="操作名"/>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text"
                                       v-model="rowAction.funcName"
                                       lay-filyer="required"
                                       class="layui-input"
                                       placeholder="触发的函数名"/>
                            </div>
                            <button type="button"
                                    v-on:click="addNewRowAction"
                                    class="layui-btn ayui-btn-primary layui-btn-sm">
                                新增
                            </button>
                            <button type="button"
                                    v-on:click="deleteOneRowAction(rowAction.id)"
                                    class="layui-btn layui-btn-danger layui-btn-sm">
                                删除
                            </button>
                        </div>
                    </div>
                </div>
                <!-- 行内操作 -->
            </div>
        </div>
    </form>
</div>