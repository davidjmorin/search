
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




         include '../config/config.php';

        
        
        ############## Make the mysql connection ###########
        try {
                $db = new PDO("mysql:host=$hostname;dbname=SnyderLanceSku", $username, $password);            
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                
                $block1 = "block 1";
                $block2 = "block 3";
                $block3 = "block 1";
                $i_d = $_POST['value'];
                
				
				
				////Inserts Search Data////////
                $sql = "INSERT INTO `keyword` (`keyword`)
                VALUES('".$_POST['value']."')";
                /////////END///////////////////
				
				
                
                ////////This is the main table for keywords//////////
                
                $count = $db->exec($sql);
                $sql = "Select * from products WHERE Name LIKE '%" . $i_d . "%' OR UPC LIKE '%" . $i_d . "%'  ";
                $result = $db->query($sql);
                echo "<table id='products' width='400px'>";
				echo'<tr id="top" style="background-color:#fff111"> ';
				echo"<td>Product #</td>";
				echo"<td id='name'>Name</td>";
				echo"<td>Image</td>";
				//echo"<td>UPC</td>";
				echo"<td>Retail Price</td>";
				echo"<td>Ounces</td>";
				echo"<td>Case Count</td>";
					echo"<td>UPC</td>";
				//echo"<td>Retail Price</td>";
                foreach ($result as $data) {
                        echo ' 
                        <tr style="background-color:#690b06;"> 
                        <td id="key">'.$data["Product_sku"].'</td> 
                        <td id="name"><a target="_blank" href="http://www.upcindex.com/'.$data["UPC"].'">'.$data["Name"].'</td> 
						
						
                       <td id="bl">
					   
		<img src="http://morinandsons.com/search/images/'.$data["Name"].'.jpg" width="50" height="65" class="image">
					   
					   </td>
					   
					   
					  
					   
						<td id="case">'.$data["Suggested_Retail"].'</td> 
						<td id="ounces">'.$data["Item_Ounces"].'</td> 
                        <td id="retail">'.$data["Case_Pack"].'</td>
						  <td id="name"><a target="_blank" href="https://itemmaster.com/search_field:'.$data["UPC"].'">'.$data["UPC"].'</td> 
						  <td align="center" bgcolor="#006600"><a href="delete.php?id='.$data["keyword"].'" onclick="return confirm(\'This action cannot be reversed. Are you sure you want to delete?\')">Delete</a></td>
                          <td align="center" bgcolor="#006600"><a href="update.php?id='.$data["Product_sku"].'&name='.$data["Name"].'&retail='.$data["Suggested_Retail"].'&ounces='.$data["Item_Ounces"].'&upc='.$data["UPC"].' ">update</a></td>';
                    
                        
                        
                }
                echo "</tr></table>";
                //echo 'entry succesfull';
                $db = null; // close the database connection
                
        }
        catch(PDOException $e) {
                echo $e->getMessage();
        }
        
        ///////// END MAIN TABLE/////////////////////////       
?>