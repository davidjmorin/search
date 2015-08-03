<?php
        include 'config/config.php';
		
?>  
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <!-- 
                =================================================================================================
                All Right Reserved. Ellucid Studios
                Repository path:    $HeadURL$
                Last committed:     $Revision$
                Last changed by:    $Author$
                Last changed date:    $Date$
                ID:            $Id$
                =================================================================================================
        -->
        <script src="wrap.js"></script>
                <script language=JavaScript>
                document.helpkey = 'athenaNetwork_PH.htm';      
                </script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <!--[if !IE]><!-->
        
        <link rel="stylesheet" type="text/css" href="user.css">
        <!--<![endif]-->
        <!--[if IE]>
                <link rel="stylesheet" type="text/css" href="user-IE.css" />
        <![endif]-->
        
        <!----REQUIRED FOR SCRIPT TO LOAD ON SAME PAGE WITHOUT RELOAD ----->
        
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
				

				
        </style>
        
</head>
<a href="../">Home</a><br>
<b>Snyder Lance Product Search</b>


<div class="main">

       <img src="http://www.snyderslance.com/images/logo.png">
        <table><tr><td><br />
                </td><td>Enter the Keyword and hit Send  
                <form id="lets_search" action="" name="form" method="post">
                        <input type="text" name="str" id="str"><br />
                        <input type="submit" value="Look Up" name="name" id="send"> <br><div id="more">Click below to show all products:(leave search box blank)</div><input type="submit" value="Show All" name="name" id="send">
                        
                </form>
        </td>
		<td width="20px"></td>
		<td id="information">
		    
			<b>Search Help:<br></b>
			Humpty = HD<br>
			Natures Place = NP<br>
			Hannaford= Hann<br>
			Wise = Wise<br>
			Also type in flavor such as HMO or HBW
	
		</td>
		
		</tr></table>
		
		
		
		
    </div>



	
		<div>

        <hr />
        
         <div class="most_searched">
		 Most Common Looked up item:
                <?php
                        
                        $count = mysql_query("SELECT keyword, COUNT(keyword) AS cnt
                        FROM keyword
                        GROUP BY keyword
                        HAVING (cnt > 0)
                        ORDER BY cnt DESC
                        LIMIT 5 ");
                        
                        echo "";
                        echo "<table border='.9' color='#fff'>
                        <tr id='kw'>
                        <th id='kw'>Keyword</th>
                        <th id='kw'>Count</th>
                        
                        
                        </tr>";
                        while ($data = mysql_fetch_array($count)) {
                                
                                echo "<tr id='kw'><td id='kw'>";
                                echo $data['keyword'];
                                echo "</td><td align='center'>";
                                echo $data['cnt'];
                                echo "</td></tr>";
                                
                        }
                        echo "</table>";
						
						  $count = mysql_query("delete from keyword where keyword='' ");
                        
                ?>
        </div>
        
     

        <div id="search_results"></div>
        
        <div id="output"></div>
        
</div>


<hr />


</body>                                                                         
