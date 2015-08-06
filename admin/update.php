<head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>


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
        
        
?>
Admin Panel to Update Keywords
<hr>

	<table>
			<tr><td valign="top"><br /><br />
			<td>    
					Your are editing information for Product #: <b><? echo $_REQUEST['id']; ?></b>
					<form method="post" action="update_ac.php">
							<table>         <tr><br /></tr>
									<tr><td>  Product #:  </td><td> <input type="text" name="id" id="id" value="<? echo $_REQUEST['id']; ?>">* Enter Keyword as it currently appears<br></td></tr>
									<tr><td> Name: </td><td><input type="text" name="name" id="name" value="<? echo $_REQUEST['name']; ?>">* Enter New Information<br></td></tr>
									<tr><td> Suggested Retail:</td><td> <input type="text" name="retail" id="retail" value="<? echo $_REQUEST['retail']; ?>">* New Phone Number<br></td></tr>
									<tr><td> Ounces: </td><td> <input type="text" name="ounces" id="ounces" value="<? echo $_REQUEST['ounces']; ?>">* Enter new block description here. <br></td></tr>
									<tr><td> UPC: </td><td> <input type="text" name="upc" id="upc" value="<? echo $_REQUEST['upc']; ?>">* Enter new block description here. <br></td></tr>

									<tr><td> </td><td align="left"> <input type="submit" name="submit" value="Submit Data"></td></tr>
							</table>
					</form>
			</td></tr>
	</table>                <br />
<a href="index.php">Add Keyword</a> | <a href="../admin">Back to search form</a> | 


<?php 
       echo '<pre>'; 
        print($retail); 
        echo '</pre>'; 
?> 




<a href="index.php?action=clear_login">logout</a>
</body>