<?php 
    /***对二维数组排序，按照键值为中文且按照首个中文拼音来排序***/
    function multi_sort_chinese($arr, $sort_type, $key){
        foreach($arr as $k=>$v){
            $tmp[$k] = mb_substr($v[$key],0,1);
        }
        var_dump($tmp);
        $tmp = eval('return '.mb_convert_encoding(var_export($tmp,true), "gbk","utf-8").";");
        if (empty($sort_type)) {
            array_multisort($tmp, $arr);
        }else {
            if ($sort_type == 'desc'){
                array_multisort($tmp, SORT_DESC, $arr);
            }else {
                array_multisort($tmp, $arr);
            }
        }
        return $arr;
    }
     
    $a3 = array(
        array('name'=>'赵三', 'num'=>10),
        array('name'=>'钱四', 'num'=>20),
        array('name'=>'孙五', 'num'=>30),
        array('name'=>'李八', 'num'=>40),
        array('name'=>'周七', 'num'=>50),
        array('name'=>'吴九', 'num'=>60),
        array('name'=>'郑十', 'num'=>70),
        array('name'=>'王二', 'num'=>80),
    );
     
    $sort = "asc";
    $key = "name";
    $a3 = multi_sort_chinese($a3, $sort, $key);
    print_r($a3);