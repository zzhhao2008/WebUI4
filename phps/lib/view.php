<?php
class view
{
    // 定义一个静态函数，用于生成HTML的头部
    public static function header($title ="" , $oh = "")
    {
        global $config;
        $title=$title.$config['name'];
        // 输出HTML的头部
        echo "<!DOCTYPE html>\n";
        echo "<head>\n";
        // 引入头部文件
        include includeViewer("header");
        // 输出标题
        echo "\n<title>", $title . "</title>\n";
        // 输出oh变量
        echo $oh;
        echo "</head>\n";
        // 引入导航文件
        include includeViewer("nav");
        // 输出容器
        echo "<div class='container main'>";
    }
    // 定义一个静态函数，用于生成HTML的尾部
    public static function foot()
    {
        // 输出容器结束
        echo "</div>";
        // 引入尾部文件
        global $config;
        include includeViewer("foot");
    }
    // 定义一个静态函数，用于生成图标
    public static function icon($name)
    {
        // 返回图标
        return "<i class='bi bi-$name'></i>";
    }
    // 定义一个静态函数，用于生成jsMdLt
    public static function jsMdLt($id="pFace", $text)
    {
        // 输出使用JSMarkdown解析器解析后的HTML
        echo "
        <script src='https://cdn.jsdelivr.net/npm/marked/marked.min.js'></script>
        <script>
        document.getElementById('$id').innerHTML = marked.parse(`" . str_replace("`", "\`", addslashes($text)) . "`);
        import('/static/js/mathtex.js');
    </script>";
    }
}