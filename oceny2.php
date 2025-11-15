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
        
     $wynik = mysql_query ("SELECT * FROM klasy WHERE wych='$login';") or 
        die ("błąd w pytaniu");
                 $rekord = mysql_fetch_array ($wynik);
                     $rocznik=$rekord[1];
                     $id_k=$rekord[2];
                     $haslo=$rekord[4];
        
       $wynik = mysql_query ("SELECT * FROM uczen WHERE rocznik='$rocznik';") or 
        die ("błąd w pytaniu");    
       print"<center><h1>Lista Uczniów Klasy : $id_k - $rocznik</h1>";    
       print "<TABLE width=100% CELLPADDING=5 BORDER=1>";
      print "<TR align=center bgcolor=#27C8FD><TD><B>ID</B></TD><TD><B>Nazwisko</B></TD>";
      print "<TD><B>Imię</B></TD><th >Semestr1</th><th >Semestr2</th><th>Oceń Ucznia</th></TR>\n";

      while ($rekord = mysql_fetch_array ($wynik)) 
                              {
        $id= $rekord[0];
        $nazw = $rekord[1];
        $imie = $rekord[2];
        $adres = $rekord[3];
        $miasto = $rekord[4];
        $data_ur = $rekord[5];
        $rocznik=$rekord[6];

        print "<TR align=center bgcolor=#E3F8EA><TD>$id</TD><TD><h2>$nazw</h2></TD><TD>$imie</TD><TD>";
                            print "<form action=info_pokaz.php method=post target=ramka3>                         
                           <input type=hidden name=id value='$id'>  
                           <input type=hidden name=sem value='sem1'>
                             <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>               
                            <input type=submit value='Pokaż Info'>
                             </form></td><td>";
                             print "<form action=info_pokaz.php method=post target=ramka3>                         
                           <input type=hidden name=id value='$id'>  
                           <input type=hidden name=sem value='sem2'>
                             <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>               
                            <input type=submit value='Pokaż Info'>
                             </form></td>";
                              print "<td><form action=oceny_b.php method=post target=_top>    
                               <input type=hidden name=rocznik value='$rocznik'>                     
                              <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>     
                             <input type=hidden name=id value='$id'>  
                              <input type=submit value='Ocena'>
                             </form></td>
                        </tr>";
         
                     }
                               print "</TABLE>"; 
   ?>

  </BODY>
</HTML> 
        
