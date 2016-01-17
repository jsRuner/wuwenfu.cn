<?php

/*
    template name: 虚假送流量的分享页面。
    description: template for yusi123.com Yusi theme
*/

/**
 * Created by JetBrains PhpStorm.
 * User: 吴文付
 * Date: 15-11-8
 * Time: 上午9:57
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
?>


<script type="text/javascript">
    (function(){
        var p = {
            url:location.href,
            showcount:'0',/*是否显示分享总数,显示：'1'，不显示：'0' */
            desc:'这个是真的，领取半个小时手机就收到了流量到账的短信，大家速度！',/*默认分享理由(可选)*/
            summary:'快来呀，助力双十一，1000M 手机流量免费领取，抢免费流量...',/*分享摘要(可选)*/
            title:'快来呀，助力双十一，1000M 手机流量免费领取，抢免费流量...',/*分享标题(可选)*/
            site:'淘宝双十一',/*分享来源 如：腾讯网(可选)*/
            pics:'https://img.alicdn.com/imgextra/i2/718111469/TB29V_dgFXXXXajXXXXXXXXXXXX-718111469.jpg', /*分享图片的路径(可选)*/
            style:'101',
            width:199,
            height:30
        };
        var s = [];
        for(var i in p){
            s.push(i + '=' + encodeURIComponent(p[i]||''));
        }
        document.write(['<a version="1.0" class="qzOpenerDiv" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?',s.join('&'),'" target="_blank">分享</a>'].join(''));
    })();
</script>
<script src="http://qzonestyle.gtimg.cn/qzone/app/qzlike/qzopensl.js#jsdate=20111201" charset="utf-8"></script>

