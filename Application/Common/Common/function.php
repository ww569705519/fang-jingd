<?php  
function  show($status, $message,$data=array()) {
    $reuslt = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );

    exit(json_encode($reuslt));
}
    function p($array){
        dump($array,1 ,'<pre>',0);
    }

function getMenuType($type) {
    return $type ==1 ? '后台菜单' : '前端导航';
}
function status($status) {
    if($status == 0) {
        $str = '关闭';
    }elseif($status == 1) {
        $str = '正常';
    }elseif($status == -1) {
        $str = '删除';
    }
    return $str;
}
function shelf($status) {
    if($status == 0) {
        $str = '已下架';
    }elseif ($status == 1){
        $str = '上架中';
    }
    return $str;
}
function getAdminMenuUrl($nav) {
    $url = '/index.php/admin/'.$nav['c'].'/'.$nav['a'];
    if($nav['f']=='index') {
        $url = '/index.php/admin/'.$nav['c'];
    }
    return $url;
}
function getMd5Password($password) {
    return md5($password . C('MD5_PRE'));
}

function showKind($status,$data) {
    header('Content-type:application/json;charset=UTF-8');
    if($status==0) {
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}
// 首页floor数据的方法
function classNav($class,$pid=0){
    $arr=array();
    foreach ($class as $v) {
        # code...
        if($v['partent_id']==$pid){
            $v['child']=classNav($class,$v['class_id']);
            $v['data']=indexFloorData($v['class_id']);
            $arr[]=$v; 
        }
    }
    return $arr;
}
function indexFloorData($id){
    // $res=D('Classify')->allClass(    );
    // return show(classNav($res));
   
    $haha = M();
    $sql='select  * from mall_product left join mall_class on mall_product.class_id=mall_class.class_id  where partent_id='.$id.' and mall_product.status=1  order by partent_id,sell desc limit 0,5 ';
    $res = $haha->query($sql); 
    return $res;
}

function getCartNum($res){
        $total=0;
        foreach ($res as $v) {

            $total+=$v['price']*$v['product_num'];
            
        }
        return $total;
}
?>