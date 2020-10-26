<script type="text/javascript">
    function layInit() {
        layui.use(['layer', 'form', 'laytpl', 'code', 'element'], function(){
            vueApp.layer = layui.layer;
            vueApp.layForm = layui.form;
            vueApp.layTpl = layui.laytpl;
            vueApp.layElement = layui.element;

            // 代码初始化
            vueApp.layTpl($("#template-three-column-info").html()).render({}, function(html){
                vueApp.templates.threeColumnInfo = html;
            });
            let selectionRender = {
                selections: vueApp.selections,
                selectionSecond: vueApp.selections[0].children
            };
            vueApp.layTpl($("#template-two-select").html()).render(selectionRender, function(html){
                vueApp.templates.twoSelect = html;
            });
            vueApp.layTpl($("#template-alert-single-textarea").html()).render({}, function(html){
                vueApp.templates.alerts.singleTextarea = html;
            });
            vueApp.layTpl($("#template-alert-just-radio").html()).render({}, function(html){
                vueApp.templates.alerts.justRadio = html;
            });
            vueApp.layTpl($("#template-single-file-upload").html()).render({}, function(html){
                vueApp.templates.alerts.singleFileUpload = html;
            });
            vueApp.layTpl($("#template-simple-form").html()).render(selectionRender, function(html){
                vueApp.templates.simpleForm = html;
            });

            vueApp.layForm.on("radio(radio-type-select)", function (obj) {
                let type = $(obj.elem).data("type");
                let isAlert = 0;
                let layerOpenOption = {
                    type: 1,
                    title: '标题',
                    content: "",
                    btn: ['确定', '取消'],
                };
                hideWhatIsFromFile();
                switch (type) {
                    case "threeColumnInfo":
                        vueApp.templateNow = vueApp.templates.threeColumnInfo;
                        $("#area-code-threeColumnInfo").show();
                        isAlert = 0;
                        break;
                    case "singleTextarea":
                        vueApp.templateNow = vueApp.templates.alerts.singleTextarea;
                        $("#area-code-singleTextarea").show();
                        isAlert = 1;
                        layerOpenOption.content = vueApp.templateNow;
                        layerOpenOption.area = ['500px', '280px'];
                        break;
                    case "justRadio":
                        vueApp.templateNow = vueApp.templates.alerts.justRadio;
                        $("#area-code-justRadio").show();
                        isAlert = 1;
                        layerOpenOption.content = vueApp.templateNow;
                        layerOpenOption.area = ['500px', '230px'];
                        break;
                    case "twoSelect":
                        vueApp.templateNow = vueApp.templates.twoSelect;
                        isAlert = 0;
                        $("#area-code-twoSelect").show();
                        break;
                    case "singleFileUpload":
                        vueApp.templateNow = vueApp.templates.alerts.singleFileUpload;
                        $("#area-code-singleFileUpload").show();
                        isAlert = 1;
                        layerOpenOption.content = vueApp.templateNow;
                        layerOpenOption.area = ['500px', '260px'];
                        layerOpenOption.btn = null;
                        break;
                    case "simpleForm":
                        vueApp.templateNow = vueApp.templates.simpleForm;
                        isAlert = 0;
                        $("#area-code-simpleForm").show();
                        break;
                }
                if (isAlert) {
                    layer.open(layerOpenOption);
                    $("#area-model").css("display", "none");
                }
                else {
                    $("#area-model").html(vueApp.templateNow).css("display", "block");
                }
                vueApp.layForm.render();
            });
            vueApp.initListener();
        });
    }

    /**
     *
     */
    function hideWhatIsFromFile() {
        $("#area-code-twoSelect").hide();
        $("#area-code-justRadio").hide();
        $("#area-code-singleTextarea").hide();
        $("#area-code-threeColumnInfo").hide();
        $("#area-code-singleFileUpload").hide();
        $("#area-code-simpleForm").hide();
    }

    /**
     * 页面数据初始化
     */
    function getVueData() {
        return {
            layForm: null,
            layer: null,
            layTpl: null,
            layElement: null,
            templates: {
                threeColumnInfo: "",
                twoSelect: "",
                simpleForm: "",
                alerts: {
                    singleTextarea: "",
                    justRadio: "",
                    singleFileUpload: "",
                },
            },
            templateNow: "",
            selections: [
                {
                    value: "1",
                    text: "1",
                    selected: 0,
                    children: [
                        {value: "1-1", text: "1-1", selected: 0},
                        {value: "1-2", text: "1-2", selected: 0},
                        {value: "1-3", text: "1-3", selected: 0},
                        {value: "1-4", text: "1-4", selected: 0},
                    ]
                },
                {
                    value: "2",
                    text: "2",
                    selected: 0,
                    children: [
                        {value: "2-1", text: "2-1", selected: 0},
                        {value: "2-2", text: "2-2", selected: 0},
                    ]
                },
                {
                    value: "3",
                    text: "3",
                    selected: 0,
                    children: [
                        {value: "3-1", text: "3-1", selected: 0},
                        {value: "3-2", text: "3-2", selected: 0},
                        {value: "3-3", text: "3-3", selected: 0},
                    ]
                }
            ],
        };
    }
</script>
