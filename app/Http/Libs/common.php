<?php
use App\Models\User;
use App\Models\Setting;
use App\Models\LogSms;

/**
 * 公共函数
 *
 * @return string
 */
/**
 * 截取字符串
 * Enter description here .
 * ..
 *
 * @param unknown_type $addr
 * @param unknown_type $num
 * @param unknown_type $suffix
 */
function subAddress($addr, $num = 48, $suffix = '')
{

    $len = strlen($addr);
    if ($len > $num) {
        $len = $num;
        for ($idx = 0; $idx < $len;) {
            if (ord($addr[$idx]) > 0x7f) {
                $idx += 3;
            } else {
                $idx++;
            }
        }

        return substr($addr, 0, $idx) . $suffix;
    } else {
        return $addr;
    }
}

/**
 * html转text
 * Enter description here .
 * ..
 *
 * @param $str
 * @param $r
 */
function Html2Text($str, $r = 0)
{

    if (!function_exists('SpHtml2Text')) {

        function SpHtml2Text($str)
        {

            $str = preg_replace("/<sty(.*)\\/style>|<scr(.*)\\/script>|<!--(.*)-->/isU", "", $str);
            $alltext = "";
            $start = 1;
            for ($i = 0; $i < strlen($str); $i++) {
                if ($start == 0 && $str[$i] == ">") {
                    $start = 1;
                } else {
                    if ($start == 1) {
                        if ($str[$i] == "<") {
                            $start = 0;
                            $alltext .= " ";
                        } else {
                            if (ord($str[$i]) > 31) {
                                $alltext .= $str[$i];
                            }
                        }
                    }
                }
            }
            $alltext = str_replace("　", " ", $alltext);
            $alltext = preg_replace("/&([^;&]*)(;|&)/", "", $alltext);
            $alltext = preg_replace("/[ ]+/s", " ", $alltext);

            return $alltext;
        }
    }
    if ($r == 0) {
        return SpHtml2Text($str);
    } else {
        $str = SpHtml2Text(stripslashes($str));

        return addslashes($str);
    }
}

/**
 * ajax请求返回数据格式
 * Enter description here .
 * ..
 *
 * @param unknown_type $msg
 * @param unknown_type $code
 * @param unknown_type $forwardUrl
 */
function AjaxCallbackMessage($msg = '', $code = true, $forwardUrl = '')
{

    $array = array(

        "status"     => $code,
        "message"    => $msg,
        "forwardUrl" => $forwardUrl
    );

    return json_encode($array);
}

/*
 * 获取IP
*/
function getIP()
{
    /* 客户端IP */
    if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $onlineip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $onlineip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $onlineip = getenv('REMOTE_ADDR');
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $onlineip = $_SERVER['REMOTE_ADDR'];
    }
    preg_match("/[\d\.]{7,15}/", $onlineip, $onlineipmatches);
    $ip = $onlineipmatches[0] ? $onlineipmatches[0] : 'unknown';

    return $ip;
}

/**
 * 验证是否邮箱
 * Enter description here .
 * ..
 *
 * @param $user_email
 */
