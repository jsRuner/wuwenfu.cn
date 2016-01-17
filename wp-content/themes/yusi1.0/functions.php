<?php

$dname = 'Yusi';

add_action( 'after_setup_theme', 'deel_setup' );

include('admin/Yusi.php');
include('widgets/index.php');

function deel_setup(){
  
	//去除头部冗余代码
	remove_action( 'wp_head',   'feed_links_extra', 3 ); 
	remove_action( 'wp_head',   'rsd_link' ); 
	remove_action( 'wp_head',   'wlwmanifest_link' ); 
	remove_action( 'wp_head',   'index_rel_link' ); 
	remove_action( 'wp_head',   'start_post_rel_link', 10, 0 ); 
	remove_action( 'wp_head',   'wp_generator' ); 
	//
	add_theme_support( 'custom-background' );
	//隐藏admin Bar
	add_filter('show_admin_bar','hide_admin_bar');

	//关键字
	add_action('wp_head','deel_keywords');   

	//页面描述 
	add_action('wp_head','deel_description');   

	//阻止站内PingBack
	if( dopt('d_pingback_b') ){
		add_action('pre_ping','deel_noself_ping');   
	}   

	//评论回复邮件通知
	add_action('comment_post','comment_mail_notify'); 

	//自动勾选评论回复邮件通知，不勾选则注释掉 
	// add_action('comment_form','deel_add_checkbox');

	//评论表情改造，如需更换表情，img/smilies/下替换
	add_filter('smilies_src','deel_smilies_src',1,10); 

	//文章末尾增加版权
	add_filter('the_content','deel_copyright');    

	//移除自动保存和修订版本
	if( dopt('d_autosave_b') ){
		add_action('wp_print_scripts','deel_disable_autosave' );
		remove_action('pre_post_update','wp_save_post_revision' );
	}

	//去除自带js
	wp_deregister_script( 'l10n' ); 

	//修改默认发信地址
	add_filter('wp_mail_from', 'deel_res_from_email');
	add_filter('wp_mail_from_name', 'deel_res_from_name');

	//缩略图设置
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(220, 150, true); 

	add_editor_style('editor-style.css');

	//头像缓存  
	if( dopt('d_avatar_b') ){
		add_filter('get_avatar','deel_avatar');  
	}

	//定义菜单
	if (function_exists('register_nav_menus')){
		register_nav_menus( array(
			'nav' => __('网站导航'),
			'pagemenu' => __('页面导航')
		));
	}

}

if (function_exists('register_sidebar')){
	register_sidebar(array(
		'name'          => '全站侧栏',
		'id'            => 'widget_sitesidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h2>',
		'after_title'   => '</h2></div>'
	));
	register_sidebar(array(
		'name'          => '首页侧栏',
		'id'            => 'widget_sidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h2>',
		'after_title'   => '</h2></div>'
	));
	register_sidebar(array(
		'name'          => '分类/标签/搜索页侧栏',
		'id'            => 'widget_othersidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h2>',
		'after_title'   => '</h2></div>'
	));
	register_sidebar(array(
		'name'          => '文章页侧栏',
		'id'            => 'widget_postsidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h2>',
		'after_title'   => '</h2></div>'
	));
	register_sidebar(array(
		'name'          => '页面侧栏',
		'id'            => 'widget_pagesidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h2>',
		'after_title'   => '</h2></div>'
	));
}


function deel_breadcrumbs(){
    if( !is_single() ) return false;
    $categorys = get_the_category();
    $category = $categorys[0];
    
    return '<a title="返回首页" href="'.get_bloginfo('url').'"><i class="fa fa-home"></i></a> <small>></small> '.get_category_parents($category->term_id, true, ' <small>></small> ').'<span class="muted">'.get_the_title().'</span>';
}

// 取消原有jQuery
function footerScript() {
    if ( !is_admin() ) {
        wp_deregister_script( 'jquery' );
 	wp_register_script( 'jquery','//libs.baidu.com/jquery/1.8.3/jquery.min.js', false,'1.0');
	wp_enqueue_script( 'jquery' );
        wp_register_script( 'default', get_template_directory_uri() . '/js/jquery.js', false, '1.0', dopt('d_jquerybom_b') ? true : false );   
        wp_enqueue_script( 'default' );   
	wp_register_style( 'style', get_template_directory_uri() . '/style.css',false,'1.0' );
	wp_enqueue_style( 'style' ); 
    }  
}  
add_action( 'wp_enqueue_scripts', 'footerScript' );


if ( ! function_exists( 'deel_paging' ) ) :
function deel_paging() {
    $p = 4;
    if ( is_singular() ) return;
    global $wp_query, $paged;
    $max_page = $wp_query->max_num_pages;
    if ( $max_page == 1 ) return; 
    echo '<div class="pagination"><ul>';
    if ( empty( $paged ) ) $paged = 1;
    // echo '<span class="pages">Page: ' . $paged . ' of ' . $max_page . ' </span> '; 
    echo '<li class="prev-page">'; previous_posts_link('上一页'); echo '</li>';

    if ( $paged > $p + 1 ) p_link( 1, '<li>第一页</li>' );
    if ( $paged > $p + 2 ) echo "<li><span>···</span></li>";
    for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { 
        if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<li class=\"active\"><span>{$i}</span></li>" : p_link( $i );
    }
    if ( $paged < $max_page - $p - 1 ) echo "<li><span> ... </span></li>";
    //if ( $paged < $max_page - $p ) p_link( $max_page, '&raquo;' );
    echo '<li class="next-page">'; next_posts_link('下一页'); echo '</li>';
    // echo '<li><span>共 '.$max_page.' 页</span></li>';
    echo '</ul></div>';
}
function p_link( $i, $title = '' ) {
    if ( $title == '' ) $title = "第 {$i} 页";
    echo "<li><a href='", esc_html( get_pagenum_link( $i ) ), "'>{$i}</a></li>";
}
endif;

