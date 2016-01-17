<?php


/*
    template name: 吴文付人生历程
    description: template for yusi123.com Yusi theme
*/

/**
 * Created by JetBrains PhpStorm.
 * User: 吴文付
 * Date: 15-11-23
 * Time: 下午9:35
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
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>吴文付的历程</title>
    <link rel="shortcut icon" type="image/x-icon" href="http://fineui.com/version/favicon.ico">

    <link href="<?php bloginfo('template_url'); ?>/timeline/bootstrap.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/timeline/bootstrap-responsive.css" rel="stylesheet">

    <link href="<?php bloginfo('template_url'); ?>/timeline/docs.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php bloginfo('template_url'); ?>/timeline/html5.js"></script>
    <![endif]-->
    <style>
        body.from-demo {
            padding-top: 0;
            background-image: url(<?php bloginfo('template_url'); ?>/timeline/square.gif);
        }
        body.from-demo .navbar {
            display: none;
        }
        body.from-demo .subhead {
            display: none;
        }
        body.from-demo .footer {
            display: none;
        }
        body.from-demo ul.timeline {
            margin-top: 20px;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">

<div style="text-align:center;font-size:1.2em;margin-top:20px;">
    <a href="#" target="_self">编程之路</a>
</div>
<div class="container">
<a class="btn btn-success" style="float: right;margin-bottom: 10px;" href="http://wuwenfu.cn">回到站点</a>
<div style="clear: both;"></div>

<style>
    ul.timeline {
        list-style-type: none;
        background: url("<?php bloginfo('template_url'); ?>/timeline/version_line.png") repeat-y scroll 120px 0 transparent;
        margin: 50px 0;
        padding: 0;
    }

    ul.timeline li {
        position: relative;
        margin-bottom: 20px;
    }
    ul.timeline li .time {
        position: absolute;
        width: 90px;
        text-align: right;
        left: 0;
        top: 10px;
        color: #999;
    }
    ul.timeline li .version {
        position: absolute;
        width: 290px;
        text-align: right;
        left: -200px;
        top: 30px;
        font-size: 40px;
        line-height: 50px;
        color: #3594cb;
        overflow: hidden;
    }
    ul.timeline li .number {
        position: absolute;
        background: url("<?php bloginfo('template_url'); ?>/timeline/version_dot.png") no-repeat scroll 0 0 transparent;
        width: 56px;
        height: 56px;
        left: 97px;
        line-height: 56px;
        text-align: center;
        color: #fff;
        font-size: 18px;
    }
    ul.timeline li.alt .number {
        background-image: url("<?php bloginfo('template_url'); ?>/timeline/version_dot_alt.png");
    }
    ul.timeline li .content {
        margin-left: 180px;

    }
    ul.timeline li .content pre {
        background-color: #3594cb;
        padding: 20px;
        color: #fff;
        font-size: 13px;
        line-height: 20px;
    }
    ul.timeline li.alt .content pre {
        background-color: #43B1F1;
    }
</style>

<ul class="timeline">
<li>
    <div class="time">2015-11-23</div>
<!--    <div class="version">写个时间轴</div>-->
    <div class="number">10</div>
    <div class="content"><pre>-晚上写个时间轴
        -今天公司搬家。803到910


</pre></div>
</li>
<li class="alt">
    <div class="time">2015-11-22</div>
<!--    <div class="version">v4.2.1</div>-->
    <div class="number">9</div>
    <div class="content"><pre>+周末写了博客的app。


</pre></div>
</li>
<!--<li>
    <div class="time">2015-05-19</div>
    <div class="version">v4.2.0</div>
    <div class="number">123</div>
    <div class="content"><pre>-增加示例：其他控件-&gt;面板与窗体-&gt;同时打开多个窗体。
-增加示例：第三方组件-&gt;jQueryUI Autocomplete-&gt;内联数据（位于Window控件中）。
-增加示例：其他控件-&gt;工具栏与菜单-&gt;工具栏上的图片（固定宽度）；工具栏上的图片（动态调整）。
-修正删除不存在的选项卡时可能出现的错误（揣兜-7085）。
+表格增强。
	-增加示例：行与列样式-&gt;行样式（数据库分页）；行样式（内存分页）；列样式。
	-增加示例：序号列-&gt;序号列（靠左显示）（dennisliu）。

</pre></div>
</li>
<li class="alt">
    <div class="time">2015-02-03</div>
    <div class="version">v4.1.6</div>
    <div class="number">122</div>
    <div class="content"><pre>-增加示例：表格控件-&gt;导出与下载-&gt;导出文件（FindControl，查找模板列中控件）。
-增加示例：表格控件-&gt;导出与下载-&gt;导出文件（多表头）。
-修正下拉列表数据绑定后在第一个位置插入项，而最终选中的非第一项的问题。
-修正下拉列表在没有数据项时，可能会触发SelectedIndexChanged事件的问题。

</pre></div>
</li>
<li>
    <div class="time">2014-11-14</div>
    <div class="version">v4.1.5</div>
    <div class="number">121</div>
    <div class="content"><pre>+F.util.addMainTab函数在指定refreshWhenExist参数时也要更新标题（舞柯庶）。
	-更新示例：杂项-&gt;向父页面添加选项卡。
-页面回发时如果脚本出错，不再弹出出错对话框，有助于快速定位错误。
-新增示例：表格控件-&gt;单元格编辑-&gt;行扩展列与单元格编辑/行扩展列与新增删除行。
-新增示例：导航控件-&gt;面板与窗体-&gt;窗体与表单。
-修正下拉列表（可编辑、不强制选择）清空内容后，后台依然可以获取SelectedItem的问题。

</pre></div>
</li>
<li class="alt">
    <div class="time">2014-09-22</div>
    <div class="version">v4.1.4</div>
    <div class="number">120</div>
    <div class="content"><pre>-修正TriggerBox先禁用再启用后不能触发TriggerClick事件的问题（飘移-2870）。
+下拉列表增加MatchFieldWidth属性，可设置弹出框和字段宽度不同。
	-增加示例：表单控件-&gt;下拉列表控件-&gt;下拉列表（MatchFieldWidth）。
-废除Region的Split和Position，请使用RegionSplit和RegionPosition属性。
-增加页面底部区域，显示版本和版权信息。
-修正表格在RecordCount=0时获取PageIndex出错的问题（userlm-6302）。
-修正表格AllowPaging=true，并且数据源为空出错的问题（tlxyniu、hroger-6289）。
-修正在母版页内容中放置Window控件，在页面回发时出错的问题。
-增加示例：表格控件-&gt;扩展列-&gt;全选列（单选）。
+Tree增加PreNodeDataBound事件。
	-增加类TreePreNodeEventArgs，其Cancelled属性用来取消添加当前树节点。
	-GridPreRowEventArgs增加Cancelled属性，作用同上。
	-官网主框架增加[仅显示最新示例]菜单项。
	-增加示例：表格控件-&gt;事件-&gt;行预绑定事件（Cancelled属性）。
+修正通过服务器端脚本关闭当前标签页可能出现的JS错误。
	-在IE11出现错误[无法获取未定义或 null 引用的属性 callback]。
	-更新示例：杂项-&gt;向父页面添加选项卡。
</pre></div>
</li>

<li>
    <div class="time">2014-05-11</div>
    <div class="version">v4.0.6</div>
    <div class="number">115</div>
    <div class="content"><pre>-修正下拉列表禁用时提交数据错误的问题（惘思）。
+修正顶部菜单框架（右侧选项卡）在多次点击头部菜单后，出现“不能执行已释放 Script 的代码”的错误（failist）。
	-IE的问题：外部页面使用已关闭IFrame页面的数据（或回调）时发生。
	-修正方法是将initTreeTabStrip的调用放在父页面，如此以来mainTabStrip的回调存在于父页面，而非已关闭IFrame。
-使用google-code-prettify对示例源代码进行着色。
-添加到页面上的主题样式类由theme-neptune改名为f-theme-neptune。
+树控件增强。
	-TreeNode的AutoPostBack改名为EnableCheckEvent，EnablePostBack改名为EnableClickEvent。
	-NodeExpand事件改名为NodeLazyLoad，TreeExpandEventArgs改名为TreeNodeEventArgs。
	-TreeNode增加属性EnableExpandEvent和EnableCollapseEvent，Tree增加事件NodeExpand和NodeCollapse。
	-增加示例tree/tree_expand.aspx，更新示例tree/tree_ajax.aspx。
-支持Server.Transfer，需要设置EnableAjax=false（chwentao）。
-修正TriggerBox的TriggerIcon无效的问题。
+增加FineUI与My97DatePicker整合的示例（aspnet/my97.aspx）。
	-自定义皮肤neptune，以便和FineUIv4.x的Neptune主题兼容。
-修正UserControlConnector无效的问题。
+为面板Panel、Tab、Region、GroupPanel、AccordionPane、Window增加Content属性。
	-可以在一定程度上避免使用ContentPanel，从而减少页面层次结构，加快页面渲染速度。
	-更新示例window/window.aspx、default.aspx。
+为FileUpload控件增加AcceptFileTypes属性，控制默认显示的文件类型（六月寒）。
	-更新示例form/fileupload_toolbar.aspx。
+表格中模板列的CSS类名由x-grid-tpl更改为f-grid-tpl。
+为Component增加Margin属性。
	-删除Region上的Margins属性，请使用新增的Margin属性。
	-删除BoxComponent上的BoxMargin属性，请使用新增的Margin属性。
+Layout枚举值Border改名为Region，为BoxComponent增加RegionPosition和RegionSplit两个属性。
	-普通的面板也支持Region布局，可以在一定程度上减少页面上的层次结构。
	-更新示例iframe/topmenu4/default.aspx。
-为Web.config和PageManager增加IEEdge属性（在IE浏览器中使用最新的渲染模式），默认为true（⑥阿太⑥）。
-新增三列面板示例layout/column.aspx（binbin）。
-修正Alert对话框与ActiveWindow.GetHidePostBackReference冲突的问题（wlj928449657）。
</pre></div>
</li>
<li class="alt">
    <div class="time">2014-03-03</div>
    <div class="version">v4.0.5</div>
    <div class="number">114</div>
    <div class="content"><pre>-修正表格在AJAX更新时加载慢的问题。
-修正表格在分页和排序同时存在，分页时会发送两次AJAX请求的问题（Gunu40）。
-修正表格在特殊情况下出现getEditor未定义的错误（yygy）。

</pre></div>
</li>-->



</ul>

<div style="margin-left:180px;">
    <!--<button id="fetchNextData" class="btn btn-large btn-info" style="width:100%;">后二十条数据</button>-->
</div>
<br>
<br>
</div>

<script src="<?php bloginfo('template_url'); ?>/timeline/jquery-1.11.0.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/timeline/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/timeline/main.js"></script>

<script>
    $(function() {

        var urlSearch = window.location.search;
        if(urlSearch && urlSearch.indexOf('from=demo') >= 0 ) {
            $(document.body).addClass('from-demo');
        }

        var nextDataNumber = 5;
        var ajaxLoading = false;


        var ulNode = $('ul.timeline');

        function initLiNodes() {
            var liNodes = ulNode.find('li'), count = liNodes.length, i, liNode, leftCount = nextDataNumber * 20;
            for(i=0; i<count; i++) {
                liNode = $(liNodes.get(i));
                if(i % 2 !== 0) {
                    liNode.addClass('alt');
                } else {
                    liNode.removeClass('alt');
                }
//                liNode.find('.number').text(leftCount + count - i);
            }
        }


        $('#fetchNextData').click(function() {
            var $this = $(this);
            $this.addClass('disabled').text('正在加载后二十条数据...');
            ajaxLoading = true;

            $.get('./version_data_' + nextDataNumber +'.txt', function(data) {
                ajaxLoading = false;
                ulNode.append(data);
                $this.removeClass('disabled').text('后二十条数据');
                nextDataNumber--;

                if(nextDataNumber === 0) {
                    $this.hide();
                }

                initLiNodes();
            });

        });

        initLiNodes();

        /*
                  $(window).scroll(function() {

                      if($(document).height() - $(window).height() - $(document).scrollTop() < 10) {
                          if(!ajaxLoading) {
                              $('#fetchNextData').click();
                          }
                      }

                  });
                  */

    });
</script>

</body>

</html>