function isEmail($user_email)
{

    $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
    if (strpos($user_email, '@') !== false && strpos($user_email, '.') !== false) {
        if (preg_match($chars, $user_email)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/**
 * ajax 分页
 * Enter description here .
 * ..
 *
 * @param unknown_type $count
 * @param unknown_type $page
 * @param unknown_type $pagesize
 */
function ajaxPage($count, $page = 1, $pagesize = 10)
{

    $count = ceil($count / $pagesize);
    $strHtml = '';
    $n = $count >= 4 ? 4 : $count;
    $nextpage = ($page + 1) <= $count ? ($page + 1) : 0;
    $prevpage = ($page - 1) >= 1 ? ($page - 1) : 0;
    $pageclass = 'page-list-hover';
    $strHtml .= '<a href="javascript:;" class="home" title="首页" page="1"><i class="ui-ico"></i>首页</a>';
    $strHtml .= '<a href="javascript:;" class="pre" title="上一页" page="' . $prevpage . '"><i class="ui-ico"></i></a>';
    $pageNum = $n;
    $start = 1;
    if ($count == 1) {
        return "";
    }
    if ($count > 4) {
        $num = ($count - $page) < 4 ? ($count - $page) : 3;
        $isprev = $page + 3;
        if ($isprev >= $count) {
            $start = $count - 3;
            $pageNum = $count;
        } else {
            $start = $page;
            $pageNum = $page + $num;
        }
    }
    for ($i = $start; $i <= $pageNum; $i++) {
        if ($i == $page) {
            $strHtml .= '<a href="javascript:;" class="page-list ' . $pageclass . '" page="' . $i . '">' . $i . '</a>';
        } else {
            $strHtml .= '<a href="javascript:;" class="page-list" page=' . $i . '>' . $i . '</a>';
        }
    }
    $strHtml .= '<a href="javascript:;" class="next" title="下一页" page="' . $nextpage . '"><i class="ui-ico"></i></a>';
    $strHtml .= '<a href="javascript:;" class="last" title="末页" page="' . $count . '"><i class="ui-ico"></i>末页</a>';

    return $strHtml;
}

/*
 * 创建目录
 */
function createDir($dirs)
{
    //先判断目录是否存在
    if (file_exists($dirs)) {
        return true;
    }
    $dir = substr($dirs, 0, 2);
    $dir_str = substr($dirs, 3);
    $dir_arr = explode('/', $dir_str);
    if ($dir_arr) {
        foreach ($dir_arr as $val) {
            if (!empty($val)) {
                //判断文件夹是否存在
                $dir .= '/' . $val;
                if (!file_exists($dir)) {
                    if (!mkdir($dir, 0777)) {
                        return false;
                    }
                }
            }
        }
    }

    return true;
}

function encodeHexStr($dataCoding, $realStr){

    if ($dataCoding == 15)
    {
        return strtoupper(bin2hex(iconv('UTF-8', 'GBK', $realStr)));
    }
    else if ($dataCoding == 3)
    {
        return strtoupper(bin2hex(iconv('UTF-8', 'ISO-8859-1', $realStr)));
    }
    else if ($dataCoding == 8)
    {
        return strtoupper(bin2hex(iconv('UTF-8', 'UCS-2', $realStr)));
    }
    else
    {
        return strtoupper(bin2hex(iconv('UTF-8', 'ASCII', $realStr)));
    }
}
/**
 * 发送短信错误提醒
 */
function SendSmsErrorMessage($res){
    if($res=="-01"){
        return	AjaxCallbackMessage("系统维护中,请联系客服",false,'');
    }elseif($res=="-02"){
        return	AjaxCallbackMessage("当前账号余额不足",false,'');
    }elseif($res=="-03"){
        return	AjaxCallbackMessage("账号停止",false,'');
    }elseif($res=="-04"){
        return	AjaxCallbackMessage("目的号码运营商不在服务覆盖范围",false,'');
    }elseif($res=="-07"){
        return	AjaxCallbackMessage("手机号码不能为空",false,'');
    }elseif($res=="-08"){
        return	AjaxCallbackMessage("短信内容不能为空",false,'');
    }elseif($res=="-14"){
        return	AjaxCallbackMessage("内部错误",false,'');
    }elseif($res=="-15"){
        return	AjaxCallbackMessage("非法手机号码",false,'');
    }elseif($res=="-16"){
        return	AjaxCallbackMessage("短信内容超长",false,'');
    }elseif($res=="-17"){
        return	AjaxCallbackMessage("短信内容含有非法字符",false,'');
    }elseif($res=="-18"){
        return	AjaxCallbackMessage("手机号码限制",false,'');
    }elseif($res=="-19"){
        return	AjaxCallbackMessage("短信内容编码不对",false,'');
    }else{
        return	AjaxCallbackMessage(lang('sendCodeFailure'),false,'');
    }
}
function SendSMS($strMobile, $content,$type,$sendType = ''){
    //include_once 'nusoap_base.class.php';
    $sendType = $sendType ? $sendType : config('system.sendsms_type');
    $is_send = false;//默认关闭短信发送功能
    if ($sendType == 2) {
        $set = Setting::cache();
        //判断是否开启短信发送功能
        if(isset($set['is_send_phone']['value']) && $set['is_send_phone']['value']){
            $is_send = true;
        }
    }
    elseif ($sendType == 3) {
        $is_send = true;
    }
    $noPrePhone=$strMobile;
    if($is_send){
        $str=0;
        $user=User::where('username',$strMobile)->first();
        if(isset($user->uid)){
            $code = str_replace('+', '', $user->phone_code);
            $telStr=$code.$strMobile;
            $noPrePhone=$strMobile;
        }else{
            $telStr=str_replace('+', '', $strMobile);
            $noPrePhone=substr($telStr,2);
        }
        $data = array (
            'src' => '天涯若比邻', // 用户名
            'pwd' => 'tyrbl911', // 你的密码
            'ServiceID' => 'SEND',
            'dest' => $telStr, // 你的目的号码
            'sender' => '1370138', // 你的原号码
            'codec' => '8', // 编码
            'msg' => encodeHexStr(8,$content)
        );

        $uri = "http://210.51.190.233:8085/mt/mt3.ashx";
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $uri );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        if($return>0){
            $str =1;
        }else{
            //错误转第二办公室
            //第二办公室
            include_once 'nusoap_base.class.php';
            $client = new nusoap_client("http://sms.2office.cn:8080/WebService/SmsService.asmx?wsdl", true);
            $client->soap_defencoding = 'UTF-8';
            $client->decode_utf8 = false;
            $client->xml_encoding = 'UTF-8';
            $err = $client->getError();
            if ($err) {
            }
            $password = md5("tyrbl911aa375297554c7b06076cfa57f34add1c");
            $smsid = microtime(true) * 100;
            //$strMobile = substr($strMobile, -11);

            $param = array(
                'account' => '2522664',
                'password' => $password,
                'mobile' => $noPrePhone,
                'content' => $content,
                'channel' => '252266401',
                'smsid' => $smsid,
                'sendType' => '1'
            );
            //短信余额不足
            if($return=='-02'){
                $yuebuzuparam = array(
                    'account' => '2522664',
                    'password' => $password,
                    'mobile' =>13735850760,//18958105255,
                    'content' => "短信通道余额不足【无界投融】",
                    'channel' => '252266401',
                    'smsid' => $smsid,
                    'sendType' => '1'
                );
                $yuebuzuresult = $client->call('SendSms3', array(
                    'parameters' => $yuebuzuparam
                ), '', '', false, true, 'document', 'encoded');
            }
            $result = $client->call('SendSms3', array(
                'parameters' => $param
            ), '', '', false, true, 'document', 'encoded');
            $str = explode(",", $result['SendSms3Result']);
            $str=isset($str[0])?$str[0]:-1;
            $str=($str==0)?1:0;
        }

        if(Auth::check()){
            $uid=Auth::user()->uid;
        }else{
            $uid=0;
        }
        LogSms::create(array(
            'uid'=>0,
            'ip'=>getIP(),
            'client_id'=>1,
            'type'=>$type,
            'content'=>$content,
            'phone'=>$strMobile,
            'status'=>$str
        ));
        return $str;
    }else{
        return 0;
    }
}

/**
 * 将一个平面的二维数组按照指定的字段转换为树状结构
 *
 * 用法：
 *
 * @code php
 * $rows = array(
 * array('id' => 1, 'value' => '1-1', 'parent' => 0),
 * array('id' => 2, 'value' => '2-1', 'parent' => 0),
 * array('id' => 3, 'value' => '3-1', 'parent' => 0),
 *
 * array('id' => 7, 'value' => '2-1-1', 'parent' => 2),
 * array('id' => 8, 'value' => '2-1-2', 'parent' => 2),
 * array('id' => 9, 'value' => '3-1-1', 'parent' => 3),
 * array('id' => 10, 'value' => '3-1-1-1', 'parent' => 9),
 * );
 *
 * $tree = Helper_Array::tree($rows, 'id', 'parent', 'nodes');
 *
 * dump($tree);
 * // 输出结果为：
 * // array(
 * // array('id' => 1, ..., 'nodes' => array()),
 * // array('id' => 2, ..., 'nodes' => array(
 * //        array(..., 'parent' => 2, 'nodes' => array()),
 * //        array(..., 'parent' => 2, 'nodes' => array()),
 * // ),
 * // array('id' => 3, ..., 'nodes' => array(
 * //        array('id' => 9, ..., 'parent' => 3, 'nodes' => array(
 * // array(..., , 'parent' => 9, 'nodes' => array(),
 * //        ),
 * // ),
 * // )
 * @endcode
 *
 * 如果要获得任意节点为根的子树，可以使用 $refs 参数：
 * @code php
 * $refs = null;
 * $tree = Helper_Array::tree($rows, 'id', 'parent', 'nodes', $refs);
 *
 * // 输出 id 为 3 的节点及其所有子节点
 * $id = 3;
 * dump($refs[$id]);
 * @endcode
 *
 * @param array   $arr
 *        数据源
 * @param string  $key_node_id
 *        节点ID字段名
 * @param string  $key_parent_id
 *        节点父ID字段名
 * @param string  $key_childrens
 *        保存子节点的字段名
 * @param boolean $refs
 *        是否在返回结果中包含节点引用
 *
 *        return array 树形结构的数组
 */
function toTree($arr, $key_node_id, $key_parent_id = 'parent_id', $key_childrens = 'children', $treeIndex = false, & $refs = null)
{

    $refs = array();
    foreach ($arr as $offset => $row) {
        $arr[$offset][$key_childrens] = array();
        $refs[$row[$key_node_id]] = &$arr[$offset];
    }

    $tree = array();
    foreach ($arr as $offset => $row) {
        $parent_id = $row[$key_parent_id];
        if ($parent_id) {
            if (!isset($refs[$parent_id])) {
                if ($treeIndex) {
                    $tree[$offset] = &$arr[$offset];
                } else {
                    $tree[] = &$arr[$offset];
                }
                continue;
            }
            $parent = &$refs[$parent_id];
            if ($treeIndex) {
                $parent[$key_childrens][$offset] = &$arr[$offset];
            } else {
                $parent[$key_childrens][] = &$arr[$offset];
            }
        } else {
            if ($treeIndex) {
                $tree[$offset] = &$arr[$offset];
            } else {
                $tree[] = &$arr[$offset];
            }
        }
    }

    return $tree;
}

//排序
function cmp_func($a, $b)
{
    global $order;
    if ($a['is_dir'] && !$b['is_dir']) {
        return -1;
    } else {
        if (!$a['is_dir'] && $b['is_dir']) {
            return 1;
        } else {
            if ($order == 'size') {
                if ($a['filesize'] > $b['filesize']) {
                    return 1;
                } else {
                    if ($a['filesize'] < $b['filesize']) {
                        return -1;
                    } else {
                        return 0;
                    }
                }
            } else {
                if ($order == 'type') {
                    return strcmp($a['filetype'], $b['filetype']);
                } else {
                    return strcmp($a['filename'], $b['filename']);
                }
            }
        }
    }
}

/**
 * 截取utf-8格式的中文字符串
 *
 * @param $sourcestr 是要处理的字符串
 * @param $cutlength 为截取的长度(即字数)
 */
function cut_str($sourcestr, $cutlength, $dot = '...')
{

    $returnstr = '';
    $i = 0;
    $n = 0;
    $str_length = strlen($sourcestr); // 字符串的字节数
    while (($n < $cutlength) and ($i <= $str_length)) {
        $temp_str = substr($sourcestr, $i, 1);
        $ascnum = Ord($temp_str); // 得到字符串中第$i位字符的ascii码
        if ($ascnum >= 224)            // 如果ASCII位高与224，
        {
            $returnstr = $returnstr . substr($sourcestr, $i, 3); // 根据UTF-8编码规范，将3个连续的字符计为单个字符
            $i = $i + 3; // 实际Byte计为3
            $n++; // 字串长度计1
        } elseif ($ascnum >= 192)            // 如果ASCII位高与192，
        {
            $returnstr = $returnstr . substr($sourcestr, $i, 2); // 根据UTF-8编码规范，将2个连续的字符计为单个字符
            $i = $i + 2; // 实际Byte计为2
            $n++; // 字串长度计1
        } elseif ($ascnum >= 65 && $ascnum <= 90)            // 如果是大写字母，
        {
            $returnstr = $returnstr . substr($sourcestr, $i, 1);
            $i = $i + 1; // 实际的Byte数仍计1个
            $n++; // 但考虑整体美观，大写字母计成一个高位字符
        } else            // 其他情况下，包括小写字母和半角标点符号，
        {
            $returnstr = $returnstr . substr($sourcestr, $i, 1);
            $i = $i + 1; // 实际的Byte数计1个
            $n = $n + 0.5; // 小写字母和半角标点等与半个高位字符宽...
        }
    }
    if ($str_length > strlen($returnstr)) {
        $returnstr = $returnstr . $dot; // 超过长度时在尾处加上省略号
    }

    return $returnstr;
}

/**
 * 检查邮箱是否正确
 *
 * @return boolean
 */
function checkEmail($email)
{

    $num = preg_match("/[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+\.[a-zA-Z]{2,4}/", $email, $match);

    if ($num == 0) {
        return false;
    } else {
        return true;
    }
}

/**
 * 检查手机号码是否正确
 *
 * @return boolean
 */
function checkMobile($mobile)
{

    $num = preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$|17[6-8]{1}[0-9]{8}$/", $mobile, $match);
    if ($num == 0) {
        return false;
    } else {
        return true;
    }
}

/**
 * 递归法寻找家谱树
 */
function familyTree($arr, $upid)
{
    $trees = [];

    foreach ($arr as $k => $v) {
        if (is_object($v)) {
            $id = $v->id;
            $vupid = $v->upid;
        } elseif (is_array($v)) {
            $id = $v['id'];
            $vupid = $v['upid'];
        } else {
            return false;
        }

        if ($id == $upid) {
            $trees[] = $v;
            $trees = array_merge($trees, familyTree($arr, $vupid));
        }
    }

    return $trees;
}

/**
 * 递归法寻找子孙树
 */
function subTree($arr, $id, $lev = 0)
{
    $subTrees = [];
    foreach ($arr as $k => $v) {
        if ($v->upid == $id) {
            $subTrees[] = $v;
            $subTrees = array_merge($subTrees, subTree($arr, $v->id, $lev + 1));
        }
    }

    return $subTrees;
}

function curl($url, $post)
{
    $post = http_build_query($post);
    $ch = curl_init();//初始化curl
    curl_setopt($ch, CURLOPT_URL, $url);//抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $data = curl_exec($ch);//运行curl
    curl_close($ch);

    return $data;
}

/**
 * 获取客服信息
 */
function getKefuName()
{
    $username = getKefuUsername();
    $str = '';
    foreach ($username as $k => $v) {
        $user = User::where('username', $v)->first();
        $name = $user->realname ? $user->realname : $user->nickname;
        $str .= '   ' . $name;
    }

    return $str;
}

function getKefuUsername()
{
    return array('18757579483');
}

function getNameByUsername($username)
{
    $user = User::where('username', $username)->first();

    return $user->realname ? $user->realname : $user->nickname;
}

function getKefuContentArray()
{
    $usernames = getKefuUsername();
    $contentArray = array();
    foreach ($usernames as $k => $v) {
        $contentArray[$k]['hyper'] = getNameByUsername($v);
        $contentArray[$k]['text'] = $v;
    }

    return $contentArray;
}

/**
 * 获得图片地址
 * size 表示large thumb 具体宽度根据需要生成
 */
function getImage($filename, $type = 'avatar', $size = 'large', $large_thumb = 1)
{
    if (empty($filename)) {
        //返回默认图片
        switch ($type) {
            case 'avatar':
                return URL::asset('/') . ($size == 'large' ? "images/default/avator-xl.png" : "images/default/avator-m.png");
                break;
            case 'project':
                return URL::asset('/') . ($size == 'large' ? "images/default/large-pro.jpg" : "images/default/small-pro.jpg");
                break;
            case 'activity':
                return URL::asset('/') . ($size == 'large' ? "images/default/large-pro.jpg" : "images/default/small-pro.jpg");
                break;
            case 'video':
                return URL::asset('/') . ($size == 'large' ? "images/default/large-pro.jpg" : "images/default/small-pro.jpg");
                break;
            case 'maker':
                return URL::asset('/') . ($size == 'large' ? "images/default/large-pro.jpg" : "images/default/small-pro.jpg");
                break;
            case 'artcle':
                return URL::asset('/') . ($size == 'large' ? "images/default/large-pro.jpg" : "images/default/small-pro.jpg");
                break;
            default:
                return URL::asset('/') . ($size == 'large' ? "images/default/avator-xl.png" : "images/default/avator-m.png");
                break;
        }
    }
    if (is_numeric($filename)) {
        return URL::asset('/') . ($size == 'large' ? "images/default/avator-xl.png" : "images/default/avator-m.png");
    }

    $pathInfo = pathinfo($filename);
    $wjtrUrl = config('system.wjtrUrl');

    $url = $wjtrUrl . $pathInfo ['dirname'] . ($large_thumb == 1 ? "/_" . $size : "") . "/" . $pathInfo ['basename'];

    return $url;
}

/*
 * 加载文字
 */
function lang($text, $parameters = [])
{

    return trans('message.' . $text, $parameters);
}

/**
 * @since 2015-03-13
 * @author yubb
 *
 * @param 二维码内容 value
 * @param 图片存放地址
 * @param 其中logo的地址 logo-path
 */
function img_create($value = '', $filename = '', $path = '', $logo_path = './images/qrcode/logo.png')
{
    include_once 'phpqrcode.class.php';

    // 		$value = 'http://www.helloweba.com'; //二维码内容
    // 		$dis = './attached/image/qrcode/abcd.png';
    //$logo_path = './attached/image/qrcode/logo.png';

    $dis = $path . '/image/qrcode/' . $filename;
    $pos = strripos($path, "\\");
    $pos==false && $pos = strripos($path, "/");
    $oldDis = substr($path, $pos + 1) . '/image/qrcode/' . $filename;
    $errorCorrectionLevel = 'H'; //容错级别
    $matrixPointSize = 6; //生成图片大小

    //生成二维码图片
    QRcode::png($value, $dis, $errorCorrectionLevel, $matrixPointSize, 2);
    echo 1;
    $path = imagecreatefromstring(file_get_contents($dis));

    if (is_file($logo_path)) {
        echo 2;
        $logo = imagecreatefromstring(file_get_contents($logo_path));
        echo 3;
        $QR_width = imagesx($path); //二维码图片宽度
        $QR_height = imagesy($path); //二维码图片高度
        $logo_width = imagesx($logo); //logo图片宽度
        $logo_height = imagesy($logo); //logo图片高度
        $logo_qr_width = $QR_width / 4;
        $scale = $logo_width / $logo_qr_width;
        $logo_qr_height = $logo_height / $scale;
        $from_width = ($QR_width - $logo_qr_width) / 2;
        $from_h = ($QR_height - $logo_qr_height) / 2;
        //重新组合图片并调整大小
        imagecopyresampled($path, $logo, $from_width, $from_h, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    }
    //输出图片
    imagepng($path, $dis);

    return $oldDis;
}

/**
 * 获得唯一字符串
 *
 * @return string
 */
function unique_id()
{

    srand((double)microtime() * 1000000);

    return md5(uniqid(rand()));
}
/**
 * 个推 推送消息接口
 * type==all token数组
 * $data = array('title')
 * 消息类型
 * 1透传消息 用cid
 * 2通知
 *  $data array()
 *  result
1.网页的形式：
type：url，网址 url的数据{"type":"url", "url":"http://www.wjtr.com"}
2.无界直播
type：live ， {"type":"live", "is_live":0 or 1}

还有subject，image（），url
 * @param unknown_type $token
 * @param unknown_type $type
 * @return mixed
 */
function pushMessage($cids,$data,$type='',$msg_type=''){
    include_once 'IGt.Push.php';
    define('APPKEY','myI6OX8cP17EwnztzdgksA');
    define('APPID','6qE7ksbdRz8yo3CjOX93s3');
    define('MASTERSECRET','Ig1IyBl3BN8uSSToO1TZY');
    define('HOST','http://sdk.open.api.igexin.com/apiex.htm');
    define('Alias','请输入别名');

    putenv("needDetails=true");
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);

    if($msg_type == 'transmission'){
        //透传
        if($type == "ios"){
            $template =  new IGtTransmissionTemplate();
            $template->set_appId(APPID);//应用appid
            $template->set_appkey(APPKEY);//应用appkey
            $template->set_transmissionType(1);//透传消息类型
            $template->set_transmissionContent($data['title']);//透传内容
            //APN简单推送
            $apn = new IGtAPNPayload();
            $alertmsg=new SimpleAlertMsg();
            $alertmsg->alertMsg="";
            $apn->alertMsg=$alertmsg;
            $apn->add_customMsg("payload","payload");
            $apn->contentAvailable=1;
            $apn->category="ACTIONABLE";
            $template->set_apnInfo($apn);
            $listmessage_ios = new IGtListMessage();
            $listmessage_ios->set_data($template);
            $contentId = $igt->getAPNContentId(APPID, $listmessage_ios);
            $ret = $igt->pushAPNMessageToList(APPID, $contentId, $cids);
        }else if($type == "android"){
            $template =  new IGtTransmissionTemplate();
            $template->set_appId(APPID);//应用appid
            $template->set_appkey(APPKEY);//应用appkey
            $template->set_transmissionType(1);//透传消息类型
            $template->set_transmissionContent($data['title']);//透传内容
            $message = new IGtListMessage();
            $message->set_isOffline(true);//是否离线
            $message->set_offlineExpireTime(3600*12*1000);//离线时间
            $message->set_data($template);//设置推送消息类型
            $message->set_PushNetWorkType(1);//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送
            $contentId = $igt->getContentId($message);
            //接收方1
            foreach($cids as $val){
                $target1 = new IGtTarget();
                $target1->set_appId(APPID);
                $target1->set_clientId($val);
                $targetList[] = $target1;
            }
            $ret = $igt->pushMessageToList($contentId, $targetList);
        }
    }else{
        //通知
        if($type == 'ios'){
            $template_ios = new IGtAPNTemplate();
            $apn = new IGtAPNPayload();
            $alertmsg=new SimpleAlertMsg();
            $alertmsg->alertMsg=$data['title'];
            $apn->alertMsg=$alertmsg;
            //        $apn->badge=2;
            //        $apn->sound="";
            $apn->add_customMsg("payload","payload");
            $apn->contentAvailable=1;
            $apn->category="ACTIONABLE";
            $template_ios->set_apnInfo($apn);
            $listmessage_ios = new IGtListMessage();
            $listmessage_ios->set_data($template_ios);
            $contentId = $igt->getAPNContentId(APPID, $listmessage_ios);
            $ret = $igt->pushAPNMessageToList(APPID, $contentId, $cids);
        }else if($type == 'android'){
            /*
             $template =  new IGtLinkTemplate();
            $template ->set_appId(APPID);                  //应用appid
            $template ->set_appkey(APPKEY);                //应用appkey
            $template ->set_title($data['title']);       //通知栏标题
            $template ->set_text($data['content']);        //通知栏内容
            //$template->set_logo("");                       //通知栏logo
            //$template->set_logoURL("");                    //通知栏logo链接
            $template ->set_isRing(true);                  //是否响铃
            $template ->set_isVibrate(true);               //是否震动
            $template ->set_isClearable(true);             //通知栏是否可清除
            $template ->set_url("http://www.wjtr.com/"); //打开连接地址
            //设置通知定时展示时间，结束时间与开始时间相差需大于6分钟，消息推送后，客户端将在指定时间差内展示消息（误差6分钟）
            // $begin = "2015-02-28 15:26:22";
            // $end = "2015-02-28 15:31:24";
            // $template->set_duration($begin,$end);    //个推信息体
            */
            $template =  new IGtNotificationTemplate();
            $template->set_appId(APPID);//应用appid
            $template->set_appkey(APPKEY);//应用appkey
            $template->set_transmissionType(1);//透传消息类型
            $template->set_transmissionContent($data['result']);//透传内容
            $template->set_title($data['title']);//通知栏标题
            $template->set_text($data['content']);//通知栏内容
            // $template->set_logo("http://wwww.igetui.com/logo.png");//通知栏logo
            $template->set_isRing(true);//是否响铃
            $template->set_isVibrate(true);//是否震动
            $template->set_isClearable(true);//通知栏是否可清除


            $message = new IGtListMessage();
            $message->set_isOffline(true);//是否离线
            $message->set_offlineExpireTime(3600*12*1000);//离线时间
            $message->set_data($template);//设置推送消息类型
            $message->set_PushNetWorkType(1);//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送
            $contentId = $igt->getContentId($message);
            //接收方1
            foreach($cids as $val){
                $target1 = new IGtTarget();
                $target1->set_appId(APPID);
                $target1->set_clientId($val);
                $targetList[] = $target1;
            }
            $ret = $igt->pushMessageToList($contentId, $targetList);
        }
    }
    return $ret;
}
/***
 * 个推 给客户端推送消息
 */
function  pushMessageToClient($iosUsers,$androidUsers,$title,$content,$result){
    //ios
    $tokens=array();
    if(count($iosUsers)){
        foreach ($iosUsers as $k=>$v){
            if($v->token){
                $tokens[]=$v->token;
            }
        }
        @pushMessage($tokens,array('title'=>$title,
                                   'content'=>$content,
                                   'result'=>$result),
            'ios','');
    }
    //android

    $client_id=array();
    if(count($androidUsers)){
        foreach ($androidUsers as $k=>$v){
            if($v->client_id){
                $client_id[]=$v->client_id;
            }
        }
        @pushMessage($client_id,array('title'=>$title,
                                      'content'=>$content,
                                      'result'=>$result),
            'android','');
    }
}

/**
 *
 * @param 称呼 name
 * @param 主题 title
 * @param 收件人 email
 * @param 邮箱内容 content
 * @param unknown_type $name
 */
function sendEmail($name, $title, $email, $content,$is_send_mail=0) {
    include_once 'Email.php';
    $set = Setting::cache();
    if((isset($set['is_send_mail']['value']) && $set['is_send_mail']['value']) || $is_send_mail){
        $config = array(
            'host' => 'mail.tyrbl.com',
            'port' => 25,
            'user' => 'noreply@tyrbl.com',
            'pass' => 'gzlit123'
        );
        $res = @Helper_Email::send_mails($name, $email, $title, $content, $config, '无界投融', '', '', 1);
        return $res;
    }
    return 0;
}

/**
 * 通过逗号将一串字符串转化成数组
 */
function explodeByComma($str){

}

?>