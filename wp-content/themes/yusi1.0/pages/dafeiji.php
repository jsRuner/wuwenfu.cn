<?php

/*
    template name: 打飞机
    description: template for yusi123.com Yusi theme
*/


/**
 * Created by JetBrains PhpStorm.
 * User: 吴文付
 * Date: 15-11-26
 * Time: 上午10:19
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>微信打飞机</title>
    <meta http-equiv="content" content="text/html" charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/dafeiji/css/main.css"/>
</head>

<body>
<div id="contentdiv">
    <div id="startdiv">
        <button onclick="begin()">开始游戏</button>
    </div>
    <div id="maindiv">
        <div id="scorediv">
            <label>分数：</label>
            <label id="label">0</label>
        </div>
        <div id="suspenddiv">
            <button>继续</button><br/>
            <button>重新开始</button><br/>
            <button>回到主页</button>
        </div>
        <div id="enddiv">
            <p class="plantext">飞机大战分数</p>
            <p id="planscore">0</p>
            <div><button onclick="jixu()">继续</button></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/dafeiji/js/main.js"></script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div style="text-align:center;font:normal 14px/24px 'MicroSoft YaHei';">
</div>
</body>
</html>