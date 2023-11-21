<?php
function fileread($path){
    echo "<hr>".$path."<pre><xmp>";
    $str=file($path);
    foreach($str as $line=>$c){
        if(stripos(" ".$c,"<?")>=1
        &&(stripos(" ".$c,"<?")!==stripos(" ".$c,"<?php"))
        &&(stripos(" ".$c,"<?")!==stripos(" ".$c,"<?="))){
            echo $line.":".$c;
        }
    }
    echo "</xmp></pre>";
}

function dirsdir($path){
    if(is_dir($path)){
        $d=scandir($path);
        foreach($d as$v){
            if($v=='.'||$v=='..') continue;
            $npath=$path."/".$v;
            if(is_dir($npath)){
                dirsdir($npath);
            }else{
                fileread($npath);
            }
        }
    }else{
        fileread($path);
    }
}

//dirsdir("./script");
