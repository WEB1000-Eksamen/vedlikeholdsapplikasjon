<?php
    require_once("top.html");
    require_once("php/constants.php");
?> 
  <div id="FinnBooking">
    <div id="FinnBookingHeading">
<h3>Velg hva du skal registrere</h3>
     </div>
<form method="post" action="RegistrerHotellsPremium.php" id="finnBookingSkjema" name="finnBookingSkjema">
        <?php require_once("listeboks-klassekode.php"); ?>  
    <div id="FinnBookingHeadingKnapp">
    <input type="submit"  value="Registrer nytt hotell" name="RegistrerNyttHotellKnapp" id="RegistrerNyttHotellKnapp">
    <input type="submit"  value="Registrer ny romtype" name="RegistrerNyRomtypeKnapp" id="RegistrerNyRomtypeKnapp">
     <input type="submit"  value="Registrer nytt land" name="RegistrerNyttLandKnapp" id="RegistrerNyttLandKnapp">
     <input type="submit"  value="Registrer rom" name="RegistrerNyttromKnapp" id="RegistrerNyttromKnapp">    
    </div>
</form>
  </div>



<?php

/*Hotell registrering */ /*Hotell registrering */ /*Hotell registrering */ /*Hotell registrering */ /*Hotell registrering */ /*Hotell registrering */ /*Hotell registrering */
    @$RegistrerNyttHotellKnapp=$_POST ["RegistrerNyttHotellKnapp"];
    if ($RegistrerNyttHotellKnapp)
        {
            $klassekode=$_POST ["klassekode"];  
            $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
            $antallRader=mysqli_num_rows($sqlResultat);  
            if ($antallRader==0)
                {
                    print ("Angitt klasse er ikke registrert <br />");      
                }
            else
                {
                    $rad=mysqli_fetch_array($sqlResultat);  
                    $klassekode=$rad["klassekode"];      
                    $klassenavn=$rad["klassenavn"];   
                    
                   
                    print ("<form method='post' action='RegistrerHotellsPremium.php' id='endreBookingSkjema' name='endreBookingSkjema'>");
                    print ("<h3>-------------------------------------------------------------------------------------------------</h3>");
                    print ("<h3>Hotell ID</h3>");
                    print ("<input type='text' value='$klassekode' name='klassekode' id='klassekode' readonly /> <br />");
                    
                    print ("<h3>Land ID</h3>");
                    print ("<input type='text' value='$klassenavn' name='SengerEndre' id='SengerEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");
                    
                    print ("<h3>Beskrivelse</h3>");
                    print ("<input type='text' value='$klassenavn' name='RomTypeEndre' id='RomTypeEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");
                    
                    print ("<h3>Adresse</h3>");
                    print ("<input type='text' value='$klassenavn' name='PrisEndre' id='PrisEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");

                    print ("<h3>Bilde ID</h3>");
                    print("<select name='BildeIdRegistrer' id='BildeIdRegistrer'>"); 
                        for ($r=1;$r<=$antallRader;$r++)
                        {
                          $rad=mysqli_fetch_array($sqlResultat); 
                          $brukernavn=$rad["brukernavn"]; 
                          $fornavn=$rad["fornavn"];  
                          $etternavn=$rad["etternavn"]; 
                          $klassekode=$rad["klassekode"]; 
                        print("<option value='$brukernavn'>$brukernavn $fornavn $etternavn $klassekode </option>"); 
                        }
                        print("</select> <br />"); 
                
    
                    print ("<input type='submit' value='Registrer' name='EndreRomKnapp' id='EndreRomKnapp'>");
                    print ("</form>");
                }
        }

/* //Hotell registrering slutt */ /* //Hotell registrering slutt */ /* //Hotell registrering slutt */ /* //Hotell registrering slutt */ /* //Hotell registreringslutt */ 

/* Ny Romtype Registrer*/ /* Ny Romtype Registrer*/ /* Ny Romtype Registrer*/ /* Ny Romtype Registrer*/ /* Ny Romtype Registrer*/ /* Ny Romtype Registrer*/ /* Ny Romtype Registrer*/
@$RegistrerNyRomtypeKnapp=$_POST ["RegistrerNyRomtypeKnapp"];
    if ($RegistrerNyRomtypeKnapp)
        {
            $klassekode=$_POST ["klassekode"];  
            $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
            $antallRader=mysqli_num_rows($sqlResultat);  
            if ($antallRader==0)
                {
                    print ("Angitt klasse er ikke registrert <br />");      
                }
            else
                {
                    $rad=mysqli_fetch_array($sqlResultat);  
                    $klassekode=$rad["klassekode"];      
                    $klassenavn=$rad["klassenavn"];   
                    
                   
                    print ("<form method='post' action='RegistrerHotellsPremium.php' id='endreBookingSkjema' name='endreBookingSkjema'>");
                    print ("<h3>-------------------------------------------------------------------------------------------------</h3>");
                    print ("<h3>Romtype ID</h3>");
                    print ("<input type='text' value='$klassekode' name='klassekode' id='klassekode' readonly /> <br />");
                    
                    print ("<h3>Romtype navn</h3>");
                    print ("<input type='text' value='$klassenavn' name='SengerEndre' id='SengerEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");

                    print ("<input type='submit' value='Registrer' name='EndreRomKnapp' id='EndreRomKnapp'>");
                    print ("</form>");
                }
        }

