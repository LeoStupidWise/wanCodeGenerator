{{--示例不提供上传功能，只提供界面展示--}}
<script type="text/html" id="template-single-file-upload">
    <form action="" class="layui-form">
        <div class="layui-form-item" style="margin-top: 40px">
            <div class="layui-inline no-margin">
                <label class="layui-form-label">导入文件:</label>
                <div class="layui-input-inline">
                    <input type="button"
                           class="layui-btn layui-btn-small layui-btn-normal"
                           id="upload-choose-file"
                           value="选择文件" />
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline no-margin">
                <label class="layui-form-label"></label>
                <div class="layui-input-inline" style="width: 300px">
                    请按模板格式整理导入文件 &nbsp;&nbsp;&nbsp;&nbsp; <a
                            class="a-color-blue"
                            href="https://qncdn.wanshifu.com/ocs/导入模板.xls">下载模板</a>
                </div>
            </div>
        </div>
        <div class="layui-form-item float-right" style="margin-right: 30px">
            <button type="button" class="layui-btn layui-btn-sm layui-btn-normal"
                    id="upload-file-confirm">确定</button>
            <button type="button" class="layui-btn layui-btn-sm layui-btn-primary"
                    id="upload-file-cancel">取消</button>
        </div>
    </form>
</script>

<script>
    /*
    // #import-excel 这个按钮触发弹框
    $("#template-single-file-upload").on("click", function () {
        let renderHtml = "";
        layTpl($('#template-upload-excel').html()).render({}, function (html) {
            renderHtml = html;
        });
        let load = null;
        layer.open({
            // type 会影响在 layer.open 中再使用 layer.msg()
            type: 1,
            title: "导入添加",
            content: renderHtml,
            area: ['500px', '260px'],
            // 不适用弹框默认按钮
            btn: null,
            success: function () {
                // 不是弹框的默认取消按钮，只能在弹框渲染完之后再监听
                $("#upload-file-cancel").on("click", function () {
                    layer.closeAll();
                });
                layUpload.render({
                    elem: '#upload-choose-file'
                    , url: '/data/config/ExcelAdd'
                    // 绑定点击后上传的按钮
                    , bindAction: '#upload-file-confirm'
                    // 不进行自动上传，即选择后点击确认再上传
                    , auto: false
                    , accept: 'file'				 //允许上传的文件类型
                    , exts: 'xls|xlsx' 			//设置智能上传图片格式文件
                    , before: function (obj) {
                        load = layerLoad();
                        console.log("before");
                        console.log(obj);
                    }
                    , done: function (res) {
                        layer.close(load);
                        if (res.code == 1) {
                            layerSuccess("上传成功");
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                        }
                        else {
                            layerError(data.msg);
                        }
                    }
                    ,error: function(){
                        //请求异常回调
                        layer.close(load);
                        layerError("添加出错，请联系管理员");
                    }
                });
            }
        })
    });
    */
</script>