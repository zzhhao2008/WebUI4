<?php
// 定义一个nulla数组，用于存放空值
define("nulla",array());
// 定义一个notdata数组，用于存放需要忽略的文件
$notdata=array(".","..","Thumbs.db");
// 定义一个DB类
class DB{
    // 定义一个静态方法，用于获取数据
    public static function getdata($path){
        // 定义一个变量，用于存放获取数据的路径
        $path="../data/$path.php";
        // 判断路径是否存在，如果不存在，则返回nulla数组
        if(!file_exists($path)) return array();
        // 如果路径存在，则返回该路径下的数据
        return require $path;
    }
    // 定义一个静态方法，用于存放数据
    public static function putdata($dataname,$data){
        // 定义一个变量，用于存放存放数据的路径
        $datapath="../data/$dataname.php";
        // 将数据写入到路径下，并返回写入是否成功
        return file_put_contents($datapath,"<?php return ".var_export($data,1).";?>");
    }
    
    public static function rmdata($dataname){
        // 定义一个变量，用于存放数据的路径
        $datapath="../data/$dataname.php";
        // 删除文件
        // 返回删除是否成功
        return unlink($datapath);
    }
    // 定义一个静态方法，用于扫描数据名
    public static function scanName($base){
        $dir="../data/$base/";
        $data=[];
        //判断路径合法性
        if(!file_exists($dir)||!is_dir($dir)){
            return nulla;
        }
        $r=scandir($dir);
        foreach($r as $k=>$v){
            //去除.. . 系统文件 *.db *.hid(正则表达式)
            if($v=="."||$v==".."||preg_match("/^.*\.db$/",$v)||preg_match("/^.*\.hid$/",$v)){
                //删除$r的该元素
                continue;
            }else{
                $v=str_replace(".php","",$v);
                $data[]=$v;
            }
        }
        //返回$r
        return $data;
    }
    // 定义一个静态方法，用于扫描数据
    public static function scanData($path){
        // 定义一个变量，用于存放扫描数据的路径
        $path="../data/$path/";
        // 判断路径是否存在，如果不存在，或者不是一个目录，则返回nulla数组
        if(!file_exists($path)||!is_dir($path)){
            return nulla;
        }
        // 获取路径下的文件列表
        $r=scandir($path);
        // 定义一个数组，用于存放扫描到的数据
        $datas=[];
        // 遍历文件列表
        foreach($r as $k=>$v){
            // 定义一个全局变量，用于存放需要忽略的文件
            global $notdata;
            // 判断文件是否需要忽略
            if(in_array($v,$notdata)){
                continue;
            }
            // 将文件名中的.php替换为空
            $v=str_replace(".php","",$v);
            // 将文件名作为key，文件内容作为value，存入到datas数组中
            $datas[$v]=DB::getdata($path.$v);
        }
        // 返回datas数组
        return $datas;
    }
    public static function creatBase($basename) {
        //创建一个数据文件夹
        //获取路径
        $path="../data/$basename/";
        //判断路径是否存在
        if(!file_exists($path)){
            //创建路径
            return mkdir($path);
        }
        else return nulla;
    }
}