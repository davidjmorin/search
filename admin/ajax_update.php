<script type="text/javascript"> 
function changeValue(){ 
    var option=document.getElementById('block').value; 
 
    if(option=="1"){ 
            document.getElementById('a').value="18005551212"; 
                        document.getElementById('b').value="PW"; 
    } 
        else if(option=="2"){ 
            document.getElementById('a').value="5551212"; 
                        document.getElementById('b').value="Collector"; 
        } 
        if(option=="3"){ 
            document.getElementById('a').value="3"; 
                        document.getElementById('b').value="3"; 
        } 
                
                else if(option=="4"){ 
            document.getElementById('a').value="4"; 
                        document.getElementById('b').value="4"; 
        } 
 
} 
</script> 
<form method="post">
<table>  <tr><b>Add new data using form below</b></tr>       
 <tr><td>  Keyword:  </td><td> <input type="text" name="keyword" id="keyword"><br></td></tr>
        <tr><td> Block?: </td><td><select name="block" id="block" onchange="changeValue();"> 
        <option id="block1" value="1">Block 1</option>
  <option id="block2" value="2">Block 2</option>
  <option id="block3" value="3">Block 3 </option>
  <option id="block4" value="4">Block 4</option>
  <option id="block5" value="5">Block 5</option>
</select><br></td></tr>
        <tr><td> Phone #:</td><td> <input type="text" name="phone" id="a"><br></td></tr>
        <tr><td> Reason: </td><td> <input type="text" name="reason" id="b"><br></td></tr>
      <tr><td> </td><td align="left"> <input type="submit" name="submit" value="Submit Data"></td></tr>
                </table>
          </form>