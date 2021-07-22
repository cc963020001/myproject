<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta charset="UTF-8">
<title>浪潮解析-弹幕播放器</title>
<link rel="stylesheet" href="css/mbplayer.css">
<script src="https://lib.baomitu.com/jquery/1.11.0/jquery.min.js"></script>
<script src="js/360mb.js"></script>
<script src="js/md5.min.js"></script>
<!--视频解码-->
<script src="https://lib.baomitu.com/hls.js/8.0.0-beta.3/hls.min.js"></script>
<script src="https://lib.baomitu.com/flv.js/1.6.0/flv.min.js"></script>
<!--Web弹层组件-->
<script src="https://lib.baomitu.com/layer/3.5.1/layer.js"></script>
</head>
<body>
<div id="player"></div>
<div class="tj"></div>
<script>
    // 播放器基本设置
    var playlink ="<?php echo($_REQUEST['myurl']);?>",urlpar ='mbplayer';
    var dmapi = '//dmku.byteamone.cn/dmku/',vodurl = '<?php echo($_REQUEST['url']);?>',vodid="<?php echo($_REQUEST['name']);?>",vodsid="<?php echo($_REQUEST['sid']);?>",vodpic="<?php echo($_REQUEST['pic']);?>",vodname="<?php echo($_REQUEST['name']);?>",next = "<?php echo($_REQUEST['next']);?>",ym="http://www.djggg.com";
    var pic="https://img10.360buyimg.com/ddimg/jfs/t1/176340/18/8164/733759/609395e4E2df09db0/80b3d377da26e626.jpg";
    var playnext = next ;
    var user = '<?php echo($_REQUEST['user']);?>',group = "<?php echo($_REQUEST['group']);?>",color = '#fe3355',logo ='img/logo.png',autoplay = false;
    var danmuon = 1,laoding = 1,diyvodid = 0,pause_ad = 0,usernum = "1";
    //试看时间
    //var trytime_f= 3;
    //违规词
    var pbgjz = ['草','操','妈','逼','滚','网址','网站','支付宝','企','q','n','o','c','m','e'];
    //弹幕库获取
    if(playlink!=''){ }else {var diyvodid = 1;};
    diyid = md5(vodurl),diysid = 0;
    //弹幕礼仪链接
    var dmrule = "https://www.360mb.net"
    //暂停广告
    var pause_ad_html = '<div id="player_pause" style="position:absolute;z-index:209910539;top:50%;left:50%;border-radius:5px;-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);transform:translate(-50%,-50%);max-width:80%;max-height:80%;"><div style=" color: #f4f4f4;position: absolute;font-size: 14px;background-color: hsla(0, 0%, 0%, 0.42);padding: 2px 4px;margin: 4px;border-radius: 3px;right: 0;">广告</div></div>';   
    //播放结束
    function video_end() {alert("播放结束啦=。=")};
</script>
<script src="js/setting.js"></script>
<script>
</script>
</body>
</html>