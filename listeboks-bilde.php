<?php
    require_once("php/connect.php");
    $sqlSetning="SELECT * FROM images ORDER BY ImageID;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen"); 
    $antallRader=mysqli_num_rows($sqlResultat); 
    print("<select name='ImageID' id='ImageID'>");
    print("<option value='-1'>-----------------------------------</option>");
    for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat); 
            $ImageID=$rad["ImageID"]; 
            $$URL=$rad["$URL"]; 
            
            if ($ImageID==$ImageIDedit)
                {
                    print("<option value='$ImageID' selected>$ImageID $URL </option>"); 
                } 
            else
                {
                   print("<option value='$ImageID'>$ImageID $URL </option>");
                }   
        }
       print("</select>"); 
?>