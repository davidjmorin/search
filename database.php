<head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <!--
                =================================================================================================
                Created and updated on August 2, 2015
				Repository path:    $HeadURL$
                Last committed:     $Revision: 45 $
                Last changed by:    $Author: davidjmorin@gmail.com $
                Last changed date:    $Date: 2012-07-02 21:10:12 -0400 (Mon, 02 Jul 2012) $
                ID:            $Id: index.php 45 2012-07-03 01:10:12Z davidjmorin@gmail.com $
                =================================================================================================
        --> 
		
		<?php
        include 'config/config.php';
		
?>  
        <style type="text/css">
                body {background-color:#510000;}
                th {background-color: #690b06;}
                p {color:blue;}
                table#products {
                table-layout:fixed
                width:400px;
                }
                td#key {
                border:1px solid yellow;
				font-size: 12px;
				width: 60px;
                }
                td#bl {
				color: #fff;
				font-size: 12px;
                border:1px solid yellow;
				width: 50px;
                }
                td#ph {
                border:1px solid white;
				font-size: 12px;
                }
				
				td#case {
                border:1px solid white;
				font-size: 12px;
				width: 50px;
                }
				
				td#ounces {
                border:1px solid white;
				font-size: 12px;
				width: 50px;
                }
				
				td#retail {
                border:1px solid white;
				font-size: 12px;
				width: 50px;
                }
				
				td#name {
                border:1px solid white;
                }
				
                td#reason {
                border:1px solid yellow;
                }
				
				a { 
				color: #fff;
				}
				
				tr#top{
				color: #000;
				
				}
				

        </style>
</head>

<?php




        

        
        
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
                $sql = "Select * from products WHERE Name LIKE '%" . $i_d . "%'  ";
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
				//echo"<td>Retail Price</td>";
                foreach ($result as $data) {
                        echo ' 
                        <tr style="background-color:#690b06;"> 
                        <td id="key">'.$data["Product #"].'</td> 
                        <td id="name"><a target="_blank" href="https://www.google.com/search?q='.$data["Name"].'">'.$data["Name"].'</td> 
						
						
                       <td id="bl">
					   
		<img src="http://morinandsons.com/search/images/'.$data["Name"].'.jpg" width="50" height="65" class="image">
					   
					   </td>
					   
					   
					  
					   
						<td id="case">'.$data["Suggested Retail"].'</td> 
						<td id="ounces">'.$data["Item Ounces"].'</td> 
                        <td id="retail">'.$data["Case Pack"].'</td>';
                        
                    
                        
                        
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