function deel_strimwidth($str ,$start , $width ,$trimmarker ){
    $output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
    return $output.$trimmarker;
}

function dopt($e){
		return stripslashes(get_option($e));
	}

if ( ! function_exists( 'deel_views' ) ) :
function deel_record_visitors(){
	if (is_singular()) 
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID) 
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1))) 
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'deel_record_visitors');  

function deel_views($after=''){
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  echo $views, $after;
}
endif;
//baidu分享
$dHasShare = false;
function deel_share(){
	if( !dopt('d_bdshare_b') ) return false;
  echo '<span class="action action-share bdsharebuttonbox"><i class="fa fa-share-alt"></i>分享 (<span class="bds_count" data-cmd="count" title="累计分享0次">0</span>)<div class="action-popover"><div class="popover top in"><div class="arrow"></div><div class="popover-content"><a href="#" class="sinaweibo fa fa-weibo" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone fa fa-star" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="tencentweibo fa fa-tencent-weibo" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="qq fa fa-qq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_renren fa fa-renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin fa fa-weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more fa fa-ellipsis-h" data-cmd="more"></a></div></div></div></span>';
  global $dHasShare;
  $dHasShare = true;
}

function deel_avatar_default(){ 
  return get_bloginfo('template_directory').'/img/default.png';
}

//评论头像缓存
function deel_avatar($avatar) {
  $tmp = strpos($avatar, 'http');
  $g = substr($avatar, $tmp, strpos($avatar, "'", $tmp) - $tmp);
  $tmp = strpos($g, 'avatar/') + 7;
  $f = substr($g, $tmp, strpos($g, "?", $tmp) - $tmp);
  $w = get_bloginfo('wpurl');
  $e = ABSPATH .'avatar/'. $f .'.png';
  $t = dopt('d_avatarDate')*24*60*60; 
  if ( !is_file($e) || (time() - filemtime($e)) > $t ) 
	copy(htmlspecialchars_decode($g), $e);
  else  
	$avatar = strtr($avatar, array($g => $w.'/avatar/'.$f.'.png'));
  if ( filesize($e) < 500 ) 
	copy(get_bloginfo('template_directory').'/img/default.png', $e);
  return $avatar;
}

//关键字
function deel_keywords() {
  global $s, $post;
  $keywords = '';
  if ( is_single() ) {
	if ( get_the_tags( $post->ID ) ) {
	  foreach ( get_the_tags( $post->ID ) as $tag ) $keywords .= $tag->name . ', ';
	}
	foreach ( get_the_category( $post->ID ) as $category ) $keywords .= $category->cat_name . ', ';
	$keywords = substr_replace( $keywords , '' , -2);
  } elseif ( is_home () )    { $keywords = dopt('d_keywords');
  } elseif ( is_tag() )      { $keywords = single_tag_title('', false);
  } elseif ( is_category() ) { $keywords = single_cat_title('', false);
  } elseif ( is_search() )   { $keywords = esc_html( $s, 1 );
  } else { $keywords = trim( wp_title('', false) );
  }
  if ( $keywords ) {
	echo "<meta name=\"keywords\" content=\"$keywords\">\n";
  }
}

//网站描述
function deel_description() {
  global $s, $post;
  $description = '';
  $blog_name = get_bloginfo('name');
  if ( is_singular() ) {
	if( !empty( $post->post_excerpt ) ) {
	  $text = $post->post_excerpt;
	} else {
	  $text = $post->post_content;
	}
	$description = trim( str_replace( array( "\r\n", "\r", "\n", "　", " "), " ", str_replace( "\"", "'", strip_tags( $text ) ) ) );
	if ( !( $description ) ) $description = $blog_name . "-" . trim( wp_title('', false) );
  } elseif ( is_home () )    { $description = dopt('d_description'); // 首頁要自己加
  } elseif ( is_tag() )      { $description = $blog_name . "'" . single_tag_title('', false) . "'";
  } elseif ( is_category() ) { $description = trim(strip_tags(category_description()));
  } elseif ( is_archive() )  { $description = $blog_name . "'" . trim( wp_title('', false) ) . "'";
  } elseif ( is_search() )   { $description = $blog_name . ": '" . esc_html( $s, 1 ) . "' 的搜索結果";
  } else { $description = $blog_name . "'" . trim( wp_title('', false) ) . "'";
  }
  $description = mb_substr( $description, 0, 220, 'utf-8' );
  echo "<meta name=\"description\" content=\"$description\">\n";
}

function hide_admin_bar($flag) {
	return false;
}

//最新发布加new 单位'小时'
function deel_post_new($timer='48'){
  $t=( strtotime( date("Y-m-d H:i:s") )-strtotime( $post->post_date ) )/3600; 
  if( $t < $timer ) echo "<i>new</i>";
}

//修改评论表情调用路径
function deel_smilies_src ($img_src, $img, $siteurl){
	return get_bloginfo('template_directory').'/img/smilies/'.$img;
}

//阻止站内文章Pingback 
function deel_noself_ping( &$links ) {
  $home = get_option( 'home' );
  foreach ( $links as $l => $link )
  if ( 0 === strpos( $link, $home ) )
  unset($links[$l]);
}

//移除自动保存
function deel_disable_autosave() {
  wp_deregister_script('autosave');
}

