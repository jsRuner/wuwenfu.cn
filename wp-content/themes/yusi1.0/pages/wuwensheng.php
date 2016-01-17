<?php

/*
    template name: 庆祝侄女出生
    description: template for yusi123.com Yusi theme
*/


/**
 * Created by JetBrains PhpStorm.
 * User: 吴文付
 * Date: 15-11-19
 * Time: 下午3:16
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="热烈庆祝大哥吴文胜喜得千金">
<meta name="description" content="热烈庆祝大哥吴文胜喜得千金热烈庆祝大哥吴文胜喜得千金热烈庆祝大哥吴文胜喜得千金热烈庆祝大哥吴文胜喜得千金 ">
<title>热烈庆祝大哥吴文胜喜得千金</title>

<link href="<?php bloginfo('template_url'); ?>/wuwensheng/style.css" rel="stylesheet" type="text/css">

<style type="text/css">
    .qz{
        margin: 0;
        text-align: center;
        font: bold 100px/1 "Helvetica Neue", Helvetica, Arial, sans-serif;
        color: #fff;
        text-shadow: 0 1px 0 #cccccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbbbbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaaaaa, 0 6px 1px rgba(0, 0, 0, 0.1), 0 0 5px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.3), 0 3px 5px rgba(0, 0, 0, 0.2), 0 5px 10px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.2), 0 20px 20px rgba(0, 0, 0, 0.15);
        -webkit-transition: .2s all linear;
    }
</style>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/wuwensheng/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/wuwensheng/js/awardRotate.js"></script>

<script type="text/javascript">
    var turnplate={
        restaraunts:[],				//大转盘奖品名称
        colors:[],					//大转盘奖品区块对应背景颜色
        outsideRadius:192,			//大转盘外圆的半径
        textRadius:155,				//大转盘奖品位置距离圆心的距离
        insideRadius:68,			//大转盘内圆的半径
        startAngle:0,				//开始角度

        bRotate:false				//false:停止;ture:旋转
    };

    $(document).ready(function(){
        //动态添加大转盘的奖品与奖品区域背景颜色
        turnplate.restaraunts = ["50M免费流量包", "10元红包", "谢谢参与", "5元红包", "10M免费流量包", "20M免费流量包", "20元红包 ", "30M免费流量包", "100M免费流量包", "2元红包"];
        turnplate.colors = ["#FFF4D6", "#FFFFFF", "#FFF4D6", "#FFFFFF","#FFF4D6", "#FFFFFF", "#FFF4D6", "#FFFFFF","#FFF4D6", "#FFFFFF"];


        var rotateTimeOut = function (){
            $('#wheelcanvas').rotate({
                angle:0,
                animateTo:2160,
                duration:8000,
                callback:function (){
                    alert('网络超时，请检查您的网络设置！');
                }
            });
        };

        //旋转转盘 item:奖品位置; txt：提示语;
        var rotateFn = function (item, txt){
            var angles = item * (360 / turnplate.restaraunts.length) - (360 / (turnplate.restaraunts.length*2));
            if(angles<270){
                angles = 270 - angles;
            }else{
                angles = 360 - angles + 270;
            }
            $('#wheelcanvas').stopRotate();
            $('#wheelcanvas').rotate({
                angle:0,
                animateTo:angles+1800,
                duration:8000,
                callback:function (){
                    if(txt=="谢谢参与"){
                        alert('你运气太差了！分享到空间，攒点人品吧')
                    }else{

                        alert('恭喜你，你获得了'+txt+"快去联系吴文胜领奖");
                    }
//                    alert('恭喜你，你获得了给吴文胜'+txt+'的机会!快去行动吧.');
                    turnplate.bRotate = !turnplate.bRotate;
                }
            });
        };
        function getCookie(name) {
            var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");

            if (arr = document.cookie.match(reg))

                return unescape(arr[2]);
            else
                return null;
        }
        function setCookie(name, value) {
            var Days = 30;
            var exp = new Date();
            exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
            document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
        }

        $('.pointer').click(function (){

            if(getCookie('ischou')==1){
                alert('你已经没有抽奖的机会了');
                return false;
            }



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

                setCookie('ischou',1);
            }else{
                return false;
            }

            if(turnplate.bRotate)return;
            turnplate.bRotate = !turnplate.bRotate;
            //获取随机数(奖品个数范围内)
            var item = rnd(1,turnplate.restaraunts.length);

            //降低中奖概率。先随机产生一个数字。如果数字为50才可以中奖。
            var  zz = rnd(1,100);
            if(zz != 50){
                item = 3;
            }



            //奖品数量等于10,指针落在对应奖品区域的中心角度[252, 216, 180, 144, 108, 72, 36, 360, 324, 288]
            rotateFn(item, turnplate.restaraunts[item-1]);
            /* switch (item) {
               case 1:
                   rotateFn(252, turnplate.restaraunts[0]);
                   break;
               case 2:
                   rotateFn(216, turnplate.restaraunts[1]);
                   break;
               case 3:
                   rotateFn(180, turnplate.restaraunts[2]);
                   break;
               case 4:
                   rotateFn(144, turnplate.restaraunts[3]);
                   break;
               case 5:
                   rotateFn(108, turnplate.restaraunts[4]);
                   break;
               case 6:
                   rotateFn(72, turnplate.restaraunts[5]);
                   break;
               case 7:
                   rotateFn(36, turnplate.restaraunts[6]);
                   break;
               case 8:
                   rotateFn(360, turnplate.restaraunts[7]);
                   break;
               case 9:
                   rotateFn(324, turnplate.restaraunts[8]);
                   break;
               case 10:
                   rotateFn(288, turnplate.restaraunts[9]);
                   break;
           } */
            console.log(item);
        });
    });

    function rnd(n, m){
        var random = Math.floor(Math.random()*(m-n+1)+n);
        return random;

    }


    //页面所有元素加载完毕后执行drawRouletteWheel()方法对转盘进行渲染
    window.onload=function(){
        drawRouletteWheel();
    };

    function drawRouletteWheel() {
        var canvas = document.getElementById("wheelcanvas");
        if (canvas.getContext) {
            //根据奖品个数计算圆周角度
            var arc = Math.PI / (turnplate.restaraunts.length/2);
            var ctx = canvas.getContext("2d");
            //在给定矩形内清空一个矩形
            ctx.clearRect(0,0,422,422);
            //strokeStyle 属性设置或返回用于笔触的颜色、渐变或模式
            ctx.strokeStyle = "#FFBE04";
            //font 属性设置或返回画布上文本内容的当前字体属性
            ctx.font = '16px Microsoft YaHei';
            for(var i = 0; i < turnplate.restaraunts.length; i++) {
                var angle = turnplate.startAngle + i * arc;
                ctx.fillStyle = turnplate.colors[i];
                ctx.beginPath();
                //arc(x,y,r,起始角,结束角,绘制方向) 方法创建弧/曲线（用于创建圆或部分圆）
                ctx.arc(211, 211, turnplate.outsideRadius, angle, angle + arc, false);
                ctx.arc(211, 211, turnplate.insideRadius, angle + arc, angle, true);
                ctx.stroke();
                ctx.fill();
                //锁画布(为了保存之前的画布状态)
                ctx.save();

                //----绘制奖品开始----
                ctx.fillStyle = "#E5302F";
                var text = turnplate.restaraunts[i];
                var line_height = 17;
                //translate方法重新映射画布上的 (0,0) 位置
                ctx.translate(211 + Math.cos(angle + arc / 2) * turnplate.textRadius, 211 + Math.sin(angle + arc / 2) * turnplate.textRadius);

                //rotate方法旋转当前的绘图
                ctx.rotate(angle + arc / 2 + Math.PI / 2);

                /** 下面代码根据奖品类型、奖品名称长度渲染不同效果，如字体、颜色、图片效果。(具体根据实际情况改变) **/
                if(text.indexOf("M")>0){//流量包
                    var texts = text.split("M");
                    for(var j = 0; j<texts.length; j++){
                        ctx.font = j == 0?'bold 20px Microsoft YaHei':'16px Microsoft YaHei';
                        if(j == 0){
                            ctx.fillText(texts[j]+"M", -ctx.measureText(texts[j]+"M").width / 2, j * line_height);
                        }else{
                            ctx.fillText(texts[j], -ctx.measureText(texts[j]).width / 2, j * line_height);
                        }
                    }
                }else if(text.indexOf("M") == -1 && text.length>6){//奖品名称长度超过一定范围
                    text = text.substring(0,6)+"||"+text.substring(6);
                    var texts = text.split("||");
                    for(var j = 0; j<texts.length; j++){
                        ctx.fillText(texts[j], -ctx.measureText(texts[j]).width / 2, j * line_height);
                    }
                }else{
                    //在画布上绘制填色的文本。文本的默认颜色是黑色
                    //measureText()方法返回包含一个对象，该对象包含以像素计的指定字体宽度
                    ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
                }

                //添加对应图标
                if(text.indexOf("红包")>0){
                    var img= document.getElementById("shan-img");
                    img.onload=function(){
                        ctx.drawImage(img,-15,10);
                    };
                    ctx.drawImage(img,-15,10);
                }else if(text.indexOf("谢谢参与")>=0){
                    var img= document.getElementById("sorry-img");
                    img.onload=function(){
                        ctx.drawImage(img,-15,10);
                    };
                    ctx.drawImage(img,-15,10);
                }
                //把当前画布返回（调整）到上一个save()状态之前
                ctx.restore();
                //----绘制奖品结束----
            }
        }
    }

