<?php
/*
 	template name: 生活记录
 	description: template for yusi123.com Yusi theme
*/


global $wddb;

$result = $wpdb->get_results("SELECT id,content,addtime FROM wp_weibo where status=1  ORDER BY addtime DESC LIMIT 0 , 20");

#这里要过滤一下手机号码，不能全部显示。


foreach ($result as $post) {

//    #如果是受骗的信息，则需要隐藏手机号码
//    echo $post->content;
//    die();

    if(stripos($post->content,"号码")){

       $head = mb_substr( $post->content, 0, -8 );


       $end = mb_substr( $post->content, -4 );
//        echo $head;
//        echo $end;
//        die();

       $post->content = $head.'****'.$end;


    }


    $post->addtime = date("Y-m-d H:i:s", $post->addtime);
}




?>
    <html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>生活记录</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">

        <h4>吴文付的生活随笔 <small>一个热爱生活的码农</small></h4>
        <a class="btn btn-success" style="float: right;margin-bottom: 10px;" href="http://wuwenfu.cn">回到站点</a>
        <div style="clear: both;"></div>


        <?php
        foreach($result as $item ){
            ?>


            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $item->addtime;?></div>
                <div class="panel-body">
                    <?php echo $item->content;?>

                </div>
            </div>

            <?php
            }
        ?>





    </div>




    </body>
    </html>