<head>
        <style type="text/css">
                body {background-color:#42520e;}
                th {background: URL(http://www.athenahealth.com/_img/boxes/carousel_bg.png);}
                p {color:blue;}
                
        </style>
</head>

<?php

        
        include '../config/config.php';
        echo "<hr>";
        //$query = mysql_query(" SELECT * FROM athena WHERE keyword='".$_POST['value']."' ");
        $query = mysql_query("SELECT * FROM athena WHERE keyword LIKE '%" . $_POST['value'] . "%' ORDER BY block");
        
        echo "<table border='.5' color='#fff' width='1024px'>
        <tr>
        <th bgcolor='#42520e' style='font-size:18px; color:#fff;'>Keyword</th>
        <th bgcolor='#42520e'style='font-size:18px; color:#fff;'>block</th>
        <th bgcolor='#42520e'style='font-size:18px; color:#fff;'>Phone #</th>
        <th bgcolor='#42520e'style='font-size:18px; color:#fff;'>Reason</th>
        
        </tr>";
        
        while ($data = mysql_fetch_array($query)) {
                
                echo '
                <tr style="background-color:#576c11;">
        <td style="font-size:18px; color:#f0cb01;">'.$data["keyword"].'</td>
        <td style="font-size:18px;color:#f0cb01;">'.$data["block"].'</td>
        <td style="font-size:18px;color:#f0cb01;">'.$data["phone"].'</td>
                <td style="font-size:18px;color:#f0cb01;">'.$data["Reason"].'</td>
                <td align="center" bgcolor="#006600"><a href="delete.php?id='.$data["keyword"].'" onclick="return confirm(\'This action cannot be reversed. Are you sure you want to delete?\')">Delete</a></td>
                <td align="center" bgcolor="#006600"><a href="update.php?id='.$data["keyword"].'&bl='.$data["block"].'&ph='.$data["phone"].'&re='.$data["Reason"].'&key='.$data["id"].' ">update</a></td>
                
                
                
                </tr>';
                
        }
        
echo '</table>';

?>