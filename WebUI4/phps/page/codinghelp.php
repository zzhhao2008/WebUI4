<?php view::header("开发帮助"); ?>
<pre>
<h1>各文件位置</h1>
Lib:
    - 公共类库 phps/lib
    - 公共函数 phps/lib/main.php
    - 公共配置 phps/config.php
    - 渲染控制器 phps/lib/view.php
    - 路由控制器 phps/lib/route.php
渲染模板： phps/view
页： phps/page
路由： phps/route.php
各部分注释可查看相关页面
可自行配制模块功能,引入模块请查看phps/lib/main.php
客服：QQ 2019666136
关于Demo，请查看源代码
</pre>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ShowMessage("Hello!","本页位于/phps/page/codeinghelp.php","刚刚");
        ShowMessage("请注意","只有页面全部加载完成后才能调用JS.ShowMessage","刚刚");
        });

    
</script>
<?php
//Demo
view::alert("信息","info",666666);
view::alert("警告","warning",666666);
view::alert("错误/危险","danger",6666666);
view::message("Hello World!","ZSV Studio 敬上","arrow","114514年前")
?>
<?php view::foot(); ?>