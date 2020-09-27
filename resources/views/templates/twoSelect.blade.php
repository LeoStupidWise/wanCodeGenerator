<script type="text/html" id="template-two-select">
    <form class="layui-form"
          id="form-search" method="post">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="layui-form-item" >
                    <div class="layui-inline layui-col-md5">
                        <label class="layui-form-label">被分配人:</label>
                        <div class="layui-input-inline" style="width: 150px">
                            <select name="searchSelectTypeFirst" lay-filter="search-selection-first">
                                <option value="">全部</option>
                                {+# for(let i=0; i<d.selection.length; i++){ +}
                                <option value="{+ d.selection[i].value +}">
                                    Text
                                </option>
                                {+# } +}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</script>