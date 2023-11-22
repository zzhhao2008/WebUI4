<?php
//声明一个全局变量$routerMap
$routerMap=[];
//定义一个Router类
class Router{
    //定义一个静态方法getUri，用于获取当前请求的uri
    static public function getUri(){
        //获取当前请求的uri
        $uri=$_SERVER['REQUEST_URI'];
        //如果uri为'/'或者uri的第二个字符为'?'，则返回'/'
        if($uri==='/'||$uri[1]==='?') return '/';
        //对uri进行转义
        $uri=addslashes($uri);
        //获取uri中第一个'?'的索引
        $qp=stripos($uri,"?")-1;
        //如果qp小于等于0，则qp等于uri的长度减1
        if($qp<=0) $qp=strlen($uri)-1;
        //截取uri，从第一个字符到qp索引的字符
        $uri=substr($uri,1,$qp);
        //返回uri
        return $uri;
    }
    //定义一个静态方法login，用于设置登录路由
    static public function login($uri,$scp){
        //声明一个全局变量$routerMap
        global $routerMap;
        //将登录路由添加到$routerMap['login']中
        $routerMap['login'][$uri]=$scp;
    }
    //定义一个静态方法any，用于设置任意路由
    static public function any($uri,$scp){
        //声明一个全局变量$routerMap
        global $routerMap;
        //将任意路由添加到$routerMap['any']中
        $routerMap['any'][$uri]=$scp;
    }
    //定义一个静态方法guest，用于设置访客路由
    static public function guest($uri,$scp){
        //声明一个全局变量$routerMap
        global $routerMap;
        //将访客路由添加到$routerMap['guest']中
        $routerMap['guest'][$uri]=$scp;
    }
    //定义一个静态方法admin，用于设置管理员路由
    static public function admin($uri,$scp){
        //声明一个全局变量$routerMap
        global $routerMap;
        //将管理员路由添加到$routerMap['admin']中
        $routerMap['admin'][$uri]=$scp;
    }
    //定义一个静态方法post，用于设置post路由
    static public function post($uri,$scp){
        //声明一个全局变量$routerMap
        global $routerMap;
        //将post路由添加到$routerMap['post']中
        $routerMap['post'][$uri]=$scp;
    }
    //定义一个静态方法loadRouteMap，用于加载路由映射
    static public function loadRouteMap(){
        //声明一个全局变量$routerMap
        global $routerMap;
        //包含一个文件，用于加载路由映射
        include includeC("route");
        //返回
        return;
    }
    //定义一个静态方法GetScriptPath，用于获取脚本路径
    static public function GetScriptPath($ru,$userpower=0){
        //声明一个全局变量$routerMap
        global $routerMap;
        //如果$routerMap为空，则调用loadRouteMap方法加载路由映射
        if(empty($routerMap)) Router::loadRouteMap();
        //如果$routerMap['any']中存在$ru，则返回$routerMap['any'][$ru]
        if(isset($routerMap['any'][$ru])) return $routerMap['any'][$ru];
        //如果$routerMap['login']中存在$ru，且用户权限大于等于1，则返回$routerMap['login'][$ru]
        if(isset($routerMap['login'][$ru])&&$userpower>=1) return $routerMap['login'][$ru];
        //如果$routerMap['admin']中存在$ru，且用户权限大于等于2，则返回$routerMap['admin'][$ru]
        if(isset($routerMap['admin'][$ru])&&$userpower>=2) return $routerMap['admin'][$ru];
        //如果$routerMap['guest']中存在$ru，且用户权限等于0，则返回$routerMap['guest'][$ru]
        if(isset($routerMap['guest'][$ru])&&$userpower==0) return $routerMap['guest'][$ru];
        //否则返回'error/404'
        return "error/404";
    }
}