//修改默认发信地址
function deel_res_from_email($email) {
	$wp_from_email = get_option('admin_email');
	return $wp_from_email;
}
function deel_res_from_name($email){
	$wp_from_name = get_option('blogname');
	return $wp_from_name;
}
//评论回应邮件通知
function comment_mail_notify($comment_id) {
  $admin_notify = '1'; // admin 要不要收回复通知 ( '1'=要 ; '0'=不要 )
  $admin_email = get_bloginfo ('admin_email'); // $admin_email 可改为你指定的 e-mail.
  $comment = get_comment($comment_id);
  $comment_author_email = trim($comment->comment_author_email);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  global $wpdb;
  if ($wpdb->query("Describe {$wpdb->comments} comment_mail_notify") == '')
	$wpdb->query("ALTER TABLE {$wpdb->comments} ADD COLUMN comment_mail_notify TINYINT NOT NULL DEFAULT 0;");
  if (($comment_author_email != $admin_email && isset($_POST['comment_mail_notify'])) || ($comment_author_email == $admin_email && $admin_notify == '1'))
	$wpdb->query("UPDATE {$wpdb->comments} SET comment_mail_notify='1' WHERE comment_ID='$comment_id'");
  $notify = $parent_id ? get_comment($parent_id)->comment_mail_notify : '0';
  $spam_confirmed = $comment->comment_approved;
  if ($parent_id != '' && $spam_confirmed != 'spam' && $notify == '1') {
	$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 发出点, no-reply 可改为可用的 e-mail.
	$to = trim(get_comment($parent_id)->comment_author_email);
	$subject = 'Hi，您在 [' . get_option("blogname") . '] 的留言有人回复啦！';
	$message = '
	<div style="color:#333;font:100 14px/24px microsoft yahei;">
	  <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
	  <p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br /> &nbsp;&nbsp;&nbsp;&nbsp; '
	   . trim(get_comment($parent_id)->comment_content) . '</p>
	  <p>' . trim($comment->comment_author) . ' 给您的回应:<br /> &nbsp;&nbsp;&nbsp;&nbsp; '
	   . trim($comment->comment_content) . '<br /></p>
	  <p>点击 <a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回应完整內容</a></p>
	  <p>欢迎再次光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
	  <p style="color:#999">(此邮件由系统自动发出，请勿回复.)</p>
	</div>';
	$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
	$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
	wp_mail( $to, $subject, $message, $headers );
	//echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
  }
}

//自动勾选 
function deel_add_checkbox() {
  echo '<label for="comment_mail_notify" class="checkbox inline" style="padding-top:0"><input type="checkbox" name="comment_mail_notify" id="comment_mail_notify" value="comment_mail_notify" checked="checked"/>有人回复时邮件通知我</label>';
}

//文章（包括feed）末尾加版权说明
function deel_copyright($content) {
	if( !is_page() ){
		$pid = get_the_ID();
		$name = get_post_meta($pid, 'from.name', true);
		$link = get_post_meta($pid, 'from.link', true);
		$show = false;
		if( $name ){
			$show = $name;
			if( $link ){
				$show = '<a target="_blank" href="'.$link.'">'.$show.'</a>';
			}
		}else if( $link ){
			$show = '<a target="_blank" href="'.$link.'">'.$link.'</a>';
		}
		if( $show ){
			$content.= '<p>来源：'.$show.'</p>';
		}
		$content.= '<p>转载请注明：<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a> &raquo; <a href="'.get_permalink().'">'.get_the_title().'</a></p>';
	}
	return $content;
}

//时间显示方式‘xx以前’
function time_ago( $type = 'commennt', $day = 7 ) {
  $d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
  if (time() - $d('U') > 60*60*24*$day) return;
  echo ' (', human_time_diff($d('U'), strtotime(current_time('mysql', 0))), '前)';
}

function timeago( $ptime ) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return '刚刚';
    $interval = array (
        12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $ptime).')',
        30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $ptime).')',
        7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $ptime).')',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

//评论样式
function deel_comment_list($comment, $args, $depth) {
  echo '<li '; comment_class(); echo ' id="comment-'.get_comment_ID().'">';

  //头像
  echo '<div class="c-avatar">';
  echo str_replace(' src=', ' data-original=', get_avatar( $comment->comment_author_email, $size = '54' , deel_avatar_default())); 
  //内容
  echo '<div class="c-main" id="div-comment-'.get_comment_ID().'">';
	echo str_replace(' src=', ' data-original=', convert_smilies(get_comment_text()));
	if ($comment->comment_approved == '0'){
	  echo '<span class="c-approved">您的评论正在排队审核中，请稍后！</span><br />';
	}
	//信息
	echo '<div class="c-meta">';
		echo '<span class="c-author">'.get_comment_author_link().'</span>';
		echo get_comment_time('Y-m-d H:i '); echo time_ago(); 
		if ($comment->comment_approved !== '0'){ 
			echo comment_reply_link( array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); 
		echo edit_comment_link(__('(编辑)'),' - ','');
	  } 
	echo '</div>';
  echo '</div></div>';
}
//remove google fonts
if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
     add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
     add_action('login_init', 'remove_wp_open_sans');
endif;

//欲思@添加钮Download
function DownloadUrl($atts, $content = null) {
	extract(shortcode_atts(array("href" => 'http://'), $atts));
	return '<a class="dl" href="'.$href.'" target="_blank" rel="nofollow"><i class="fa fa-cloud-download"></i>'.$content.'</a>';
	}
add_shortcode("dl", "DownloadUrl");
//欲思@添加钮git
function GithubUrl($atts, $content=null) {
   extract(shortcode_atts(array("href" => 'http://'), $atts));
	return '<a class="dl" href="'.$href.'" target="_blank" rel="nofollow"><i class="fa fa-github-alt"></i>'.$content.'</a>';
}
add_shortcode('gt' , 'GithubUrl' );
//欲思@添加钮Demo
function DemoUrl($atts, $content=null) {
   extract(shortcode_atts(array("href" => 'http://'), $atts));
	return '<a class="dl" href="'.$href.'" target="_blank" rel="nofollow"><i class="fa fa-external-link"></i>'.$content.'</a>';
}
add_shortcode('dm' , 'DemoUrl' );

