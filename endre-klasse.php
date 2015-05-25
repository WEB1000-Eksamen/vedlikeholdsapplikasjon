<?php
    require_once("top.html");
    require_once("php/constants.php");
?> 
<div id="FinnEndre">
 <div id="FinnHotellListeEndre">
<h3>Velg Hotell</h3>
<form method="post" action="endre-klasse.php" id="finnKlasseSkjema" name="finnKlasseSkjema">
      
    <input type="submit"  value="Finn Hotell" name="FinnHotellKnappEndre" id="FinnHotellKnappEndre"> 
</form>
 </div>

  <div id="FinnRomEndre">
    <div id="endreKlasseh3">
<h3>Velg rom</h3>
     </div>
<form method="post" action="endre-klasse.php" id="finnKlasseSkjema" name="finnKlasseSkjema">
        <?php require_once("listeboks-klassekode.php"); ?>  
    <input type="submit"  value="Finn rom" name="finnRomKnappEndre" id="finnRomKnappEndre"> 
</form>
  </div>
</div>


<?php
    @$finnRomKnappEndre=$_POST ["finnRomKnappEndre"];
    if ($finnRomKnappEndre)
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
                   
                    print ("<form method='post' action='endre-klasse.php' id='endreKlasseSkjema' name='endreKlasseSkjema'>");
                    
                    print ("<h3>Rom nummer</h3>");
                    print ("<input type='text' value='$klassekode' name='klassekode' id='klassekode' readonly /> <input type='submit' value='Slett klasse' name='SlettRomKnappEndre' id='SlettRomKnappEndre'> <br />");
                    
                    print ("<h3>Antall Senger</h3>");
                    print ("<input type='text' value='$klassenavn' name='SengerEndre' id='SengerEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");
                    
                    print ("<h3>Rom type</h3>");
                    print ("<input type='text' value='$klassenavn' name='RomTypeEndre' id='RomTypeEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");
                    
                    print ("<h3>Pris</h3>");
                    print ("<input type='text' value='$klassenavn' name='PrisEndre' id='PrisEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");
                    

                    print ("<h3>BildeID</h3>");
                    print ("<input type='text' value='$klassenavn' name='BildeEndre' id='BildeEndre' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this) onMouseOut='musUt()' /> <br />");

                    print ("<input type='submit' value='Endre klasse' name='EndreRomKnapp' id='EndreRomKnapp'>");
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