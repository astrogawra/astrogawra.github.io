<HTML>
<?
foreach($_GET as $key=>$val)$$key=$val;
foreach($_POST as $key=>$val)$$key=$val;
foreach($_COOKIE as $key=>$val)$$key=$val;
foreach($_FILES as $key=>$val)$$key=$val;
?>
  <HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-2">
    <TITLE>Asystent Wychowawcy - by Jarosław Stańko</TITLE>
        <STYLE>
      h1 {font-family: Book Antiqua, Helvetica, sans-serif; font-variant: small-caps ;font-size: 20pt;color:blue}
      h2 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 10pt}
      p {font-family: Arial, Helvetica, sans-serif; font-size: 9pt; color:red}
    </STYLE>
  </HEAD>
  <BODY background="images/back.gif">
  <img src="images/logo.gif" alt="Jerry" align="left" border=4 height=55 width=70><br><br><br><center>
  <h2>Użytkownik systemu:</h2><h1><?$login?></h1>
  <?
       $user_db='jarstan';
       $pass_db='alfik';
       
         mysql_connect ("localhost", "$user_db", "$pass_db") or 
        die ("Nie można połączyć się z MySQL");
      mysql_select_db ("szkola2") or 
        die ("Nie można połączyć się z bazą szkola2");      
        
       if($dzialanie=='zmien'){
          $query = "UPDATE info SET id='$id',kat='$kat',sem='$sem',opis='$opis' where lp='$lp';";
           $wynik = mysql_query ($query);
              print"<center><h1>Zmieniono informacje o uczniu : $nazw   $imie -  $sem</h1>";     
                      print "<table border=1 width=100% cellpadding=5 align=center bgcolor=#BED4E4>
                      <tr> <td align=center>  $opis  </td><td align=center>
                         <form action=info_edytuj.php method=post target=ramka3> 
                       <input type=hidden name=dzialanie value='Edytuj'>
                         <input type=hidden name=id value='$id'>  
                          <input type=hidden name=nazw value=$nazw> 
                           <input type=hidden name=imie value=$imie> 
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo> 
                           <input type=submit value='Edytuj'>  
                            <input type=hidden name=sem value=$sem>         
                            </form>
                      </td></tr> </table>";           
     
                       } 
       
         elseif($dzialanie=='Edytuj')
        {
            
          $wynik = mysql_query ("SELECT * FROM info  WHERE id='$id' and sem='$sem' ;") or 
        die ("błąd w pytaniu");    
        
          $rekord = mysql_fetch_array ($wynik);
                       $lp=$rekord[0];          
                       $opis=$rekord[4];
          print"<center><h1>Informacja o uczniu : $nazw   $imie -  $sem</h1>";    
       print " <form action=info_edytuj.php method=post target=ramka3>         
                       <table border=1 width=100% cellpadding=5 align=center bgcolor=#BED4E4>
                      <tr> <TD align=center> <textarea name=opis rows=8 cols=60>$opis</textarea></TD>
                      <td align=center>       
                      <input type=hidden name=lp value=$lp>                               
                           <input type=hidden name=id value=$id>  
                           <input type=hidden name=dzialanie value='zmien'>
                            <input type=hidden name=nazw value=$nazw> 
                           <input type=hidden name=imie value=$imie> 
                            <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>  
                            <input type=hidden name=sem value=$sem>                  
                            <input type=submit value='Zmień'>
                             </form>
                      </td></tr> </table>";
                  }
                elseif($dzialanie=='wstaw'){
                      $query="INSERT INTO info (lp,id,kat,sem,opis) VALUES ('','$id','','$sem','$opis')";
                       $wynik=mysql_query($query);
                       
                      print"<center><h1>Dodano informacje o uczniu : $nazw   $imie -  $sem</h1>";     
                      print "<table border=1 width=100% cellpadding=5 align=center bgcolor=#BED4E4>
                      <tr> <td align=center>  $opis  </td><td align=center>
                         <form action=info_edytuj.php method=post target=ramka3> 
                       <input type=hidden name=dzialanie value='zmien'>
                         <input type=hidden name=id value='$id'>  
                         <input type=hidden name=sem value=$sem>      
                          <input type=hidden name=nazw value=$nazw> 
                           <input type=hidden name=imie value=$imie> 
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo> 
                           <input type=submit value='Edytuj'>  
                               
                            </form>
                      </td></tr> </table>";
                    }
  
       elseif($dzialanie=='Dodaj')
        {
            
        
          print"<center><h1>Informacja o uczniu : $nazw   $imie -  $sem</h1>";    
       print " <form action=info_edytuj.php method=post target=ramka3>         
                       <table border=1 width=100% cellpadding=5 align=center bgcolor=#BED4E4>
                      <tr> <TD align=center> <textarea name=opis rows=8 cols=60></textarea></TD>
                      <td align=center>                                      
                           <input type=hidden name=id value=$id>  
                           <input type=hidden name=dzialanie value='wstaw'>
                            <input type=hidden name=nazw value=$nazw> 
                           <input type=hidden name=imie value=$imie> 
                            <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>  
                            <input type=hidden name=sem value=$sem>                  
                            <input type=submit value='Zapisz'>
                             </form>
                      </td></tr> </table>";
        
        
        
        
        }
        
          ?>

  </BODY>
</HTML> 
