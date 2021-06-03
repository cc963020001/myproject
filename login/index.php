<?php 

session_start();
if(islogin()){
    header("refresh:0;url='../'");
    exit();
}

?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>翻转的登录注册页面演示</title>
    <link rel="stylesheet" href="https://www.jq22.com/jquery/bootstrap-4.2.1.css">
    <link rel="stylesheet" href="https://www.jq22.com/jquery/font-awesome.4.7.0.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <script type="text/javascript">
    
    <?php
    $act = $_GET['act'];
    if(!empty($act)){ 
     echo "   $.message({
            message:'$act', ";
          if($_GET['type'] == 'warning'){
              echo "  type:'warning' ";
          }else{
              echo "  type:'success' ";
          }
       echo " }); "; 
    }
        ?>
    </script> 
    <div class="section dwo">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log">
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper bgk">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">登录</h4>
                                            <div class="form-group">
                                                <input type="text" name="Email" class="form-style" placeholder="请输入用户名或邮箱" id="email" autocomplete="username" required="">
                                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="Password" class="form-style" placeholder="请输入密码" id="passwd" autocomplete="current-password" required="">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="authcode" class="form-style" placeholder="请输入验证码" id="authcode" autocomplete="current-password" required="">
                                                 <a href="javascript:js_method();" onclick="document.getElementById('captcha_img').src='/includes/authcode.php?r='+Math.random()"><img id="captcha_img" border='1' src='/includes/authcode.php?r=<?php echo rand(); ?>' style="width:100%; height:30px" /></a>
												<i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </div>
                                            <a id="login" type="submit" class="btn mt-4">登录</a>
                                            <div class="d-flex justify-content-between mt-4 text-left">
                                                <div class="flex-fill">
                                                    <p>没有帐号？<label for="reg-log">立即注册</p>
                                                </div>
                                                <div class="flex-fill text-right">
                                                    <p><a href="/user/password/reset" class="forgot link">忘记密码？</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">注册</h4>
                                            <div class="form-group">
                                                <input type="text" name="logname" class="form-style" placeholder="请输入用户名" id="logname" autocomplete="off">
                                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="email" name="logemail" class="form-style" placeholder="请输入电子邮箱" id="logemail" autocomplete="off">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="logpass" class="form-style" placeholder="请输入密码" id="logpass" autocomplete="off">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="logpass" class="form-style" placeholder="重复密码" id="logpass" autocomplete="off">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="logpass" class="form-style" placeholder="解析平台名称" id="logpass" autocomplete="off">
                                                <i class="fa fa-desktop" aria-hidden="true"></i>
                                            </div>
                                            <a href="javascript:" class="btn mt-4">注册</a>
                                            <p class="mb-0 mt-4 text-center">已有帐号？<label for="reg-log">立即登录</label></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<script>


<!--登录验证-->

    $(document).ready(function () {
        function qrlogin(){
            document.getElementById("qrlogin").disabled = true;
        }
        
        
        
        function login() {
            
            document.getElementById("login").disabled = true;

            $.ajax({
                type: "GET",
                url: "/user/login/check",
                dataType: "json",
                data: {
                    email: $$getValue('email'),
                    passwd: $$getValue('passwd'),
                    authcode: $$getValue('authcode'),
                   remember_me: $("#remember_me:checked").val()                },
                success: (data) => {
                    if (data.ret == 1) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href='/user?act=登录成功，欢迎回来'", 1200);
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        document.getElementById("login").disabled = false;
                        $('#captcha_img').click();
                                            }
                },
                error: (jqXHR) => {
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $$.getElementById('msg').innerHTML = `发生错误：${
                        jqXHR.status
                    }`;
                    document.getElementById("login").disabled = false;
                    $('#captcha_img').click();
                                    }
            });
        }

        $("html").keydown(function (event) {
            if (event.keyCode == 13) {
                login();
            }
        });
        $("#login").click(function () {
            login();
        });
        $("#qrlogin").click(function () {
            qrlogin();
        });
        $('div.modal').on('shown.bs.modal', function () {
            $("div.gt_slider_knob").hide();
        });
        $('div.modal').on('hidden.bs.modal', function () {
            $("div.gt_slider_knob").show();
        });
        document.getElementById("qrlogin").onclick = function(){
            document.getElementById("qrpic").style.display = "block";
        }
    })
</script>	
</body>

</html>