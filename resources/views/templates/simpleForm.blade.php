@verbatim
<script type="text/html" id="template-simple-form">
    <div id="view-search">
        <form class="layui-form">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="span-title">条件添加</span>
                </div>
                <div class="panel-body">
                    <div class="layui-col-md-offset2">
                        <div class="layui-form-item" >
                            <div class="layui-inline">
                                <label class="layui-form-label width-180">服务类目:</label>
                                <div class="layui-input-inline">
                                    <select name="category">
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
                            </div>
                        </div>
                        <div class="layui-form-item" >
                            <div class="layui-inline">
                                <label class="layui-form-label width-180">年月范围:</label>
                                <div class="layui-input-inline">
                                    <input type="text"
                                           id="time-range"
                                           name="choice_date"
                                           autocomplete="off"
                                           class="layui-input"
                                           placeholder="请输入年月范围"
                                           value=""
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item" >
                            <div class="layui-inline">
                                <label class="layui-form-label width-180">
                                    <span style="color: red">*</span>成交金额区间（万元）:
                                </label>
                                <div class="layui-input-inline" style="width: 500px">
                                    <input type="number"
                                           name="min_deal_amount"
                                           autocomplete="off"
                                           class="layui-input"
                                           placeholder="请输入成交金额区间"
                                           value=""
                                           style="width: auto; display: inline-block"
                                    >
                                    &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="number"
                                           name="max_deal_amount"
                                           autocomplete="off"
                                           class="layui-input"
                                           placeholder="请输入成交金额区间"
                                           value=""
                                           style="width: auto; display: inline-block"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item" >
                            <div class="layui-inline">
                                <label class="layui-form-label width-180">
                                    <span style="color: red">*</span>成交单量区间:
                                </label>
                                <div class="layui-input-inline" style="width: 500px">
                                    <input type="number"
                                           name="min_deal_num"
                                           autocomplete="off"
                                           class="layui-input"
                                           placeholder="请输入成交单量区间"
                                           value=""
                                           style="width: auto; display: inline-block"
                                    >
                                    &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="number"
                                           name="max_deal_num"
                                           autocomplete="off"
                                           class="layui-input"
                                           placeholder="请输入成交单量区间"
                                           value=""
                                           style="width: auto; display: inline-block"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item" >
                            <div class="layui-inline">
                                <label class="layui-form-label width-180">
                                    添加说明:
                                </label>
                                <div class="layui-input-inline">
                                    <textarea name="remark"
                                              placeholder="请输入说明"
                                              style="width: 500px"
                                              class="layui-textarea"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label width-180"></label>
                            <div class="layui-input-block">
                                <button class="layui-btn layui-btn-normal"
                                        lay-submit
                                        lay-filter="addNew">提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">取消</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</script>
@endverbatim