//欲思@添加编辑器快捷按钮
add_action('admin_print_scripts', 'my_quicktags');
function my_quicktags() {
    wp_enqueue_script(
        'my_quicktags',
        get_stylesheet_directory_uri().'/js/my_quicktags.js',
        array('quicktags')
    );
    }; 

//评论过滤  
function refused_spam_comments( $comment_data ) {  
$pattern = '/[一-龥]/u';  
$jpattern ='/[ぁ-ん]+|[ァ-ヴ]+/u';
if(!preg_match($pattern,$comment_data['comment_content'])) {  
err('写点汉字吧，博主外语很捉急！You should type some Chinese word!');  
} 
if(preg_match($jpattern, $comment_data['comment_content'])){
err('日文滚粗！Japanese Get out！日本語出て行け！ You should type some Chinese word！');  
}
return( $comment_data );  
}  
if( dopt('d_spamComments_b') ){
add_filter('preprocess_comment','refused_spam_comments');
	}   


//点赞
add_action('wp_ajax_nopriv_bigfa_like', 'bigfa_like');
add_action('wp_ajax_bigfa_like', 'bigfa_like');
function bigfa_like(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'ding'){
    $bigfa_raters = get_post_meta($id,'bigfa_ding',true);
    $expire = time() + 99999999;
    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
    setcookie('bigfa_ding_'.$id,$id,$expire,'/',$domain,false);
    if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
        update_post_meta($id, 'bigfa_ding', 1);
    } 
    else {
            update_post_meta($id, 'bigfa_ding', ($bigfa_raters + 1));
        }
   
    echo get_post_meta($id,'bigfa_ding',true);
    
    } 
    
    die;
}
//最热排行
function hot_posts_list($days=7, $nums=10) { 
    global $wpdb;
    $today = date("Y-m-d H:i:s");
    $daysago = date( "Y-m-d H:i:s", strtotime($today) - ($days * 24 * 60 * 60) );  
    $result = $wpdb->get_results("SELECT comment_count, ID, post_title, post_date FROM $wpdb->posts WHERE post_date BETWEEN '$daysago' AND '$today' ORDER BY comment_count DESC LIMIT 0 , $nums");
    $output = '';
    if(empty($result)) {
        $output = '<li>None data.</li>';
    } else {
        $i = 1;
        foreach ($result as $topten) {
            $postid = $topten->ID;
            $title = $topten->post_title;
            $commentcount = $topten->comment_count;
            if ($commentcount != 0) {
              $output .= '<li><p><span class="post-comments">评论 ('.$commentcount.')</span><span class="muted"><a href="javascript:;" data-action="ding" data-id="'.$postid.'" id="Addlike" class="action';
	if(isset($_COOKIE['bigfa_ding_'.$postid])) $output .=' actived';
	$output .='"><i class="fa fa-heart-o"></i><span class="count">';
	if( get_post_meta($postid,'bigfa_ding',true) ){ 
		$output .=get_post_meta($postid,'bigfa_ding',true);
 	} else {$output .='0';}
	$output .='</span>喜欢</a></span></p><span class="label label-'.$i.'">'.$i.'</span><a href="'.get_permalink($postid).'" title="'.$title.'">'.$title.'</a></li>';
                $i++;
            }
        }
    }
    echo $output;
}
//在 WordPress 编辑器添加“下一页”按钮
add_filter('mce_buttons','add_next_page_button');
function add_next_page_button($mce_buttons) {
	$pos = array_search('wp_more',$mce_buttons,true);
	if ($pos !== false) {
		$tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
		$tmp_buttons[] = 'wp_page';
		$mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
	}
	return $mce_buttons;
}

//判断手机广告
function Yusi_is_mobile() {
    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        return false;
    } elseif ( ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false  && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') === false) // many mobile devices (all iPh, etc.)
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
            return true;
    } else {
        return false;
    }
}