/* /Slutt Ny Romtype Registrer*/ /* /Slutt Ny Romtype Registrer*/  /* /Slutt Ny Romtype Registrer*/  /* /Slutt Ny Romtype Registrer*/  /* /Slutt Ny Romtype Registrer*/ 

/* Nytt land Registrer*/ /* Nytt land Registrer*/ /* Nytt land Registrer*/ /* Nytt land Registrer*/ /* Nytt land Registrer*/ /* Nytt land Registrer*/ /* Nytt land Registrer*/
@$RegistrerNyttLandKnapp=$_POST ["RegistrerNyttLandKnapp"];
    if ($RegistrerNyttLandKnapp)
        {
            $klassekode=$_POST ["klassekode"];  
            $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
            $antallRader=mysqli_num_rows($sqlResultat);  
            if ($antallRader==0)
                {
                    print ("Angitt klasse er ikke registrert <br />");      
                }
            else
                {
                    $rad=mysqli_fetch_array($sqlResultat);  
                    $klassekode=$rad["klassekode"];      
                    $klassenavn=$rad["klassenavn"];   
                    
                   
                    print ("<form method='post' action='RegistrerHotellsPremium.php' id='endreBookingSkjema' name='endreBookingSkjema'>");
                    print ("<h3>-------------------------------------------------------------------------------------------------</h3>");
                    print ("<h3>Land ID</h3>");
                    print ("<input type='text' value='$klassekode' name='klassekode' id='klassekode' readonly /> <br />");
                    
                    print ("<h3>Navn</h3>");
                    print ("<input type='text' value='$klassenavn' name='SengerEndre' id='SengerEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");

                    print ("<input type='submit' value='Registrer' name='EndreRomKnapp' id='EndreRomKnapp'>");
                    print ("</form>");
                }
        }

/* /Slutt Nytt land Registrer*/ /* /Slutt Nytt land Registrer*/ /* /Slutt Nytt land Registrer*/ /* /Slutt Nytt land Registrer*/ /* /Slutt Nytt land Registrer*/ 


@$RegistrerNyttromKnapp=$_POST ["RegistrerNyttromKnapp"];
    if ($RegistrerNyttromKnapp)
        {
            
                  
                    
                   
                    print ("<form method='post' action='RegistrerHotellsPremium.php' id='endreBookingSkjema' name='endreBookingSkjema'>");
                    print ("<h3>-------------------------------------------------------------------------------------------------</h3>");
                    print ("<h3>ID</h3>");
                    print ("<input type='text' value='Rom ID' name='klassekode' id='klassekode' readonly /> <br />");
                    
                    print ("<h3>Type</h3>");
                    print ("<input type='text' value='Navn' name='SengerEndre' id='SengerEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");

                    print ("<h3>Hotell</h3>");
                    print ("<input type='text' value='Hotell ID' name='SengerEndre' id='SengerEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");

                    print ("<input type='submit' value='Registrer' name='EndreRomKnapp' id='EndreRomKnapp'>");
                    print ("</form>");
                
        }







/* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */ /* Registrerings knapp */

    @$endreKlasseKnapp=$_POST ["endreKlasseKnapp"];
    if ($endreKlasseKnapp)
        {
            $klassekode=$_POST ["klassekode"];
            $klassenavn=$_POST ["klassenavn"];   
            if (!$klassekode || !$klassenavn)
                {
                    print ("Alle felt må fylles ut");    /* melding skrevet */
                }
            else
                {
                    $sqlSetning="UPDATE klasse SET klassenavn='$klassenavn' WHERE klassekode='$klassekode';";
                    mysqli_query($db,$sqlSetning) or die ("ikke mulig å endre data i databasen");
                    print ("Klassen med klassekode $klassekode er nå endret<br />");
                }
        }

        @$EndreRomKnapp=$_POST ["EndreRomKnapp"];
    if ($EndreRomKnapp)    
        {           
            $brukernavn=$_POST ["brukernavn"]; 
            $fornavn=$_POST ["fornavn"];
            $etternavn=$_POST ["etternavn"];  
            $klassekode=$_POST ["klassekode"];  
            $bildenr=$_POST ["bildenr"];
              
           
            if (!$brukernavn || !$fornavn || !$etternavn)
                {
                    print ("Alle felt må fylles ut");  
                }
            else
                {
                    $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
                    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
                    $antallRader=mysqli_num_rows($sqlResultat); 
                    if ($antallRader!=0)  
                        {
                            print ("Studenten er registrert fra før");
                        }
                    elseif ($bildenr==="-1") {
                         $sqlSetning="INSERT INTO student (brukernavn,fornavn,etternavn,klassekode) VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
                           mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere data i databasen");
                           print ("Følgende student er nå registrert: $brukernavn $fornavn $etternavn $klassekode"); 
                    }
                    else
                        {
                           $sqlSetning="INSERT INTO student (brukernavn,fornavn,etternavn,klassekode, bildenr) VALUES('$brukernavn','$fornavn','$etternavn','$klassekode', '$bildenr');";
                           mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere data i databasen");
                           print ("Følgende student er nå registrert: $brukernavn $fornavn $etternavn $klassekode"); 
                        }
                }
        }


 /* //Slutt Registrerings knapp */ /* //Slutt Registrerings knapp */ /* //Slutt Registrerings knapp */   /* //Slutt Registrerings knapp */   /* //Slutt Registrerings knapp */
    require_once("footer.html");
?> 