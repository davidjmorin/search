<head>
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
				        a:link {color: #f0cb01; text-decoration: underline; }
        a:active {color: #f0cb01; text-decoration: underline; }
        a:visited {color: #f0cb01; text-decoration: underline; }
        a:hover {color: #f0cb01; text-decoration: none; }
				

				
        </style>
		
		</head>

<?php
        
        session_start(); // start session cookies
        require("Login.class.php"); // pull in file
        $login = new Login; // create object login
        
        $login->authorize(); // make user login

        $keyword = $_POST['keyword'];
        $phone = $_POST['phone'];
        $reason = $_POST['reason' ];
        $block = $_POST['blockt'];
        define("HOST", "localhost");
        
    include '../config/config.php';
        mysql_query("INSERT INTO athena (keyword, block, phone, Reason)
        VALUES ('$keyword','Block $block','$phone','$reason')");
        mysql_query("DELETE FROM athena WHERE keyword=''");
        

?>
<html>
        <head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
                <script type="text/javascript">
                        $(function() {
                                $("#loader").css({ 'background-image':'url(images/loader.gif)' });
                                $("#lets_search").bind('submit',function() {
                                        var value = $('#str').val();
                                        $.post('database.php',{value:value}, function(data){
                                                $("#search_results").html(data);
                                                $("#loader").css({ 'background-image':'url()' });
                                        });
                                        return false;
                                });
                        });
                </script>
                <link rel="stylesheet" type="text/css" href="admin.css">
                
                
                
                
        </head>
        
        
        
        
        
        
        
        <div class="wrapper">
                <div class="header">
                        
                        Admin Panel to Update Keywords
                        
                        
                        <div class="link">
                                <a href="index.php">Admin Home</a> : <a href="../index.php">User Home</a> : <a href="ola_admin.php">Update OLA</a>
                        </div>
                        
                        
                        <hr>
                </div> 
                <div class="wrapleft">    
                       <!-- <div class="left">
                                <table>
                                        <tr><td valign="top"><br /><br />
                                      <td>    
                                                <script type="text/javascript"> 
                                                        function changeValue(){ 
                                                                var option=document.getElementById('blockt').value; 
                                                                
                                                                
                                                                
                                                                if(option=="1"){ 
                                                                        document.getElementById('a').value="866-265-7922"; 
                                                                        document.getElementById('b').value="PATIENT WORKFLOW"; 
                                                                } 
                                                                else if(option=="2"){ 
                                                                        document.getElementById('a').value="1866-248-2029"; 
                                                                        document.getElementById('b').value="PRACTICE SET UP"; 
                                                                } 
                                                                if(option=="3"){ 
                                                                        document.getElementById('a').value="866-956-2526 "; 
                                                                        document.getElementById('b').value="Money Management"; 
                                                                } 
                                                                
                                                                else if(option=="4"){ 
                                                                        document.getElementById('a').value="877-912-8436"; 
                                                                        document.getElementById('b').value="ADVANCED COLLECTOR"; 
                                                                } 
                                                                
                                                                else if(option=="5"){ 
                                                                        document.getElementById('a').value="877-638-2843"; 
                                                                        document.getElementById('b').value="ADVANCED CLINICALS"; 
                                                                } 
                                                                
                                                        } 
                                                </script> 
                                                
                                                <form method="post">
                                                        <table>  <tr><b>Add new data using form below</b></tr>       
                                                                <tr><td>  Keyword:  </td><td> <input type="text" name="keyword" id="keyword"><br></td></tr>
                                                                <tr><td> Block?: </td><td><select name="blockt" id="blockt" onchange="changeValue();"> 
                                                                        <option id="" value=""></option>
                                                                        <option id="block1" value="1">Block 1</option>
                                                                        <option id="block2" value="2">Block 2</option>
                                                                        <option id="block3" value="3">Block 3 </option>
                                                                        <option id="block4" value="4">Block 4</option>
                                                                        <option id="block5" value="5">Block 5</option>
                                                                </select><br></td></tr>
                                                                <tr><td> Phone #:</td><td> <input type="text" name="phone" id="a" readonly><br></td></tr>
                                                                <tr><td> Reason: </td><td> <input type="text" name="reason" id="b" readonly><br></td></tr>
                                                                <tr><td> </td><td align="left"> <input type="submit" name="submit" value="Submit Data"></td></tr>
                                                        </table>
                                                </form>
                                        </td></tr>
                                </table>        
                        </div>-->
                </div>    
                <div class="right">
                        
                        <div class="edit"><br><br>
                                <table><tr><td><b>Edit existing keywords </b><br />Enter the Keyword to edit and hit look up  <form id="lets_search" action="" name="form">
                                        <input type="text" name="str" id="str"><br />
                                        <input type="submit" value="Look Up" name="name" id="send">
                                        
                                </form>
                                </td></tr></table>
                                
                                
                                
                                
                                
                                <!--<div class="most_searched">
                                        <?php
                                                $count = mysql_query("SELECT keyword, COUNT(keyword) AS cnt
                                                FROM keyword_athena
                                                GROUP BY keyword
                                                HAVING (cnt > 0)
                                                ORDER BY cnt DESC
                                                LIMIT 5 ");
                                                
                                                echo "<center><b><u>Top Keywords</b></u><br />";
                                                echo "<table border='.9' color='#fff'>
                                                <tr>
                                                <th bgcolor='#42520e' style='font-size:18px; color:#fff;'>Keyword</th>
                                                <th bgcolor='#42520e'style='font-size:18px; color:#fff;'>Count</th>
                                                
                                                
                                                </tr>";
                                                while ($data = mysql_fetch_array($count)) {
                                                        
                                                        echo "<tr><td align='center'>";
                                                        echo $data['keyword'];
                                                        echo "</td><td align='center'>";
                                                        echo $data['cnt'];
                                                        echo "</td></tr>";
                                                        
                                                }
                                                echo "</table>";
                                                
                                        ?>
                                </div>-->
                        </div>
                </div> 
                
        </div>
        
        

        
        
        <div class="output_results">
        
        
                
                <div id="search_results"></div>
                
                <div id="output"></div>
                
        </div>
        
        
        
        <div class="logout">
                <center>
                        <a href="index.php?action=clear_login">logout</a>
                </center>
                
        </div>
        
        
        
        
        
        
        
        
</body>