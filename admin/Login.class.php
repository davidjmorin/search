<head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <style type="text/css">
                body {background-color:#510000;
				color: #fff;
				}
                th {background: URL(http://www.athenahealth.com/_img/boxes/carousel_bg.png);}
                p {color:blue;}
                table {
                table-layout:fixed
                width:400px;
                }
                td#key {
                width:25%;
                border:1px solid red;
                }
                td#bl {
                width:25%;
                border:1px solid red;
                }
                td#ph {
                width:50%;
                border:1px solid red;
                }
                td#reason {
                width:50%;
                border:1px solid red;
                }
				td#count {
                color: #fff;
                border:1px solid red;
                }
				.main {
				background-color: #5f0500;
				color: #fff;
				}
				
				tr#kw{
				background-color: #5f0500;
				color: #fff;
				font-size: 10px;
				}
				
				tr#kw{
				background-color: #5f0500;
				color: #fff;
				font-size: 10px;
				}
				
				td#information{
				background-color: #5f0500;
				color: #FFFF00;
				font-size: 10px;
				}
				
				div#more {
				font-size: 10px;
				
				}
					a {
				color: #fff;
				
				}
				a.visited { color: #fff;}

				
        </style>
</head>

<?php
        
        
        ///This is for the admin area only////
        define('LOGIN_USER', "chips");
        define('LOGIN_PASS', "chips");
        
        
        
        
        class Login {
                
                
                var $prefix = "login_";
                
                var $cookie_duration = 21;
                
                var $user = "";
                var $pass = "";
                
                function authorize() {
                        
                        //save cookie info to session
                        if(isset($_COOKIE[$this->prefix.'user'])){
                                $_SESSION[$this->prefix.'user'] = $_COOKIE[$this->prefix.'user'];
                                $_SESSION[$this->prefix.'pass'] = $_COOKIE[$this->prefix.'pass'];
                        }
                        //      else{echo "no cookie<br>";}
                        
                        
                        //if setting vars
                        if(isset($_POST['action']) && $_POST['action'] == "set_login"){
                                
                                $this->user = $_POST['user'];
                                $this->pass = md5($this->prefix.$_POST['pass']); //hash password. salt with prefix
                                
                                $this->check();
                                
                                
                                if(isset($_POST['remember'])){
                                        setcookie($this->prefix."user", $this->user, time()+($this->cookie_duration*86400));// (d*24h*60m*60s)
                                        setcookie($this->prefix."pass", $this->pass, time()+($this->cookie_duration*86400));// (d*24h*60m*60s)
                                }
                                
                                
                                $_SESSION[$this->prefix.'user'] = $this->user;
                                $_SESSION[$this->prefix.'pass'] = $this->pass;
                        }
                        
                        //if forced log in
                        elseif(isset($_GET['action']) && $_GET['action'] == "prompt"){
                                session_unset();
                                session_destroy();
                                
                                if(!empty($_COOKIE[$this->prefix.'user'])) setcookie($this->prefix."user", "blanked", time()-(3600*25));
                                if(!empty($_COOKIE[$this->prefix.'pass'])) setcookie($this->prefix."pass", "blanked", time()-(3600*25));
                                
                                $this->prompt();
                        }
                        
                        
                        elseif(isset($_GET['action']) && $_GET['action'] == "clear_login"){
                                session_unset();
                                session_destroy();
                                
                                if(!empty($_COOKIE[$this->prefix.'user'])) setcookie($this->prefix."user", "blanked", time()-(3600*25));
                                if(!empty($_COOKIE[$this->prefix.'pass'])) setcookie($this->prefix."pass", "blanked", time()-(3600*25));
                                
                                $msg = '<h2 class="msg">**Logout complete**</h2>';
                                $this->prompt($msg);
                        }
                        
                        //prompt for
                        elseif(!isset($_SESSION[$this->prefix.'pass']) || !isset($_SESSION[$this->prefix.'user'])){
                                $this->prompt();
                        }
                        
                        //check the pw
                        else{
                                $this->user = $_SESSION[$this->prefix.'user'];
                                $this->pass = $_SESSION[$this->prefix.'pass'];
                                $this->check();//dies if incorrect
                        }
                        
                }#-#authorize()
                
                
                
                function check(){
                        
                        if(md5($this->prefix . LOGIN_PASS) != $this->pass || LOGIN_USER != $this->user){
                                //destroy any existing cookie by setting time in past
                                if(!empty($_COOKIE[$this->prefix.'user'])) setcookie($this->prefix."user", "blanked", time()-(3600*25));
                                if(!empty($_COOKIE[$this->prefix.'pass'])) setcookie($this->prefix."pass", "blanked", time()-(3600*25));
                                session_unset();
                                session_destroy();
                                
                                $msg='<h2 class="warn">Incorrect username or password</h2>';
                                $this->prompt($msg);
                        }
                }#-#check()
                
                
                
                function prompt($msg=''){
                ?>
                <html><head>
                        <title>Login</title>
                        <style>
                                body{margin:15px;}
                                table.login{border-collapse:collapse;}
                                table.login td{font:bold 10pt verdana;color:#f0cb01;border:1px #535353 solid;border-collapse:collapse;padding:2px 3px;text-align:center;background:#576c11;}
                                table.login td.header{background: URL(http://www.athenahealth.com/_img/boxes/carousel_bg.png);}
                                .msg{font:bold 120% verdana;text-align:center;color:#f0cb01;}
                                .warn{font:bold 120% verdana;text-align:center;color:#f0cb01;}
                        </style>
                 
                        </head><body>
                        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" target="foo" onSubmit="window.open('', 'foo', 'width=1040,height=900,status=yes,resizable=yes,scrollbars=yes'); document.location='success.php'">
                                <input type="hidden" name="action" value="set_login">
                                
                                <?php echo $msg; ?>
                                
                                <table align="center" width="300" class="login">
                                        <tr><td class="header" colspan="2">Enter Login Info</td></tr>
                                        <tr>
                                                <td class="desc"><label for="user">Username:</label> <input type="text" name="user" id="user"></td>
                                                <td class="desc"><label for="pass">Password:</label> <input type="password" name="pass" id="pass"></td>
                                        </tr>
                                        
                                        <tr><td class="desc" colspan="2" style="text-align:left;">
                                                <input type="checkbox" name="remember" id="remember"> <label for="remember">Remember me on this computer</label>
                                        </td></tr>
                                        
                                        <tr><td class="desc" colspan="2" style="text-align:right;"><input type="submit" value="Login" target=_blank action="http://URL at mailchimp subscriber URL.com" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank"
                                        onclick=window.open(google.html,'','scrollbars=no,menubar=no,height=600,width=800,resizable=yes,toolbar=no,status=no');
                                        >
                                </td></tr>
                                <center> See me for admin password.
                                </table>
                                
                </form>
                </body></html>
                <?php
                        
                        exit;
                }
                
                
}



?>                                                  