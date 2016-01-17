<?php


/*
    template name: 抢红包
    description: template for yusi123.com Yusi theme
*/


/**
 * Created by JetBrains PhpStorm.
 * User: 吴文付
 * Date: 15-11-24
 * Time: 下午8:33
 * description:
 */
///////////////////////////////////////////////////////////////////
//                            _ooOoo_                             //
//                           o8888888o                            //
//                           88" . "88                            //
//                           (| ^_^ |)                            //
//                           O\  =  /O                            //
//                        ____/`---'\____                         //
//                      .'  \\|     |//  `.                       //
//                     /  \\|||  :  |||//  \                      //
//                    /  _||||| -:- |||||-  \                     //
//                    |   | \\\  -  /// |   |                     //
//                    | \_|  ''\---/''  |   |                     //
//                    \  .-\__  `-`  ___/-. /                     //
//                  ___`. .'  /--.--\  `. . ___                   //
//                ."" '<  `.___\_<|>_/___.'  >'"".                //
//              | | :  `- \`.;`\ _ /`;.`/ - ` : | |               //
//              \  \ `-.   \_ __\ /__ _/   .-` /  /               //
//        ========`-.____`-.___\_____/___.-`____.-'========       //
//                             `=---='                            //
//        ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^      //
//         佛祖保佑       永无BUG        永不修改                    //
////////////////////////////////////////////////////////////////////

//判断是否为手机，是手机才可以打开。

