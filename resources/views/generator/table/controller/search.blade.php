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
                    @for($index=0; $index<(floor(count($searchItems))/4); $index++)
                        <div class="layui-form-item">
                            @for($i=$index*4; $i<$index+4; $i++)
                                @if(isset($searchItems[$i]))
                                    <div class="layui-inline layui-col-md3 no-margin">
                                        <label class="layui-form-label">{{ $searchItems[$i]["label"] }}:</label>
                                        <div class="layui-input-inline">
                                            <input type="text"
                                                   name="{{ $searchItems[$i]["paramName"] }}"
                                                   autocomplete="off"
                                                   class="layui-input"
                                                   placeholder="{{ $searchItems[$i]["placeholder"] }} "
                                                   {{-- 搜索后的填充值，这里先不管，在展示代码的时候再拼接 --}}
                                                   value=""
                                            >
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    @endfor
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

    <div id="toolbar" class="nav-bar" style="display: none">
        <span class="span-title-nav">数据列表</span>
        <div class="float-right">
            @foreach($pageActions as $pageAction)
                <input style="margin-right:10px;"
                       type="button"
                       class="layui-btn layui-btn-sm layui-btn-normal"
                       onclick="{{ $pageAction["funcName"] }}"
                       value="{{ $pageAction["name"] }}"/>
            @endforeach
        </div>
    </div>
</div>

@foreach($tableLists as $tableList)
    <!--{{ $tableList["columnName"] }}-->
    <script type="text/html" id="tpl-table-column-{{ $tableList["paramName"] }}">
        <?php echo "{{"; ?>d.{{ $tableList["paramName"] }}<?php echo "}}"; ?>
    </script>
    <!--{{ $tableList["columnName"] }}-->
@endforeach

<script src="/public/js/helper.js"></script>
<script type="text/javascript">
    window.idTemp = 0;

    layui.use(['form','jquery','layer','element','laydate','laypage','laytpl','table','util'],function(){
        let layForm = layui.form;
        let $ = layui.jquery;
        let layer = layui.layer;
        let layTable = layui.table;
        let layDate = layui.laydate;
        let layTpl = layui.laytpl;

        renderTableAll();

        layForm.on('submit(form-search)', function(data){
            let params = $('#form-search').serialize();
            window.location.href = '?' + params;
        });

        /**
         * 投诉列表 - 全部，的渲染
         */
        function renderTableAll() {
            //执行一个 table 实例
            layTable.render({
                elem: '#table-list',
                url: window.location.href,
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
                limit:20,
                width: '',
                cols: [ //表头
                    {{ json_encode($tableRenderData, JSON_UNESCAPED_UNICODE) }}
                ]
            });
        }
    });
</script>
