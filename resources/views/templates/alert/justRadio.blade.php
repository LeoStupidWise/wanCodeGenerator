<script type="text/html" id="template-alert-just-radio">
    <form action="" class="layui-form">
        <br>
        <div class="layui-form-item">
            <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;给用户标记为：</div>
            <br>
            <div class="layui-input-block">
                <input type="radio"
                       name="userType"
                       lay-filter="user-tag"
                       value="category"
                       lay-skin="primary" title="战略用户">
                <input type="radio"
                       name="userType"
                       lay-filter="user-tag-test"
                       value="lifetime"
                       lay-skin="primary" title="终生用户">
            </div>
        </div>
    </form>
</script>