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
    <?
       $user_db='jarstan';
       $pass_db='alfik';
      
         mysql_connect ("localhost", "$user_db", "$pass_db") or 
        die ("Nie można połączyć się z MySQL");
      mysql_select_db ("szkola2") or 
        die ("Nie można połączyć się z bazą szkola2");      
        
          if($dzialanie=='wstaw'){
                      $query="INSERT INTO info2 (lp,rocznik,kiedy,kto,opis) VALUES ('','$rocznik',now(),'$login','$opis')";
                       $wynik=mysql_query($query);
                      }
               if($dzialanie=='zmien'){
                  $query = "UPDATE info2 SET rocznik='$rocznik',kiedy='$kiedy',kto='$login',opis='$opis' where lp='$nr';";
                   $wynik = mysql_query ($query);
                        }
     $wynik = mysql_query ("SELECT * FROM klasy WHERE id_kl='$id_k';") or 
        die ("błąd w pytaniu");
                 $rekord = mysql_fetch_array ($wynik);
                     $rocznik=$rekord[1];
        
       $wynik = mysql_query ("SELECT * FROM info2 WHERE rocznik='$rocznik';") or 
        die ("błąd w pytaniu");    
          print "<center><br><form action=info_k3.php method=post target=ramka3>                         
                           <input type=hidden name=rocznik value='$rocznik'>  
                           <input type=hidden name=id_k value='$id_k'>
                             <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>               
                            <input type=submit value='Nowy Wpis'>
                             </form>";
       print"<h1>Informacje o klasie: : $id_k - $rocznik</h1>";    
       print "<TABLE width=100% CELLPADDING=5 BORDER=1>";
      print "<TR align=center bgcolor=#27C8FD><TD><B>Lp</B></TD><TD><B>Data wpisania</B></TD>";
      print "<TD><B>Twórca Wpisu</B></TD><th >Informacja</th><td></td></TR>\n";
       
      while ($rekord = mysql_fetch_array ($wynik)) 
                              {
        $nr= $rekord[0];
        $kiedy = $rekord[2];
        $kto = $rekord[3];
        $opis = $rekord[4];
     
        print "<TR align=center bgcolor=#E3F8EA><TD>$nr</TD><TD><h2>$kiedy</h2></TD><TD>$kto</TD><td>$opis</td><TD>";
                            
                             print "<form action=info_k3.php method=post target=ramka3>                         
                               <input type=hidden name=nr value='$nr'>
                        <input type=hidden name=rocznik value='$rocznik'>  
                           <input type=hidden name=id_k value='$id_k'>
                             <input type=hidden name=login value=$login> 
                                    
                            <input type=submit value='Edytuj'>
                             </form></td>
                        </tr>";
         
                     }
                               print "</TABLE>"; 
   ?>

  </BODY>
</HTML> 