function wwf_isMobile()
{
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
    {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
    {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT']))
    {
        $clientkeywords = array ('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
        {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT']))
    {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
        {
            return true;
        }
    }
    return false;
}

if(!wwf_isMobile()){
    die("不好意思，只能手机端访问");
}

header("Cache-Control: no-cache");
?>



<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>韩雅红包群（20）</title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/starred/main.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="0">

    <script src="<?php bloginfo('template_url'); ?>/starred/t.js" async="" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/starred/hm.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/setviewport.js"></script>
    <meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/preloadjs-0.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/jquery-2.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/soundjs-0.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/TweenMax.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/jweixin-1.js"></script>
    <!--<script type="text/javascript" src="js/getnickname.js"></script>-->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/didi.js"></script>
    <script type="text/javascript">
        //			var _hmt=_hmt || [];
        //			(function(){
        //				var hm = document.createElement("script");
        //				hm.src = "//hm.baidu.com/hm.js?c9a738fe0356938c9a4e6d8f98763798";
        //				var s = document.getElementsByTagName("script")[0];
        //				s.parentNode.insertBefore(hm,s);
        //			})();
    </script>

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/weixin.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/wx.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/starred/main.js"></script>
</head>

<body>

<div style="" class="main hide" style="display: block;">
    <div class="page" id="page" style="display: block;">
        <!--<div class="enterpage"></div>-->
        <div style="" class="longpage hide" style="display: block;">
            <div style="" class="groupinfo radioBox">
                <div class="cont" style="color:white;">王雷 傲亚邀请你加入了“亿万富豪红包群”群聊，群聊参与人还有：马化腾 腾讯、王雷 傲亚、王正标 韩雅 金亨烈 韩雅、柳传志 联想、刘强东 京东……</div>
            </div>

            <div id="msg1" class="massge hide" style="height: 153px;  ">
                <div class="headimg"><img src="<?php bloginfo('template_url'); ?>/starred/ntx1.jpg"></div>
                <div class="mname">王雷 傲亚</div>
                <div class="mcontent">
                    <div class="mcla radioBox">刚才群里有人发了个大红包啊，我也来凑个热闹。</div>
                    <div class="jb"><img src="<?php bloginfo('template_url'); ?>/starred/pdj.png"></div>
                </div>
            </div>

            <div id="msg2" class="massge hide" style="height: 120px;  ">
                <div class="headimg"><img src="<?php bloginfo('template_url'); ?>/starred/ntx1.jpg"></div>
                <div class="mname">王雷 傲亚</div>
                <div class="mcontent">
                    <div class="mcla radioBox">我看看我微信支付还有多少钱哈~</div>
                    <div class="jb"><img src="<?php bloginfo('template_url'); ?>/starred/pdj.png"></div>
                </div>
            </div>

            <div id="msg3" class="massge hide" style="height: 233px;  ">
                <div class="headimg"><img src="<?php bloginfo('template_url'); ?>/starred/ntx1.jpg"></div>
                <div class="mname">王雷 傲亚</div>
                <div class="redpick" id="redpick1">
                    <img src="<?php bloginfo('template_url'); ?>/starred/redpick.png">
                </div>
                <img  class="circle" src="<?php bloginfo('template_url'); ?>/starred/circle.png">
                <img  class="hand" src="<?php bloginfo('template_url'); ?>/starred/hand.png">
            </div>

            <div id="msg4" class="massge hide" style="height: 184px;  ">
                <div class="headimg"><img src="<?php bloginfo('template_url'); ?>/starred/tx3.jpg"></div>
                <div class="mname">王正标 韩雅</div>
                <div class="mcontent">
                    <div><img src="<?php bloginfo('template_url'); ?>/starred/nbq5.jpg"></div>
                </div>
            </div>

            <div id="msg5" class="massge hide" style="height: 120px;  ">
                <div class="headimg"><img src="<?php bloginfo('template_url'); ?>/starred/tx3.jpg"></div>
                <div class="mname">王正标 韩雅</div>
                <div class="mcontent">
                    <div class="mcla radioBox" style="width: 243px!important;">嘿嘿，又是我抢了<img src="<?php bloginfo('template_url'); ?>/starred/bq1.png" style="position: absolute;margin: 0 0 0 11px;width: 34px;"><img src="<?php bloginfo('template_url'); ?>/starred/bq1.png" style="position: absolute;margin: 0 0 0 11px;width: 34px;"><img src="<?php bloginfo('template_url'); ?>/starred/bq1.png" style="position: absolute;margin: 0 0 0 11px;width: 34px;"></div>
                    <div class="jb"><img src="<?php bloginfo('template_url'); ?>/starred/pdj.png"></div>
                </div>
            </div>

            <div id="msg6" class="massge hide" style="height: 160px;  ">
                <div class="headimg"><img src="<?php bloginfo('template_url'); ?>/starred/tx7.jpg"></div>
                <div class="mname">金亨烈 韩雅</div>
                <div class="mcontent">
                    <div class="mcla radioBox">小王啊，你就不能好好开会么！<img src="<?php bloginfo('template_url'); ?>/starred/nbq2.png" style="margin: 0 0 0 10px;width: 34px;">看见钱就抢，手挺快啊。</div>
                    <div class="jb"><img src="<?php bloginfo('template_url'); ?>/starred/pdj.png"></div>
                </div>
            </div>

            <div id="msg7" class="massge hide" style="height: 136px;  ">
                <div class="headimg"><img src="<?php bloginfo('template_url'); ?>/starred/tx3.jpg"></div>
                <div class="mname">王正标 韩雅</div>
                <div class="mcontent">
                    <div class="mcla radioBox" id="sanlianfa"><img src="<?php bloginfo('template_url'); ?>/starred/nbq3.png"><img src="<?php bloginfo('template_url'); ?>/starred/nbq3.png"><img src="<?php bloginfo('template_url'); ?>/starred/nbq3.png"></div>
                    <div class="jb"><img src="<?php bloginfo('template_url'); ?>/starred/pdj.png"></div>
                </div>
            </div>

            <div id="msg8" class="massge hide" style="height: 168px;  ">
                <div class="headimg"><img src="<?php bloginfo('template_url'); ?>/starred/tx3.jpg"></div>
                <div class="mname">王正标 韩雅</div>
                <div class="mcontent">
                    <div class="mcla radioBox">错了，错了，这就把抢到的红包发出来，好好开会<img class="msgimg" src="<?php bloginfo('template_url'); ?>/starred/nbq4.png"></div>
                    <div class="jb"><img src="<?php bloginfo('template_url'); ?>/starred/pdj.png"></div>
                </div>
            </div>

            <div id="msg9" class="massge hide" style="height: 220px;  ">
                <div class="headimg"><img src="<?php bloginfo('template_url'); ?>/starred/tx3.jpg"></div>
                <div class="mname">王正标 韩雅</div>
                <div class="redpick" id="redpick2">
                    <img src="<?php bloginfo('template_url'); ?>/starred/redpick.png">
                </div>
                <img class="circle" src="<?php bloginfo('template_url'); ?>/starred/circle.png">
                <img class="hand" src="<?php bloginfo('template_url'); ?>/starred/hand.png">
            </div>

            <div class="di"><img src="<?php bloginfo('template_url'); ?>/starred/di.jpg"></div>

        </div>
    </div>

    <div style="display: none;" id="hongbao" class="hongbao hide">
        <img style="display: none; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);" id="hb1" class="hide" src="<?php bloginfo('template_url'); ?>/starred/hb1.jpg">
        <img id="hb2" class="hide" src="<?php bloginfo('template_url'); ?>/starred/hb2.jpg">
        <img style="display: none;" id="hb1Open" class="hide" src="<?php bloginfo('template_url'); ?>/starred/hb1_open.jpg">
        <div id="btn1"></div>
        <div id="btn2"></div>
        <div style="" id="btn3" class="hide"></div>

    </div>

    <!--<div  id="hbnull" class="hbnull hide">
                 <img  id="null1" class="hide" src="<?php bloginfo('template_url'); ?>/starred/hb1_null.jpg">
                 <div id="btn4" class="hide"></div>
                 <div id="btn5" class="hide"></div>-->
    <div class="hbnull hide" id="hbnull">
        <img src="<?php bloginfo('template_url'); ?>/starred/hb1_null.jpg" class="hide" id="null1" style="display: inline;">
        <div class="hide" id="btn4"></div>
        <div class="hide" id="btn5"></div>
        <img src="<?php bloginfo('template_url'); ?>/starred/circle.png" class="circle hide" style="display: inline;">
        <img src="<?php bloginfo('template_url'); ?>/starred/hand.png" class="hand hide" style="display: inline;">
    </div>

</div>

</div>
<script type="text/javascript">
    _mwx=window._mwx||{};
    _mwx.siteId=8000292;
    //_mwx.openId=xxxxxxxxxxx; //OpenID为微信提供的用户唯一标识,需要开发者传入，如果没有OpenID，去掉该代码即可。
    _mwx.debug=true;//代码调试阶段，加入此代码，正式上线之后去掉该代码
</script>
<div style="display:none">
    <script src="<?php bloginfo('template_url'); ?>/starred/z_stat.php" language="JavaScript"></script>
</div>

</body>

</html>
