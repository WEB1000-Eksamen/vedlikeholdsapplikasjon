<?php
    require_once("top.html");
    require_once("php/constants.php");
?> 
  <div id="FinnBooking">
<h3>Velg hva du skal registrere</h3>
     </div>
 
  <div id="Reglinks">
     <div id="Reg1Link">
<form action="RegistrerLand.php">
    <input type="submit" value="Registrer Land" name="RegistrerNyttHotellKnapp" id="RegistrerNyttHotellKnapp">
</form>
     </div>
    
    <div id="Reg2Link">
<form action="RegistrerRom.php">
    <input type="submit" value="Registrer rom" name="RegistrerNyttHotellKnapp" id="RegistrerNyttHotellKnapp">
</form>
    </div>

   <div id="Reg3Link">
<form action="RegistrerHotell.php">
    <input type="submit" value="Registrer hotell" name="RegistrerNyttHotellKnapp" id="RegistrerNyttHotellKnapp">
</form>
   </div>
</div>
 <div id="RegLinks2">
   <div id="Reg4Link">
<form action="RegistrerRomType.php">
    <input type="submit" value="Registrer romtype" name="RegistrerNyttHotellKnapp" id="RegistrerNyttHotellKnapp">
</form>
   </div>

   <div id="Reg5Link">
<form action="RegistrerBooking.php">
    <input type="submit" value="Registrer booking" name="RegistrerNyttHotellKnapp" id="RegistrerNyttHotellKnapp">
</form>
   </div>

   <div id="Reg6Link">
<form action="RegistrerBestilling.php">
    <input type="submit" value="Registrer bestilling" name="RegistrerNyttHotellKnapp" id="RegistrerNyttHotellKnapp">
</form>
   </div>
 </div>





  <form method="post" action="RegistrerRom.php" id="endreBookingSkjema" name="endreBookingSkjema">
        
        Bestillings ID <br /> <input type="text" id="RomID" name="RomID" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" /> <br/>
        Referanse <br /> <input type="text" id="Navn" name="Navn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"/> <br/>
         <input type="submit" value="Registrer Rom" id="EndreRomKnapp" name="EndreRomKnapp" /> 
            <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />






<?php
/* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */
  @$EndreRomKnapp=$_POST ["EndreRomKnapp"];
    if ($EndreRomKnapp)    
        {           
            $RomID=$_POST ["RomID"]; 
            $Navn=$_POST ["Navn"];
            $HotellromID=$_POST ["HotellromID"];  
            $bildenr=$_POST ["bildenr"];
              
           
            if (!$RomID || !$Navn || !$HotellromID)
                {
                    print ("Alle felt må fylles ut");  
                }
            else
                {
                    $sqlSetning="SELECT * FROM student WHERE RomID='$RomID';";
                    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
                    $antallRader=mysqli_num_rows($sqlResultat); 
                    if ($antallRader!=0)  
                        {
                            print ("Studenten er registrert fra før");
                        }
                    elseif ($bildenr==="-1") {
                         $sqlSetning="INSERT INTO student (RomID,Navn,HotellromID) VALUES('$RomID','$Navn','$HotellromID');";
                           mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere data i databasen");
                           print ("Følgende student er nå registrert: $RomID $Navn $HotellromID "); 
                    }
                    else
                        {
                           $sqlSetning="INSERT INTO student (RomID,Navn,HotellromID) VALUES('$RomID','$Navn','$HotellromID');";
                           mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere data i databasen");
                           print ("Følgende student er nå registrert: $RomID $Navn $HotellromID "); 
                        }
                }
        }
 /* //Slutt Registrerings knapp */ /* //Slutt Registrerings knapp */ /* //Slutt Registrerings knapp */   /* //Slutt Registrerings knapp */   /* //Slutt Registrerings knapp */
    require_once("footer.html");
?> 