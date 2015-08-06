<?php
        
        session_start(); // start session cookies
        require("Login.class.php"); // pull in file
        $login = new Login; // create object login
        
        $login->authorize(); // make user login
        ?>
<!--
        =================================================================================================
        Copyright (c) 2012 Athena Health. 
        This software is the proprietary information of Athena Health
        All Right Reserved.
        Repository path:    $HeadURL$
        Last committed:     $Revision: 45 $
        Last changed by:    $Author: davidjmorin@gmail.com $
        Last changed date:    $Date: 2012-07-02 21:10:12 -0400 (Mon, 02 Jul 2012) $
        ID:            $Id: index.php 45 2012-07-03 01:10:12Z davidjmorin@gmail.com $
        =================================================================================================
-->

<head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>

<style type="text/css">
        body {background-color:#42520e; color: #f0cb01;
        
        }
        th {background: URL(http://www.athenahealth.com/_img/boxes/carousel_bg.png);}
        p {color:blue;}
        a:link {color: #f0cb01; text-decoration: underline; }
        a:active {color: #f0cb01; text-decoration: underline; }
        a:visited {color: #f0cb01; text-decoration: underline; }
        a:hover {color: #f0cb01; text-decoration: none; }
</style>


<?php
		$retail=$_REQUEST['retail'];
		$id=$_REQUEST['id'];
        $name=$_REQUEST['name'];
        $upc=$_REQUEST['upc'];
        $ounces=$_REQUEST['ounces'];
		
		
        define("HOST", "localhost");
        
        $retail=$_REQUEST['retail'];
		$id=$_REQUEST['id'];
        $name=$_REQUEST['name'];
        $upc=$_REQUEST['upc'];
        $ounces=$_REQUEST['ounces'];
        
        
 include 'config.php';
        
        ############## Make the mysql connection ###########
        
        $conn = mysql_connect(HOST, DBUSER, PASS) or  die('Could not connect !<br />Please contact the site\'s administrator.');
        
        $db = mysql_select_db(DB) or  die('Could not connect to database !<br />Please contact the site\'s administrator.');
        
        mysql_query("UPDATE products SET UPC='$upc', Suggested_Retail='$retail',Name='$name', Item_Ounces='$ounces' WHERE UPC='$upc' ") or die (mysql_error());  
?>
<table>
        <tr><td valign="top"><br /><br />
        <td>    
                <table>  <tr><b>Data Updated Successfully</b></tr>       
                        <tr><td>  Product #:  </td><td><? echo $id; ?><br></td></tr>
                        <tr><td> Description: </td><td><? echo $name; ?><br></td></tr>
                        <tr><td> UPC:</td><td><?php echo $upc; ?><br> </td></tr>
                        <tr><td> Retail $: </td><td><? echo $retail; ?></td></tr>
						<tr><td> Ounces: </td><td><? echo $ounces; ?></td></tr>
                        
                </table>
        </form>
        </td></tr>
</table>

<a href="./">Go Back</a>