//欲思@搜索结果排除所有页面
function search_filter_page($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts','search_filter_page');
// 更改后台字体
function Bing_admin_lettering(){
    echo'<style type="text/css">
        * { font-family: "Microsoft YaHei" !important; }
        i, .ab-icon, .mce-close, i.mce-i-aligncenter, i.mce-i-alignjustify, i.mce-i-alignleft, i.mce-i-alignright, i.mce-i-blockquote, i.mce-i-bold, i.mce-i-bullist, i.mce-i-charmap, i.mce-i-forecolor, i.mce-i-fullscreen, i.mce-i-help, i.mce-i-hr, i.mce-i-indent, i.mce-i-italic, i.mce-i-link, i.mce-i-ltr, i.mce-i-numlist, i.mce-i-outdent, i.mce-i-pastetext, i.mce-i-pasteword, i.mce-i-redo, i.mce-i-removeformat, i.mce-i-spellchecker, i.mce-i-strikethrough, i.mce-i-underline, i.mce-i-undo, i.mce-i-unlink, i.mce-i-wp-media-library, i.mce-i-wp_adv, i.mce-i-wp_fullscreen, i.mce-i-wp_help, i.mce-i-wp_more, i.mce-i-wp_page, .qt-fullscreen, .star-rating .star { font-family: dashicons !important; }
        .mce-ico { font-family: tinymce, Arial !important; }
        .fa { font-family: FontAwesome !important; }
        .genericon { font-family: "Genericons" !important; }
        .appearance_page_scte-theme-editor #wpbody *, .ace_editor * { font-family: Monaco, Menlo, "Ubuntu Mono", Consolas, source-code-pro, monospace !important; }
        </style>';
}
add_action('admin_head', 'Bing_admin_lettering');
//欲思@添加相关文章图片文章
if ( function_exists('add_theme_support') )add_theme_support('post-thumbnails');
 
//输出缩略图地址
function post_thumbnail_src(){
    global $post;
	if( $values = get_post_custom_values("thumb") ) {	//输出自定义域图片地址
		$values = get_post_custom_values("thumb");
		$post_thumbnail_src = $values [0];
	} elseif( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
		$post_thumbnail_src = $thumbnail_src [0];
    } else {
		$post_thumbnail_src = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$post_thumbnail_src = $matches [1] [0];   //获取该图片 src
		if(empty($post_thumbnail_src)){	//如果日志中没有图片，则显示随机图片
			$random = mt_rand(1, 10);
//			echo get_bloginfo('template_url');
//			echo '/img/pic/'.$random.'.jpg';

            $post_thumbnail_src = get_bloginfo('template_url').'/img/pic/'.$random.'.jpg';
			//如果日志中没有图片，则显示默认图片
//			echo '/img/thumbnail.png';
		}
	};
	echo $post_thumbnail_src;
}


function get_avatar_uctheme( $avatar ) {
$avatar = preg_replace( "/http:\/\/(www|\d).gravatar.com/","http://gravatar.duoshuo.com",$avatar );
return $avatar;
}
add_filter( 'get_avatar', 'get_avatar_uctheme' );


/**
 * 获取最新的10篇文章。
 * 2015年10月22日9:32:12 吴文付
 *
 * @return mixed
 */
function get_new_post() {
    header("Access-Control-Allow-Origin：*");
    if ( isset($_GET["get_json_post"]) && $_GET["get_json_post"] == "get" ) {
        //global $post,$wp_query, $wp_rewrite;
        global $wpdb,$post,$wp_query;
        $result = $wpdb->get_results("SELECT ID,post_title,post_excerpt,post_date,guid FROM $wpdb->posts where post_status='publish' and post_type='post' ORDER BY ID DESC LIMIT 0 , 10");
        foreach ($result as $post) {
            $post->guid = get_permalink($post->ID);
            $post->post_date = date("Y-m-d",strtotime($post->post_date));
        }
        echo json_encode($result);
        die;
    } else {
        return;
    }
}
add_action('init', 'get_new_post');

/**
 * 获取文章的明细。
 * 根据文章id
 */
function get_new_post_id(){
    if ( isset($_GET["get_json_post_id"])  ) {
        //global $post,$wp_query, $wp_rewrite;
        global $wpdb,$post,$wp_query;
        $id = $_GET['get_json_post_id'];
        $result = $wpdb->get_results("SELECT ID,post_title,post_content,post_date FROM $wpdb->posts where post_status='publish' and post_type='post' and ID=$id ORDER BY ID DESC LIMIT 0 , 10");
        foreach ($result as $post) {
            $post->post_date = date("Y-m-d",strtotime($post->post_date));
        }
        echo json_encode($result);
        die;
    } else {
        return;
    }
}
add_action('init', 'get_new_post_id');

/**
 * 聊天接口。
 * 回复文字+发表：取出临时表中的记录。按照id组合成文章。然后清空临时表.
 *
 * 1、fb 这执行发表操作。
 * 2、del 执行清空操作
 * 3、其他的这执行插入操作。
 * 4、select 执行查看操作。
 *
 * 图片的话。单独通过一个接口进行上传。
 *
 * id content addtime sort
 * 2015年10月25日16:01:10 记录生活的片段。
 * 后期汇总一天的为一篇文章。
 *
 *
 *
 */

function add_part_post(){
    if(isset($_GET['add_part_post'])){
        global $wpdb;

        #获得post的数据。
        $content = $_GET['info'];
        $content = trim($content);

        #检查是否为空
        if(empty($content)){
            echo json_encode(array(
                'code'=>200,
                'text'=>'内容为空'
            ));
            die();
        }

        #todo:针对回复。输出一些其他的控制效果。
        switch($content){

            case "地址":
                echo json_encode(array(
                    'code'=>200,
                    'text'=>'地址: http://wuwenfu.cn/weibo.php'
                ));
                die();
                break;
            case "qsbk":
                $rs = file_get_contents("http://wuwenfu.cn?add_qsbk=1");
                echo json_encode(array(
                    'code'=>200,
                    'text'=>'成功采集了笑话:'.$rs
                ));
                die();
            default:
                //没有其他操作
        }



        $data = array(
            'content'=>$content,
            'addtime'=>time()
        );
        #执行数据库插入操作。
        $rs = $wpdb->insert( 'wp_weibo', $data);




        echo json_encode(array(
            'code'=>200,
            'text'=>'发布成功:'.$content
        ));
        die();
    }else{
        return;
    }

}

add_action('init','add_part_post');

#图片上传的操作。
function add_img_post(){
    if(isset($_GET['add_img_post'])){

        echo json_encode(array(
            'code'=>200,
            'text'=>'图片发布成功:'
        ));
        die();
    }else{
        return;
    }
}

add_action('init','add_img_post');


#虚假网页。2015年11月8日 吴文付。仅为演示。
function add_phone(){
    if(isset($_GET['add_phone'])){
        global $wpdb;
        $content = "受骗的号码:".$_GET['add_phone'];
        //存储手机号码
        $data = array(
            'content'=>$content,
            'addtime'=>time()
        );
        #执行数据库插入操作。
        #先查询一次，如果号码存在，则不执行。
        $rs1 = $wpdb->get_results("select content from wp_weibo where content like '%".$_GET['add_phone']."%'");
        if($rs1){

        }else{
            $rs = $wpdb->insert( 'wp_weibo', $data);

        }


    }else{
        return ;
    }

}

add_action('init','add_phone');


function add_qsbk(){
    if(isset($_GET['add_qsbk']) && $_GET['add_qsbk'] ==1){

        $url = "http://www.qiushibaike.com/textnew";
        $curl = curl_init(); //开启curl
        $header[] = "Host:www.qiushibaike.com";
        $header[] = "User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0";
        $header[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
        $header[] = "Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3";
        //$header[] = "Accept-Encoding: gzip, deflate";
        $header[] = "Cookie:_qqq_uuid_=ZTgyMGRjYWY4Mzc0MzNhY2QyNzMwZTZlMzhiODEwNTYwZDYzMTBhNg==|1446285620|252f0fb776fe7e6b89d7f74e45fe83ff1f277107; bdfmapping=1446285648; Hm_lvt_2670efbdd59c7e3ed3749b458cafaa37=1446285671";
        $header[] = "Connection: keep-alive";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $url); //设置请求地址
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  //是否输出 1 or true 是不输出 0  or false输出
        $html = curl_exec($curl); //执行curl操作
        curl_close($curl);


        $rs = phpquery::newDocumentHTML($html,'utf-8');


        #获取段子列表。最外面那个。
        $articles = pq(".article");

        #id位于id属性中，

        #存储数据.二维数组。每一个数组代表一个段子。

        $datas = array();

        $sql = "INSERT INTO `wp_weibo`(`id`, `content`, `addtime`) VALUES ";

        foreach($articles as $article){

//            var_dump($article);

            $data = array();
            #获取段子的唯一code
//            $data['code'] = pq($article)->attr("id");
            #获取段子的内容
            $data['content'] = pq($article)->find(".content")->text();

            $data['content'] .="(来自糗事百科)";

//            echo $data['code'];
//            echo $data['content'];

//            echo "<br>";
            #添加到数组中去
            $datas[] = $data;
            $time = time();
            $sql .= "(null,'".$data['content']."',$time)";
            $sql .= ",";

        }
        #截取最后一个,
        $sql = trim($sql,',');

        global $wpdb;

//        echo $sql;

        echo $wpdb->query($sql);

//        echo 222;

        die();
        /*$content = "";
        //存储手机号码
        $data = array(
            'content'=>$content,
            'addtime'=>time()
        );
        #执行数据库插入操作。
        #先查询一次，如果内容存在，且是今天。
        $rs1 = $wpdb->get_results("select content from wp_weibo where content like '%糗事百科%'");
        if($rs1){

        }else{
            $rs = $wpdb->insert( 'wp_weibo', $data);

        }*/


    }else{
        return ;
    }

}

add_action('init','add_qsbk');




/**
 * 2015年11月21日
 *
 */
function   app_api(){

    global $wpdb;

    //apinum=1 2 3 4 5 6 对应不同的参数。
    if(isset($_GET['apinum'])){

        switch ($_GET['apinum'])
        {
            //获取博客列表
            case 1:
                //获取博客文章。需要按分页获取。
//                $p = isset($_GET['p'])?$_GET['p']:1; //页码
//                $size = $_GET['size']; //记录数
//                $cat = $_GET['tab']; //分类

                $p = isset($_GET['p'])?$_GET['p']:1; //页码
                $size = $_GET['size']; //记录数
                $cat = $_GET['tab']; //

                global $wpdb;

                if($p !=1){
                    $start = ($p-1)*$size;
                }else{
                    $start = 0;
                }

                //统计多少条数。
                $rs1 = $wpdb->get_results("SELECT count(id) as `totalRow` FROM wp_weibo where status=1");
                $totalRow = $rs1[0]->totalRow;
                $totalPage = ceil($totalRow/$size);

                global $wpdb;
                $args = array(
                    'orderby'=>"time",
                    'paged'=>$p,
                    'showposts' => $size,
                );
                $result = $wpdb->get_results("SELECT `ID`,`post_title`,`post_modified`,`comment_count`,`post_content`,`post_date` FROM wp_posts where `post_status` = 'publish' AND `post_type`='post'  ORDER BY post_date DESC LIMIT $start , $size");

                foreach ($result as $post) {
                    //填充数据。
                    $list[]= array(
                        "modify_time"=>$post->post_modified,
                        "avatar"=>"http://wuwenfu.cn/wp-content/themes/yusi1.0/app/1.jpg",
                        "title"=> $post->post_title,
                        "reply_count"=> $post->comment_count,
                        "good"=> 0,
                        "content"=>$post->post_content ,
                        "last_reply_author_id"=> "1a973292fc004c29bfc0d95045c1c340",
                        "sectionName"=>get_the_category( $post->ID )[0]->cat_name,
                        "s_id"=> 2,
                        "view"=> 3814,
                        "in_time"=>$post->post_date,
                        "tab"=>"blog",
                        "top"=> 1,
                        "original_url"=>"",
                        "nickname"=>'',
                        "id"=>$post->ID,
                        "last_reply_time"=> "2015-10-15 12:34:02",
                        "author_id"=> "1a973292fc004c29bfc0d95045c1c340",
                        "show_status"=> 1,
                        "reposted"=> 0,
                        "last_reply_author_avatar"=> "http://qzapp.qlogo.cn/qzapp/101203891/BE24E41FE40CA067D2063611B9469A35/50"
                    );
                }
                $data = array(
                    'code'=>200,
                    'description'=>"success",
                    'detail'=>array(
                        'totalROw'=>$totalRow,
                        "pageNumber"=>$p,
                        "lastPage"=>false,
                        "firstPage"=> true,
                        "totalPage"=>$totalPage,
                        "pageSize"=>1 ,
                        "list"=>$list
                    )
                );
                 break;
            case 2:

//               //获取博客文章明细。
                $post_id = isset($_GET['tid'])?$_GET['tid']:1; //文章id
                $result =  get_post( $post_id );

                //查询作者昵称
                $author = $wpdb->get_results("SELECT `ID`,`user_nicename` FROM wp_users where  `ID` = ".$result->post_author);

                //查询评论。评论
                $comment = $wpdb->get_results("SELECT `comment_content`,`comment_author`,`comment_date` FROM wp_comments where  `comment_post_ID` = ".$result->ID);

//                var_dump($comment);
//                die();
                $conent = $result->post_content;
                $conent = "&nbsp;".$conent."&nbsp;";
//                   $conent = '<img style="-webkit-user-select: none" src="http://mt1.baidu.com/timg?wh_rate=0&amp;wapiknow&amp;quality=100&amp;size=w250&amp;sec=0&amp;di=a3b75ac0c7f26c61f86da7ab0549617c&amp;src=http%3A%2F%2Fa.hiphotos.baidu.com%2Fzhidao%2Fwh%253D800%252C450%2Fsign%3Dec547e33f61f3a295a9dddc6a9159005%2F500fd9f9d72a6059452d3ef72e34349b033bba1a.jpg">';
                $topic = array(
                    "signature"=> "这家伙很懒，什么都没留下",
                    "modify_time"=>$result->post_modified,
                    "avatar"=>"http://wuwenfu.cn/wp-content/themes/yusi1.0/app/1.jpg",
                    "title"=>$result->post_title,
                    "reply_count"=>$result->comment_count,
                    "good"=> 0,
//                    "content"=>$result->post_content,
                    "content"=>$conent,
                    "last_reply_author_id"=>"1a973292fc004c29bfc0d95045c1c340",
                    "sectionName"=>get_the_category( $result->ID )[0]->cat_name,
                    "score"=>2309,
                    "s_id"=> 2,
                    "view"=> 3824,
                    "in_time"=>$result->post_date,
                    "top"=> 1,
                    "tab"=> "blog",
                    "original_url"=> "",
                    "nickname"=>$author[0]->user_nicename,
                    "id"=> "b498a1438f64417787ce7e65cfd847f6",
                    "last_reply_time"=>"2015-10-15 12:34:02",
                    "author_id"=> $author[0]->ID,
                    "show_status"=>1,
                    "reposted"=>0
                );

                $replies = array();

                foreach ($comment as $reply) {

                    $replies[] = array(
                        "in_time"=>$reply->comment_date,
                        "nickname"=> $reply->comment_author,
                        "best"=> 0,
                        "avatar"=>"http://wuwenfu.cn/wp-content/themes/yusi1.0/app/1.jpg",
                        "id"=> "c18682f91d124ddb876fb884db9edc69",
                        "isdelete"=> 0,
                        "author_id"=> "eba365d196154eccb7affd50b8fe73ef",
                        "tid"=> "b498a1438f64417787ce7e65cfd847f6",
                        "content"=> $reply->comment_content
                    );
                }




                $data = array(
                    'code'=>200,
                    'description'=>"success",
                    'detail'=>array(
                        "topic"=>$topic,
                        "replies"=>$replies
                    )
                );
                break;
            case 3:
                //获取笑话列表。需要按分页获取。
                $p = isset($_GET['p'])?$_GET['p']:1; //页码
                $size = $_GET['size']; //记录数
                $cat = $_GET['tab']; //

                global $wpdb;

                if($p !=1){
                    $start = ($p-1)*$size;
                }else{
                    $start = 0;
                }

                //统计多少条数。
                $rs1 = $wpdb->get_results("SELECT count(id) as `totalRow` FROM wp_weibo where status=1");
                $totalRow = $rs1[0]->totalRow;
                $totalPage = ceil($totalRow/$size);

//                echo $totalRow;
//                die();



                $result = $wpdb->get_results("SELECT id,content,addtime FROM wp_weibo where status=1  ORDER BY addtime DESC LIMIT $start , $size");

                foreach ($result as $post) {
                    //填充数据。
                    $list[]= array(
                        "modify_time"=>$post->post_modified,
                        "avatar"=> "http://wuwenfu.cn/wp-content/themes/yusi1.0/app/1.jpg",
                        "title"=> $post->content,
                        "reply_count"=> 0,
                        "good"=> 0,
                        "content"=>$post->content ,
                        "last_reply_author_id"=> "1a973292fc004c29bfc0d95045c1c340",
                        "sectionName"=>"笑话",
                        "s_id"=> 2,
                        "view"=> 3814,
                        "in_time"=>date("Y-m-d H:i:s",$post->addtime),
                        "tab"=>"blog",
                        "top"=> 1,
                        "original_url"=>"",
                        "nickname"=>'',
                        "id"=>$post->id,
                        "last_reply_time"=> "2015-10-15 12:34:02",
                        "author_id"=> "1a973292fc004c29bfc0d95045c1c340",
                        "show_status"=> 1,
                        "reposted"=> 0,
                        "last_reply_author_avatar"=> "http://qzapp.qlogo.cn/qzapp/101203891/BE24E41FE40CA067D2063611B9469A35/50"
                    );
                }
                $data = array(
                    'code'=>200,
                    'description'=>"success",
                    'detail'=>array(
                        'totalROw'=>$totalRow,
                        "pageNumber"=>$p,
                        "lastPage"=>false,
                        "firstPage"=> true,
                        "totalPage"=>$totalPage,
                        "pageSize"=>1 ,
                        "list"=>$list
                    )
                );

                break;
            case 4:
                //获取博客文章明细。
                $post_id = isset($_GET['tid'])?$_GET['tid']:1; //糗事百科id

                $result = $wpdb->get_results("SELECT `id`,`content`,`addtime` FROM wp_weibo where  `id` = ".$post_id);


                $topic = array(
                    "signature"=> "这家伙很懒，什么都没留下",
                    "modify_time"=>$result[0]->post_modified,
                    "avatar"=>"http://wuwenfu.cn/wp-content/themes/yusi1.0/app/1.jpg",
                    "title"=>mb_substr($result[0]->content, 0, 7,'utf-8'),
                    "reply_count"=>0,
                    "good"=> 0,
                    "content"=> $result[0]->content ,
//                    "content"=>addslash0es($result->post_content),
                    "last_reply_author_id"=>"1a973292fc004c29bfc0d95045c1c340",
                    "sectionName"=>"糗事百科",
                    "score"=>2309,
                    "s_id"=> 2,
                    "view"=> 3824,
                    "in_time"=>date('Y-m-d H:i:s',$result[0]->addtime),
                    "top"=> 1,
                    "tab"=> "blog",
                    "original_url"=> "",
                    "nickname"=>"吴文付",
                    "id"=> "b498a1438f64417787ce7e65cfd847f6",
                    "last_reply_time"=>"2015-10-15 12:34:02",
                    "author_id"=> 1,
                    "show_status"=>1,
                    "reposted"=>0
                );

                $replies = array();


                $data = array(
                    'code'=>200,
                    'description'=>"success",
                    'detail'=>array(
                        "topic"=>$topic,
                        "replies"=>$replies
                    )
                );
                break;
            default:
//                code to be executed
        }






        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($data);
        die();


    }else{
        return;
    }
}

add_action('init','app_api');
/**
 * 提供今目标的账号信息。需要密钥。
 */
function get_jin_post() {
	global $wpdb;
	//如果携带了type =1 表示注册用户。
	if(isset($_GET['type']) && $_GET['type'] ==1 && isset($_GET['key']) ){
		//先判断key是否经过授权。
		$authkey = array(
				'CP4TFY12REZBMO8WHDKQUN7IVJS6A93L5G0X',
				'OFU0R94NQXGHSMAZVPL3Y7W58T1DIBKJ6CE2',
				'PWIHB6CQUAYFSDGZV9N2R8OLM07T3KX1J45E',
				'3C67BR8X29PYE1MG54AHJDQZUNLFOVWTS0KI',
				'UE4YW5HLI27JQT3B8SXMD6APOZFRKCN0G1V9',
				'CRW09IAFL31YUJE7QXNK62ZPGMVD4H5S8TOB',
				'W1X0DSPET3LN7J2UQHAKRFZ5YC4O8BMV96IG'
		);
		if(in_array($_GET['key'],$authkey)){
			//插入到账号表.这里暂不限制。按理一个key只能被使用一次。

			$data = array(
				'email'=>$_GET['email'],
				'password'=>$_GET['password'],
				'notetime'=>'18:00:00',
				'addtime'=>time(),
				'key'=>$_GET['key'],
			);
			//先查询。如果存在，则是更新操作
			$rs1 = $wpdb->get_results("select id from wp_jin where `key`  ='".$_GET['key']."'");

			if($rs1){
				$where = array(
					'key' => $_GET['key']
				);
				$wpdb->update( 'wp_jin', $data,$where);
			}else{
				 $wpdb->insert( 'wp_jin', $data);
			}

			echo 'success';
			die();



		}else{
			echo 'fail';
			die();
		}

	}

    //更新日志内容. 这里应该post。因为可能数据很大。
    if(isset($_GET['type']) && $_GET['type'] == 2 && isset($_GET['key']) ){
		$authkey = array(
				'CP4TFY12REZBMO8WHDKQUN7IVJS6A93L5G0X',
				'OFU0R94NQXGHSMAZVPL3Y7W58T1DIBKJ6CE2',
				'PWIHB6CQUAYFSDGZV9N2R8OLM07T3KX1J45E',
				'3C67BR8X29PYE1MG54AHJDQZUNLFOVWTS0KI',
				'UE4YW5HLI27JQT3B8SXMD6APOZFRKCN0G1V9',
				'CRW09IAFL31YUJE7QXNK62ZPGMVD4H5S8TOB',
				'W1X0DSPET3LN7J2UQHAKRFZ5YC4O8BMV96IG'
		);
        if(in_array($_GET['key'],$authkey)) {
            //插入到账号表.这里暂不限制。按理一个key只能被使用一次。

            $data = array(
                'msg' => $_POST['msg'],
                'ischange'=>1
            );
            $where = array(
                'key' => $_GET['key']
            );
            $wpdb->update( 'wp_jin', $data,$where);
            echo 'success';
            die();
        }else{
            echo 'fail';
            die();
        }
    }

    //同步到今目标成功了。修改一次状态。get方法。
    if(isset($_GET['type']) && $_GET['type'] == 3 && isset($_GET['key']) ){
        $authkey = array(
				'CP4TFY12REZBMO8WHDKQUN7IVJS6A93L5G0X',
				'OFU0R94NQXGHSMAZVPL3Y7W58T1DIBKJ6CE2',
				'PWIHB6CQUAYFSDGZV9N2R8OLM07T3KX1J45E',
				'3C67BR8X29PYE1MG54AHJDQZUNLFOVWTS0KI',
				'UE4YW5HLI27JQT3B8SXMD6APOZFRKCN0G1V9',
				'CRW09IAFL31YUJE7QXNK62ZPGMVD4H5S8TOB',
				'W1X0DSPET3LN7J2UQHAKRFZ5YC4O8BMV96IG'
		);
        if(in_array($_GET['key'],$authkey)) {
            //插入到账号表.这里暂不限制。按理一个key只能被使用一次。

            $data = array(
                'ischange'=>0
            );
            $where = array(
                'key' => $_GET['key']
            );
            $wpdb->update( 'wp_jin', $data,$where);
            echo 'success';
            die();
        }else{
            echo 'fail';
            die();
        }
    }



	if ( isset($_GET["get_jin_post"]) && $_GET["get_jin_post"] == "luoding123" ) {




//		//来自客户端的请求，如果携带了参数。则user 的json。则去检查是否存在。存在则插入。不存在则不操作。
//		if(isset($_GET['user']) && $_GET['user'] != ''){
//			//解析为数据。
//		}

		//直接查询所有的账号
		$result = $wpdb->get_results("SELECT `ID`,`email`,`password`,`notetime`,`msg`,`key` FROM wp_jin where `status`= 1 AND `autowrite`= 1 AND `msg` != '' AND `ischange` = 1 ");
		header("Content-Type: application/json; charset=utf-8");
//		$result = array();
		echo json_encode($result);
		die;


	} else {
		return;
	}
}
add_action('init', 'get_jin_post');













?>