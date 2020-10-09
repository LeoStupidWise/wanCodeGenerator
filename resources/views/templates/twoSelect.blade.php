{{-- verbatim 可以表示下面的代码完全不适用 blade 的模板语法 --}}
@verbatim
<script type="text/html" id="template-two-select">
    <div class="layui-form"
          id="form-search"
          lay-filter="form-two-select"
          method="post">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="layui-form-item" >
                    <div class="layui-inline layui-col-md5">
                        <label class="layui-form-label">被分配人:</label>
                        <div class="layui-input-inline" style="width: 150px">
                            <select name="searchSelectTypeFirst" lay-filter="search-selection-first">
                                <option value="">全部</option>
                                {{# for(let i=0; i<d.selections.length; i++){ }}
                                    <option value="{{ d.selections[i].value }}"
                                            {{# if(d.selections[i].selected == 1){ }}
                                            selected
                                            {{# } }}
                                    >{{ d.selections[i].text }}</option>
                                {{# } }}
                            </select>
                        </div>
                        <div class="layui-input-inline" style="width: 150px">
                            <select name="searchSelectTypeSecond" lay-filter="search-selection-second">
                                <option value="">全部</option>
                                {{# for(let i=0; i<d.selectionSecond.length; i++){ }}
                                    <option value="{{ d.selectionSecond[i].value }}"
                                            {{# if(d.selectionSecond[i].selected == 1){ }}
                                            selected
                                            {{# } }}
                                    >{{ d.selectionSecond[i].text }}</option>
                                {{# } }}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script>
    function twoSelectListener() {
        /**
         * 二级联动中一级下拉选的监听
         */
        vueApp.layForm.on("select(search-selection-first)", function (data) {
            let selectedValue = data.value;
            let renderData = {
                selections: vueApp.selections,
                selectionSecond: []
            };
            for (let i=0; i<vueApp.selections.length; i++) {
                if (vueApp.selections[i].value == selectedValue) {
                    vueApp.selections[i].selected = 1;
                    renderData.selectionSecond = vueApp.selections[i].children;
                }
                else {
                    vueApp.selections[i].selected = 0;
                }
            }
            let renderHtml = "";
            vueApp.layTpl($("#template-two-select").html()).render(renderData, function(html){
                renderHtml = html;
            });
            $("#area-model").html(renderHtml).css("display", "block");
            // 重新渲染页面的下拉选
            // 第二个参数：filter，为 class="layui-form" 所在元素的 lay-filter="" 的值
            // 这个元素最好是 div，不能是 form（我也不知道为什么，一遍遍试出来的）
            vueApp.layForm.render("select", "form-two-select");
        });

        /**
         * 二级联动中一级下拉选的监听
         */
        vueApp.layForm.on("select(search-selection-second)", function (data) {
            console.log(data);
        });
    }
</script>
@endverbatim