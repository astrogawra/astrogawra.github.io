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
          $id_k='2a';
         mysql_connect ("localhost", "$user_db", "$pass_db") or 
        die ("Nie można połączyć się z MySQL");
      mysql_select_db ("szkola2") or 
        die ("Nie można połączyć się z bazą as");
        
  
$wynik = mysql_query ("SELECT * FROM klasy WHERE wych='$login';") or 
        die ("błąd w pytaniu");
                 $rekord = mysql_fetch_array ($wynik);
                     $rocznik=$rekord[1];
                     $id_k=$rekord[2];
   if($dzialanie=='dodaj'){
        $query="INSERT INTO uczen (id,nazwisko,imie,adres,miasto,data,rocznik,pesel,kontakt)
                                                                         VALUES ('','$nazw','$imie','$adres','$miasto','$data_ur','$rocznik','$pesel','$kontakt')";
                                        $wynik=mysql_query($query);
                                        print"<center>Ucznia dodano do bazy";
                                         print "<form method=post>                           
                           <input type=hidden name=dzialanie value=''>
                           <input type=hidden name=rocznik value=$rocznik>    
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>              
                            <input type=submit value='Powrót'>
                             </form></center>";
                    }
        
                elseif($dzialanie=='nowy'){
                   print"<center><h1>Edycja Danych Ucznia</h1>";
                 
                         print "<FORM METHOD=post>
                <input type=hidden name=dzialanie value='dodaj'>
         <TABLE align=center border=5>
              <TR bgcolor=#FCA250>
                   <TD colspan=2 align=center><b>DANE UCZNIA</TD>
             </TR>
                    <TR BGCOLOR=#C0C0C0>
                     <TD>Nazwisko</TD> <TD> <textarea name=nazw rows=1 cols=20 >$nazw</textarea> </TD>
                       </TR>
                         <TR bgcolor=#C0C0C0>
                             <TD>Imię</TD> <TD> <textarea name=imie rows=1 cols=20 >$imie</textarea></TD>
                        </TR>
                         <TR bgcolor=#C0C0C0> 
                      <TD>Miasto</TD> <TD>  <textarea name=miasto rows=1 cols=15 >$miasto</textarea></TD>
                        </TR>
                        <TR bgcolor=#C0C0C0>
                      <TD>Adres</TD> <TD>  <textarea name=adres rows=1 cols=20 >$adres</textarea></TD>
                       </TR>
                      <TR bgcolor=#C0C0C0>
                        <TD>Data Ur.{rrrr-mm-dd}</TD> <TD> <textarea name=data_ur rows=1 cols=12>$data_ur</textarea></TD>
                        </tr><TR bgcolor=#C0C0C0>
                <TD>Pesel</TD> <TD>  <textarea name=pesel rows=1 cols=20 >$pesel</textarea></TD>
        </TR>
        <TR bgcolor=#C0C0C0>
                <TD>Kontakt {tel/e-mail}</TD> <TD>  <textarea name=kontakt rows=1 cols=20 >$kontakt</textarea></TD>
        </TR>
                        <TR bgcolor=#C0C0C0>                        
                        <TD>Rocznik</TD> <TD>  <textarea name=rocznik rows=1 cols=20 >$rocznik</textarea></TD>
                        </TR></table>
                        <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>        
                         <INPUT TYPE=submit VALUE='Akceptuj'></FORM>";     
                                       
                    
            }                   
   elseif($dzialanie=='zmien'){
          $query = "UPDATE uczen SET nazwisko='$nazw',imie='$imie',adres='$adres',miasto='$miasto',data='$data_ur',pesel='$pesel',kontakt='$kontakt'  WHERE id='$id'";
           $wynik = mysql_query ($query);
           print"<center><H1>  Zmieniono dane Ucznia : $nazw  $imie</h1>";
            print "<form method=post>                           
                           <input type=hidden name=dzialanie value=''>
                           <input type=hidden name=rocznik value=$rocznik> 
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>                 
                            <input type=submit value='Powrót'>
                             </form></center>";
                       } 
           elseIf($dzialanie=='popraw'){
                     $query = "SELECT * FROM uczen where id='$id'";
                    $wynik = mysql_query ($query);
                    $rekord = mysql_fetch_array ($wynik);
                        $id= $rekord[0];
                       $nazw = $rekord[1];
                      $imie = $rekord[2];
                     $adres = $rekord[3];
                    $miasto = $rekord[4];
                   $data_ur = $rekord[5];
                    $pesel = $rekord[7];
                     $kontakt = $rekord[8];
                      print"<center><h1>Edycja Danych Ucznia</h1>";
           
       
         print "<FORM METHOD=post>
          <input type=hidden name=dzialanie value='zmien'>
         <TABLE align=center border=5>
<TR>
<TR bgcolor=#FCA250>
        <TD colspan=2 align=center><b>DANE UCZNIA</TD>
</TR>
<TR BGCOLOR=Olive#FFFFFF>
        <TD>Nazwisko</TD> <TD> <textarea name=nazw rows=1 cols=20 >$nazw</textarea> </TD>
</TR>
<TR bgcolor=#C0C0C0>
        <TD>Imię</TD> <TD> <textarea name=imie rows=1 cols=20 >$imie</textarea></TD>
</TR>
<TR bgcolor=#C0C0C0> 
 <TD>Miasto</TD> <TD>  <textarea name=miasto rows=1 cols=15 >$miasto</textarea></TD>
</TR>
<TR bgcolor=#C0C0C0>
        <TD>Adres</TD> <TD>  <textarea name=adres rows=1 cols=20 >$adres</textarea></TD>
</TR>
<TR bgcolor=#C0C0C0>
        <TD>Data Ur.</TD> <TD> <textarea name=data_ur rows=1 cols=20 >$data_ur</textarea></TD>
</TR>
<TR bgcolor=#C0C0C0>
        <TD>Pesel</TD> <TD>  <textarea name=pesel rows=1 cols=20 >$pesel</textarea></TD>
</TR>
<TR bgcolor=#C0C0C0>
        <TD>Kontakt {tel/e-mail}</TD> <TD>  <textarea name=kontakt rows=1 cols=20 >$kontakt</textarea></TD>
</TR>
</table>
          <input type=hidden name=id value='$id'>
          <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>        
           <INPUT TYPE=submit VALUE='Akceptuj'></FORM>";
                    
                        }    else
                        { 
                     
 $wynik = mysql_query ("SELECT * FROM uczen WHERE rocznik='$rocznik';") or 
        die ("błąd w pytaniu");    
       print"<center><h1> Wychowawca : $login <br>Lista Uczniów Klasy : $id_k - $rocznik</h1>";    
       print "<TABLE width=100% CELLPADDING=5 BORDER=1>";
      print "<TR align=center bgcolor=#27C8FD><TD><B>ID</B></TD><TD><B>Nazwisko i Imię</B></TD>";
      print "<TD><B>Adres</B></TD><td><b>Data Ur.</b></TD><th>Pesel</th><th>Kontakt</th><td>Działanie</td></TR>\n";

      while ($rekord = mysql_fetch_array ($wynik)) 
                              {
        $id= $rekord[0];
        $nazw = $rekord[1];
        $imie = $rekord[2];
        $adres = $rekord[3];
        $miasto = $rekord[4];
        $data_ur = $rekord[5];
        $pesel = $rekord[7];
        $kontakt = $rekord[8];

        print "<TR align=center bgcolor=#E3F8EA><TD>$id</TD><TD><h2>$nazw $imie</h2></TD><TD>$miasto $adres</TD><td>$data_ur</td><td>$pesel</td><td>$kontakt</td><TD>";
                           print "<form method=post>                         
                           <input type=hidden name=id value='$id'>  
                           <input type=hidden name=dzialanie value='popraw'>
                           <input type=hidden name=rocznik value=$rocznik>   
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>               
                            <input type=submit value='Edytuj Dane'>
                             </form></td></tr>";
                                          }
                               print "</TABLE>"; 
                               print "<form method=post>                         
                           <input type=hidden name=dzialanie value='nowy'>
                           <input type=hidden name=rocznik value=$rocznik>     
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>             
                            <input type=submit value='Nowy Uczeń'>
                             </form>";
                                          

                     print "    <center>      
                              <form action=security.php method=post>  
                              <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>                              
                            <input type=submit value='Powrót do Menu'>
                             </form></center>";
            }
                     
        ?>

  </BODY>
</HTML> 
