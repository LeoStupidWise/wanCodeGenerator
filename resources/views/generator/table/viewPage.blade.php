<div>
    <div id="view-search">
        <form class="layui-form"
              id="form-search" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="span-title">查询条件</span>
                    <div class="float-right">
                        <button class="layui-btn layui-btn-small layui-btn-normal"
                                lay-submit
                                onclick="event.preventDefault()"
                                lay-filter="form-search">搜索</button>
                    </div>
                </div>
                <div class="panel-body">
                    <div v-for="(searchItem, index) in searchItems">
                        <div class="layui-form-item" v-if="index%4 == 0">
                            <div v-for="newIndex in [index, index+1, index+2, index+3]">
                                <div class="layui-inline layui-col-md3 no-margin" v-if="searchItems[newIndex] != undefined">
                                    <label class="layui-form-label">@{{ searchItems[newIndex].label }}:</label>
                                    <div class="layui-input-inline">
                                        <input type="text"
                                               v-bind:name="searchItems[newIndex].paramName"
                                               autocomplete="off"
                                               class="layui-input"
                                               v-bind:placeholder="searchItems[newIndex].placeholder"
                                               {{-- 搜索后的填充值，这里先不管，在展示代码的时候再拼接 --}}
                                               value=""
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="view-table">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-body">
                    <table class="layui-hide" id="table-list" lay-filter="table-list"></table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="toolbar" class="nav-bar" style="display: none">
    <span class="span-title-nav">数据列表</span>
    <div class="float-right">
        <input style="margin-right:10px;"
               v-for="(pageAction, index) in pageActions"
               type="button"
               class="layui-btn layui-btn-sm layui-btn-normal"
               v-bind:onclick="pageAction.funcName"
               v-bind:value="pageAction.name"/>
    </div>
</div>