</script>
</head>
<body style="background:#e62d2d;overflow-x:hidden;">
<p style="display: none;">2015年11月19日集团董事长 吴文胜喜得千金，为庆祝特举行抽奖活动</p>
<img style="display: none;" src="<?php bloginfo('template_url'); ?>/wuwensheng/images/hongbao.png" alt="">

<!-- <span style="color:#95A5A6;font-family: impact;text-shadow:0px 1px 0px #95A5A6,0px 2px 0px #95A5A6,0px 3px 0px #95A5A6,0px 4px 0px #95A5A6, 0px 5px 0px  #95A5A6,0px 6px 0px #95A5A6, 0px 7px 0px #95A5A6,0px 8px 7px #95A5A6">吴</span> -->

<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
    <p class="qz">热烈庆祝吴文胜喜得千金</p>

</div>



<img src="<?php bloginfo('template_url'); ?>/wuwensheng/images/1.png" id="shan-img" style="display:none;" />
<img src="<?php bloginfo('template_url'); ?>/wuwensheng/images/2.png" id="sorry-img" style="display:none;" />
<div class="banner">
    <div class="turnplate" style="background-image:url(<?php bloginfo('template_url'); ?>/wuwensheng/images/turnplate-bg.png);background-size:100% 100%;">
        <canvas class="item" id="wheelcanvas" width="422px" height="422px"></canvas>
        <img style="z-index:111111111111111111111;" class="pointer" src="<?php bloginfo('template_url'); ?>/wuwensheng/images/turnplate-pointer.png"/>
    </div>
</div>

<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
    <!-- <p>适用浏览器：360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. 不支持IE8及以下浏览器。</p> -->
    <p>活动举办者：<a href="http://wuwenfu.cn/" target="_blank">吴氏集团有限公司</a></p>
</div>
</body>
</html>