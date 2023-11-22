<?php
// 加载路由库
function includeLib($libname)
{
    return "./phps/lib/$libname.php";
}
// 加载页面库
function includePage($pagename)
{
    return "./phps/page/$pagename.php";
}
// 加载视图库
function includeViewer($name)
{
    return "./phps/view/$name.php";
}
// 加载公共库
function includeC($name)
{
    return "./phps/$name.php";
}
$config = require "./phps/config.php";
// 加载路由库
include includeLib("router");
// 加载视图库
include includeLib("view");

// 弹出提示框
function alert($msg)
{
    echo "<script>alert('$msg')</script>";
}
// 跳转到指定页面
function jsjump($u)
{
    echo "<script>window.location='$u'</script>";
}
// 刷新当前页面
function jsreload()
{
    echo "<script>window.location.reload()</script>";
}

// 获取静态文件
function getstatic($name)
{
    return file_get_contents("static/$name");
}