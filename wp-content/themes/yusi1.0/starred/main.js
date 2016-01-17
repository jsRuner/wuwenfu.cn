$(function(){
    var mobile   = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
    var touchstart = mobile ? "touchstart" : "mousedown";
    var touchend = mobile ? "touchend" : "mouseup";
    var touchmove = mobile ? "touchmove" : "mousemove";
    var tap = mobile ? "tap" : "click";

    //阻止屏幕滑动
    $('html,body').on(touchmove,function(e){
        e.preventDefault()
    });
	
	_mz_wx_view (1);//秒针检测
	
	
    var motionObj = {};
    var loadingPath='images/';
    var stageH=$(window).height();
    var stageW=$(window).width();

    //定义时间动画：
    for(var i=0; i<10; i++){
        motionObj["page"+(i+1)] = new TimelineMax();
    };

    //初始化音乐
    var _music;
    function intsound(){
        var sounds = [
            {src: "bg1.mp3", id: 1} //todo:路径的问题，后期解决
        ];
        createjs.Sound.alternateExtensions = ["ogg"];
        createjs.Sound.registerSounds(sounds, loadingPath);
    }
    intsound();

    //初始化阻止屏幕双击，当有表单页的时候，要关闭阻止事件，否则不能输入文字了，请传入false值，再次运行即可
    initPreventPageDobuleTap(true);
    initPageMotion();

    //初始化动画
    function initPageMotion(){

        $(".main").fadeIn(300,function(){
            setTimeout(function(){
                $('.longpage').show();
                document.title='韩雅红包群（20）';
                //setTimeout(function(){
                //    motionObj['page'+1].play();
                //},1000)
                messages1();
            },2000)
        });
    }

    //产生随机姓名
    function GetRandomNum(Min,Max)
    {
        var Range = Max - Min;
        var Rand = Math.random();
        return(Min + Math.round(Rand * Range));
    }
    var userNamesArray = ['王正标','王雷','金亨烈'];
    var _uid = GetRandomNum(0,2);
    var _userName = userNamesArray[_uid];
    console.log(_userName);

    function getUrlParam (name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return decodeURIComponent(r[2]); return "";
    }
    var nameParameter = getUrlParam('id');
    if(nameParameter !='' && nameParameter != null && nameParameter != undefined){
        $('.cont').text(userNamesArray[parseInt(nameParameter)]+'邀请你加入了“韩雅红包群”群聊，群聊参与人还有：马化腾 腾讯、程维 滴滴、柳传志 联想、刘强东 京东……');
    }

    wxdata['title'] = _userName+'邀请你加入群聊';
    wxdata['desc'] = _userName+'邀请你加入群聊韩雅红包群，进入查看详情。'
    wxdata['link'] = wxdata['link']+'?id='+_uid;
    setShare();  //微信分享


    //播放消息声音
    function playmessagesSound(){
        _music = createjs.Sound.play('1');
        _music.volume = 0.1;
    }

    var _DIST = 0
    var _space = stageH/2-520;
    var _space2 = 0;
    var _timer;
    var msgID;
    var dist;
    //显示消息1
    function messages1(){
        msgID=1;
        dist = -150;
        _timer = setInterval(setMS1,1500)
    }
    //显示消息2
    function messages2(){
        dist = 0;
        msgID=4;
        clearInterval(_timer);
        _timer = setInterval(setMS2,1500)
    }

    function setMS1(){
        if(msgID<=3){
            if(msgID==3) receiveMoney();
            $('#msg'+msgID).fadeIn();
            playmessagesSound();

            if(msgID == 2){
                clearInterval(_timer);
                _timer = setInterval(setMS1,2500)
            }
        }else{
            clearInterval(_timer);
        }
        msgID++;
    }

    function setMS2(){
        if(msgID<=9){
            if(msgID==5){
                _btn1 = 2;
                _btn2 = 2;
                _btn3 = 2;
            }

            if(msgID==5) {
                TweenMax.to($(".longpage>div").not($('.di')), .5, { css: {'top': -80 + 'px'}, ease: Linear.easeNone });
                dist += -80;
            }
            if(msgID==6) {
                TweenMax.to($(".longpage>div").not($('.di')), .5, { css: {'top': dist-160 + 'px'}, ease: Linear.easeNone });
                dist += -160;
            }
            if(msgID==7) {
                TweenMax.to($(".longpage>div").not($('.di')), .5, { css: {'top': dist-120 + 'px'}, ease: Linear.easeNone });
                dist += -120;
            }
            if(msgID==8) {
                TweenMax.to($(".longpage>div").not($('.di')), .5, { css: {'top': dist-170 + 'px'}, ease: Linear.easeNone });
                dist += -170;
            }
            if(msgID==9) {
                TweenMax.to($(".longpage>div").not($('.di')), .5, { css: {'top': dist-270 + 'px'}, ease: Linear.easeNone });
                dist += -270;
            }

            $('#msg'+msgID).fadeIn();
            playmessagesSound();
        }else{
            clearInterval(_timer);
        }
        msgID++;
    }

    var _btn1 = 1;
    var _btn2 = 1;
    var _btn3 = 1;

    //打开红包
    var isTheFirstReceive = true;
    var ct = true;
    function receiveMoney(){
        $('#redpick1, #msg3 .hand').one(touchstart, function(){
            $('#msg3 .circle').css({'animation':'none','-webkit-animation':'none'});
            $('#msg3 .circle,#msg3 .hand').fadeOut();
			_mz_wx_view (2);//马云红包页
			_mz_wx_custom(1); 
            if(isTheFirstReceive){
                if(ct){
                    $('.hongbao,#hb1').show();
                    TweenMax.to('#hb1',.5, {alpha:1, scale:1, ease:Bounce.easeOut});
                }else{
                    $('.hongbao,#hb1Open,#btn3').show();
                    TweenMax.to('#hb1Open',.5, {alpha:1, scale:1, ease:Bounce.easeOut});
                }
            }else{
                $('.hbnull,#null1').show();
            }
        })
    }

    //拆红包：
    var canRemoveMoney = true;
    $('#btn2').on(touchstart, function(){
        if(_btn2==1){
            if(canRemoveMoney){
				_mz_wx_view (3);//马云红包派完页
				_mz_wx_custom(2); 
                $('#hb1Open,#btn3').show();
                $('#hb1').hide();
                TweenMax.to('#hb1',{scale:0.5, alpha:0});
                setTimeout(function(){
                    $('#hongbao .circle').show();
                    $('#hongbao .hand').show();
                },2000);
                //canRemoveMoney = false;
                //第一次拆红包，设置关闭按钮为第二页的关闭
                isTheFirstClose = false;
            }else{
                alert('已经拆过红包了');
            }
        }else{
            //CEO的红包
            _mz_wx_custom(6);
            setTimeout(function(){
//				alert("呵呵，逗你玩的，你还以为真有红包啊! 不过楼主招聘程序员，欢迎小伙伴来联系。可以关注楼主新浪微博：程序员吴文付。福利多多，妹子多多")
//              location.href='http://wuwenfu.cn';//这里填写自己的链接。
                alert("韩雅王正标邀请你来参加韩雅020盛宴")
              location.href='http://402.shop.anya.boluo361.com';//这里填写自己的链接。

            },250);
        }
    })

    //看手气：
    $('#btn3').on(touchstart, function(){
        $('.hbnull,#null1').show();
        $('#hb1Open').hide();
		_mz_wx_view (4);//马云红包看手气页
		_mz_wx_custom(3); 
        setTimeout(function(){
            $('#hbnull .circle').show();
            $('#hbnull .hand').show();
        },2000);
    })

    //详情页：
    //var isTheFirst = true;
    $('#null1,.hbnull .circle,.hbnull .hand').on(touchstart, function(){
        $('#null1,.hbnull').fadeOut();
        $('.hongbao').hide();
        $('#hbnull .circle').remove();
        $('#hbnull .hand').remove();
        $('#hongbao .circle').remove();
        $('#hongbao .hand').remove();
        isTheFirstReceive = false;
        goNextAnimation();
    })

    //关闭
    var isTheFirstClose = true;
    $('#btn1').on(touchstart, function(){
        if(_btn1 == 1){
            if(isTheFirstClose){
                //拆红包页关闭
                $('.hongbao,#hb1').hide();
                $('#hongbao .circle').remove();
                $('#hongbao .hand').remove();
                TweenMax.set('#hb1', {alpha:0, scale:0.5});
                goNextAnimation();
                //isTheFirstClose = false;
            }else{
                $('.hongbao,#hb1Open,#btn3').hide();
                $('#hongbao .circle').remove();
                $('#hongbao .hand').remove();
                TweenMax.to('#hb1Open',.5, {alpha:0, scale:0.5, ease:Bounce.easeOut});
                //第二页点击关闭按钮：
                ct = false;
                goNextAnimation();
            }
        }else{

        }
    })

    //继续下面的动画：
    var cangoNext = true;
    function goNextAnimation(){
        if(cangoNext){
            messages2();
        }
    }

    //打开CEO的红包
    $('#redpick2, #msg9 .hand').on(touchstart, function(){
        $('.hongbao,#hb2').show();
		_mz_wx_view (5);//打开滴滴程CEO红包
		_mz_wx_custom(4); 
        TweenMax.to('#hb2',.5, {alpha:1, scale:1, ease:Bounce.easeOut});
    })

    //阻止屏幕双击以后向上位移,当有表单页的时候，要关闭阻止事件，否则不能输入文字了
    function initPreventPageDobuleTap(isPreventPageDobuleTap){
        if(isPreventPageDobuleTap){
            $('.page').on(touchstart,function(e){
                e.preventDefault();
            })
        }else{
            $('.page').off(touchstart);
        }
    }

});