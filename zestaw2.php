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
      h1 {font-family: Book Antiqua, Helvetica, sans-serif; font-variant: small-caps ;font-size: 16pt;color:blue}
      h2 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 12pt;color:#106501}
      p {font-family: Arial, Helvetica, sans-serif; font-size: 9pt; color:red}
    </STYLE>
  </HEAD>
  <BODY background="images/back.gif">
  <center>
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
               
         $wynik = mysql_query ("SELECT * FROM uczen WHERE rocznik='$rocznik';") or 
        die ("błąd w pytaniu");   
        if($tytul==1){
                         print"<center><h1> $t_tytul</h1>";    }
                         else{print"<center><h1> Klasa : $id_k - $rocznik - $sem</h1>"; }   
       print "<TABLE width=100% CELLPADDING=2 BORDER=1>";
      print "<TR align=center bgcolor=#27C8FD><TD><B>ID</B></TD><TD><B>Nazwisko</B></TD>";
      print "<TD><B>Imię</B></TD>";
      if($adres==1){print"<th >Adres</th>";}
     if($data==1){print"<th >Data Ur.</th>";}
     if($pes==1){print"<th >Pesel</th>";}
     if($kont==1){print"<th >Kontakt</th>";}
     if($punkty==1){print"<th >Punkty z kat.</th>";}
     if($sum==1){print"<th >Suma punktów</th>";}
     if($ocena==1){print"<th >Ocena</th>";}
     if($info1==1){print"<th >Info sem1</th>";}
      if($info2==1){print"<th >Info sem2</th>";}   
       if($kol==1){print"<th >$dod_kol</th>";}     
      
      print"</TR>\n";
   $i=0;
       while ($rekord = mysql_fetch_array ($wynik)) 
                              {
                              $i++;
        $id= $rekord[0];
        $nazw = $rekord[1];
        $imie = $rekord[2];       
        $miasto = $rekord[4];
        $data_ur = $rekord[5];
        $rocznik=$rekord[6];
         $pesel=$rekord[7];
          $kontakt=$rekord[8];
               
  print "<TR align=center bgcolor=#E3F8EA><TD>$i</TD><TD><h2>$nazw</h2></TD><TD>$imie</TD>";   
        
       if($adres==1){print"<td >$rekord[4]  $rekord[3]</td>";}  
       if($data==1){print"<td >$rekord[5]</td>";}                     
     if($pes==1){print"<td >$rekord[7]</td>";}
     if($kont==1){print"<td >$rekord[8]</td>";}
     if(($punkty==1) or ($sum==1) or ($ocena==1)){
               if($sem=='sem1'){
                       $wynik2 = mysql_query ("SELECT * FROM ocena1 WHERE id='$id';") or 
                                                   die ("błąd w pytaniu");
                                             $rekord2 = mysql_fetch_array ($wynik2);
                                                        if(($punkty==1) or ($sum==1)){
                                                                $kat1=$rekord2[2];
                                                                $kat2=$rekord2[3];
                                                                $kat3=$rekord2[4];
                                                                $kat4=$rekord2[5];
                                                                $kat5=$rekord2[6];
                                                                $suma=$kat1+$kat2+$kat3+$kat4+$kat5;
                                                      if($punkty==1){print"<td >$kat1|$kat2|$kat3|$kat4|$kat5</td>";}
                                                      if($sum==1){print"<td >$suma</td>";}
                                                              }
                                                        if($ocena==1){print"<td >$rekord2[7]</td>";}
                                              }else{        
                                              $wynik2 = mysql_query ("SELECT * FROM ocena2 WHERE id='$id';") or 
                                                   die ("błąd w pytaniu");
                                             $rekord2 = mysql_fetch_array ($wynik2);
                                                        if(($punkty==1) or ($sum==1)){
                                                                $kat1=$rekord2[2];
                                                                $kat2=$rekord2[3];
                                                                $kat3=$rekord2[4];
                                                                $kat4=$rekord2[5];
                                                                $kat5=$rekord2[6];
                                                                $suma=$kat1+$kat2+$kat3+$kat4+$kat5;
                                                      if($punkty==1){print"<td >$kat1|$kat2|$kat3|$kat4|$kat5</td>";}
                                                      if($sum==1){print"<td >$suma</td>";}
                                                              }
                                                        if($ocena==1){print"<td >$rekord2[7]</td>";}          
                                      }
                                                                 }
        
                      if($info1==1){
                     $wynik3 = mysql_query ("SELECT id,sem,opis FROM info WHERE (id='$id') and (sem='sem1');") or 
                                                   die ("błąd w pytaniu");
                                             $rekord3 = mysql_fetch_array ($wynik3); 
                                             if($rekord3[2]==''){$opis1='--';}else{$opis1=$rekord3[2];}
                                             print"<td >$opis1</td>";
                                             }
                      
                        if($info2==1){
                     $wynik4 = mysql_query ("SELECT id,sem,opis FROM info WHERE (id='$id') and (sem='sem2');") or 
                                                   die ("błąd w pytaniu");
                                             $rekord4 = mysql_fetch_array ($wynik4); 
                                             if($rekord4[2]==''){$opis2='--';}else{$opis2=$rekord4[2];}
                                             print"<td >$opis2</td>";                                            
                                                     }
                             if($kol==1){print"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";}    
                       print" </tr>";
         
                     }
                               print "</TABLE>
         <form action=zestaw.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Powrót'></form>
        <form action=oceny.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Lista Klasy'></form>";
          ?>

  </BODY>
</HTML> 
