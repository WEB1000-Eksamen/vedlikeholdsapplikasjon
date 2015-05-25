<?php
    require_once("top.html");
    require_once("php/constants.php");
?> 
  <div id="FinnBooking">
    <div id="FinnBookingHeading">
<h3>Velg Booking</h3>
     </div>
<form method="post" action="endre-Booking.php" id="endreBookingSkjema" name="endreBookingSkjema">
        <?php require_once("listeboks-klassekode.php"); ?>  
    <div id="FinnBookingHeadingKnapp">
    <input type="submit"  value="Finn Booking" name="finnBookingKnapp" id="finnBookingKnapp"> 
    </div>
</form>
  </div>



<?php
    @$finnBookingKnapp=$_POST ["finnBookingKnapp"];
    if ($finnBookingKnapp)
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
                    
                   
                    print ("<form method='post' action='endre-booking.php' id='endreBookingSkjema' name='endreBookingSkjema'>");
                    print ("<h3>Booking ID</h3>");
                    print ("<input type='text' value='$klassekode' name='klassekode' id='klassekode' readonly /> <br />");
                    
                    print ("<h3>RomID</h3>");
                    print ("<input type='text' value='$klassenavn' name='SengerEndre' id='SengerEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");
                    
                    print ("<h3>Til Dato</h3>");
                    print ("<input type='text' value='$klassenavn' name='RomTypeEndre' id='RomTypeEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");
                    
                    print ("<h3>Fra Dato</h3>");
                    print ("<input type='text' value='$klassenavn' name='PrisEndre' id='PrisEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");
                
                    print ("<input type='submit' value='Endre booking' name='EndreRomKnapp' id='EndreRomKnapp'> <input type='submit' value='Slett booking' name='SlettBookingKnapp' id='SlettBookingKnapp'>");
                    print ("</form>");
                }
        }
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
   @$slettKlasseKnapp=$_POST ["slettKlasseKnapp"];
    if ($slettKlasseKnapp)
        {
            $klassekode=$_POST ["klassekode"];
            $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode'";
            mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette data i databasen");  /* SQL-setning sendt til database-serveren */
            print ("Følgende Klasse er nå slettet: $klassekode <br />");
            print ("<script type='text/javascript'>
                        window.setTimeout(function () {
                            window.location.href = window.location.href;
                        }, 500);
                    </script>");
              }
    require_once("footer.html");
?> 