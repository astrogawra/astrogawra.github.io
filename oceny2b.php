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
        
    if($dzialanie=='zmien'){
                          
          if($semx1==1){
           $suma1=$kat11+$kat21+$kat31+$kat41+$kat51;
              if($suma1<10){$ocena1='naganne';}
               elseif($suma1<12){$ocena1='nieodpowiednie';}
                elseif($suma1<14){$ocena1='poprawne';}
                   elseif($suma1<16){$ocena1='dobre';}
                     elseif($suma1<18){$ocena1='bardzo dobre';}
                     else{$ocena1='wzorowe';}
                  $query = "UPDATE ocena1 SET id='$id',kat1='$kat11',kat2='$kat21',kat3='$kat31',kat4='$kat41',kat5='$kat51',ocena='$ocena1' where lp='$lp1';";
                   $wynik = mysql_query ($query);}
            if($semx2==1){      
              $suma2=$kat12+$kat22+$kat32+$kat42+$kat52;
             if($suma2<10){$ocena2='naganne';}
               elseif($suma2<12){$ocena2='nieodpowiednie';}
                elseif($suma2<14){$ocena2='poprawne';}
                   elseif($suma2<16){$ocena2='dobre';}
                     elseif($suma2<18){$ocena2='bardzo dobre';}
                     else{$ocena2='wzorowe';}  
             $query = "UPDATE ocena2 SET id='$id',kat1='$kat12',kat2='$kat22',kat3='$kat32',kat4='$kat42',kat5='$kat52',ocena='$ocena2' where lp='$lp2';";
           $wynik = mysql_query ($query);}
        
           }      

     elseif($dzialanie=='wstaw'){                       
                  if($semx1==1){
                     $suma1=$kat11+$kat21+$kat31+$kat41+$kat51;
                    
                 if($suma1<10){$ocena1='naganne';}
                    elseif($suma1<12){$ocena1='nieodpowiednie';}
                    elseif($suma1<14){$ocena1='poprawne';}
                    elseif($suma1<16){$ocena1='dobre';}
                     elseif($suma1<18){$ocena1='bardzo dobre';}
                     else{$ocena1='wzorowe';}
                     }else{
                               $ocena1='brak';}
                      $query="INSERT INTO ocena1 (lp,id,kat1,kat2,kat3,kat4,kat5,ocena) VALUES ('','$id','$kat11','$kat21','$kat31','$kat41','$kat51','$ocena1')";
                       $wynik=mysql_query($query); 
                       
                  if($semx2==1){   
                    $suma2=$kat12+$kat22+$kat32+$kat42+$kat52;
                    if($suma2<10){$ocena2='naganne';}
                     elseif($suma2<12){$ocena2='nieodpowiednie';}
                      elseif($suma2<14){$ocena2='poprawne';}
                       elseif($suma2<16){$ocena2='dobre';}
                        elseif($suma2<18){$ocena2='bardzo dobre';}
                          else{$ocena2='wzorowe';}
                               }else{
                               $ocena2='brak';}                
                $query="INSERT INTO ocena2 (lp,id,kat1,kat2,kat3,kat4,kat5,ocena) VALUES ('','$id','$kat12','$kat22','$kat32','$kat42','$kat52','$ocena2')";
                       $wynik=mysql_query($query);         
               }        
    
     $wynik = mysql_query ("SELECT * FROM uczen WHERE id='$id';") or 
        die ("błąd w pytaniu");    
        $rekord = mysql_fetch_array ($wynik);
        $rocznik=$rekord[6];
        $wynik = mysql_query ("SELECT * FROM uczen WHERE rocznik='$rocznik';") or
         die ("błąd w pytaniu");  
                      if($param=='n'){$i++;}
                       if($param=='p'){$i--;}
        $k=1;   
   while ($rekord = mysql_fetch_array ($wynik)) {
            if($param=='')        
               {
             if($id==$rekord[0]){              
                                      $nazw = $rekord[1];
                                       $imie = $rekord[2];
                                       $i=$k;
                                        }
            }
             else{
                       if($i==$k){
                                     $nazw = $rekord[1];
                          $imie = $rekord[2];
                         $id=$rekord[0];
                          }
                 }    
                 $k++;     
        }
         $wynik = mysql_query ("SELECT * FROM info  WHERE id='$id' and sem='sem1' ;") or 
        die ("błąd w pytaniu");    
        
          $rekord = mysql_fetch_array ($wynik);
                       $opis1=$rekord[4];
                  $wynik = mysql_query ("SELECT * FROM info  WHERE id='$id' and sem='sem2' ;") or 
        die ("błąd w pytaniu");    
        
          $rekord = mysql_fetch_array ($wynik);
                       $opis2=$rekord[4];      
                 
 print "<table border=1 width=100% cellpadding=5 align=center bgcolor=#BED4E4>
                     <tr> <td align=center><form action=oceny2b.php method=post target=ramka2> 
                         <input type=hidden name=param value='p'>
                         <input type=hidden name=id value='$id'>  
                          <input type=hidden name=i value=$i> 
                            <input type=hidden name=semx1 value=$semx1> 
                          <input type=hidden name=semx2 value=$semx2> 
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo> 
                          <input type=hidden name=sem value=$sem>                       
                          <input type=submit  value='Poprzedni'>      
                            </form>
                     </td>
                     <td align=center>
                              <h1>$nazw   $imie </h1>  
                     </td><td align=center><form action=oceny2b.php method=post target=ramka2> 
                         <input type=hidden name=param value='n'>
                         <input type=hidden name=id value='$id'>  
                          <input type=hidden name=i value=$i> 
                           <input type=hidden name=semx1 value=$semx1> 
                          <input type=hidden name=semx2 value=$semx2> 
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo> 
                                        
                          <input type=submit  value='Następny'>      
                            </form></td>
                     </tr><tr align=center ><td></td><td><h2>Informacja o Uczniu</h2></td><td></td>  </tr>
                      <tr> <td align=center>  $opis1  </td><td align=center><--sem1                                 sem2--></td>
                      <td align=center>$opis2 </td></tr> </table>";            

?>                  
<br>   <center><img src="images/logo.gif" alt="Jerry" align="middle" border=4 height=55 width=70><br>
   <h2> Edycja Parametrów Oceny z Zachowania</h2>
    <?


 $wynik = mysql_query ("SELECT * FROM ocena1 WHERE id='$id';") or 
        die ("błąd w pytaniu");    
        $rekord = mysql_fetch_array ($wynik);
        $lp1=$rekord[0];
        $kat11=$rekord[2]; 
        $kat21=$rekord[3];   
        $kat31=$rekord[4];   
        $kat41=$rekord[5];   
        $kat51=$rekord[6];
        $suma1=$kat11+$kat21+$kat31+$kat41+$kat51;
        $ocena1=$rekord[7];    
  $wynik = mysql_query ("SELECT * FROM ocena2 WHERE id='$id';") or 
        die ("błąd w pytaniu");    
        $rekord = mysql_fetch_array ($wynik);
          $lp2=$rekord[0];
        $kat12=$rekord[2]; 
        $kat22=$rekord[3];   
        $kat32=$rekord[4];   
        $kat42=$rekord[5];   
        $kat52=$rekord[6];
         $suma2=$kat12+$kat22+$kat32+$kat42+$kat52;
        $ocena2=$rekord[7];            
        
        
print"<form action=oceny2b.php method=post target=ramka2>
<table border=1 width=100% cellpadding=5 align=center bgcolor=#90E3AC>
                     <tr  bgcolor=#4BD178 align=center> <th>Kategoria</th><th  colspan=2 align=center>Semestr1</th><th  colspan=2 align=center>Semestr 2</th><th align=center>Komentarz</th></tr><tr align=center><td></td><td> 0 - 1 - 2 - 3 - 4 </td><td>Punkty</td><td> 0 - 1 - 2 - 3 - 4 </td><td>Punkty</td><td></td></tr>
                    <tr align=center> <td>Obowiązki szkolne</td> <td>
<input type=radio name=kat11 value=0 checked alt=wartość 0>
<input type=radio name=kat11 value=1  alt=wartość 1>
<input type=radio name=kat11 value=2  alt=wartość 2>
<input type=radio name=kat11 value=3 alt=wartość 3>
<input type=radio name=kat11 value=4 alt=wartość 4>
</td><td>$kat11</td><td>
<input type=radio name=kat12 value=0 checked alt=wartość 0>
<input type=radio name=kat12 value=1  alt=wartość 1>
<input type=radio name=kat12 value=2  alt=wartość 2>
<input type=radio name=kat12 value=3 alt=wartość 3>
<input type=radio name=kat12 value=4 alt=wartość 4>
</td><td>$kat12</td><td>Komentarz kat1</td></tr> <tr align=center> <td>Frekwencja</td> <td>
<input type=radio name=kat21 value=0 checked alt=wartość 0>
<input type=radio name=kat21 value=1  alt=wartość 1>
<input type=radio name=kat21 value=2  alt=wartość 2>
<input type=radio name=kat21 value=3 alt=wartość 3>
<input type=radio name=kat21 value=4 alt=wartość 4>
</td><td>$kat21</td><td>
<input type=radio name=kat22 value=0 checked alt=wartość 0>
<input type=radio name=kat22 value=1  alt=wartość 1>
<input type=radio name=kat22 value=2  alt=wartość 2>
<input type=radio name=kat22 value=3 alt=wartość 3>
<input type=radio name=kat22 value=4 alt=wartość 4>
</td><td>$kat22</td><td>Komentarz kat2</td></tr> <tr align=center> <td>Kultura Osobista</td> <td>
<input type=radio name=kat31 value=0 checked alt=wartość 0>
<input type=radio name=kat31 value=1  alt=wartość 1>
<input type=radio name=kat31 value=2  alt=wartość 2>
<input type=radio name=kat31 value=3 alt=wartość 3>
<input type=radio name=kat31 value=4 alt=wartość 4>
</td><td>$kat31</td><td>
<input type=radio name=kat32 value=0 checked alt=wartość 0>
<input type=radio name=kat32 value=1  alt=wartość 1>
<input type=radio name=kat32 value=2  alt=wartość 2>
<input type=radio name=kat32 value=3 alt=wartość 3>
<input type=radio name=kat32 value=4 alt=wartość 4>
</td><td>$kat32</td><td>Komentarz kat3</td></tr> <tr align=center> <td>Bezpieczeństwo i Zdrowie</td> <td>
<input type=radio name=kat41 value=0 checked alt=wartość 0>
<input type=radio name=kat41 value=1  alt=wartość 1>
<input type=radio name=kat41 value=2  alt=wartość 2>
<input type=radio name=kat41 value=3 alt=wartość 3>
<input type=radio name=kat41 value=4 alt=wartość 4>
</td><td>$kat41</td><td>
<input type=radio name=kat42 value=0 checked alt=wartość 0>
<input type=radio name=kat42 value=1  alt=wartość 1>
<input type=radio name=kat42 value=2  alt=wartość 2>
<input type=radio name=kat42 value=3 alt=wartość 3>
<input type=radio name=kat42 value=4 alt=wartość 4>
</td><td>$kat42</td><td>Komentarz kat4</td></tr> <tr align=center> <td>Działalność</td> <td>
<input type=radio name=kat51 value=0 checked alt=wartość 0>
<input type=radio name=kat51 value=1  alt=wartość 1>
<input type=radio name=kat51 value=2  alt=wartość 2>
<input type=radio name=kat51 value=3 alt=wartość 3>
<input type=radio name=kat51 value=4 alt=wartość 4>
</td><td>$kat51</td><td>
<input type=radio name=kat52 value=0 checked alt=wartość 0>
<input type=radio name=kat52 value=1  alt=wartość 1>
<input type=radio name=kat52 value=2  alt=wartość 2>
<input type=radio name=kat52 value=3 alt=wartość 3>
<input type=radio name=kat52 value=4 alt=wartość 4>
</td><td>$kat52</td><td>Komentarz kat5</td></tr>
<tr align=center><th>suma</th><th colspan=2 >$suma1</th><th colspan=2>$suma2</th><td>
<b>Zmień sem1</b>";
if($semx1==1){print"<input type=checkbox name=semx1 value=1 checked>";}
           else{print"<input type=checkbox name=semx1 value=1>";}
print"</td></tr>
<tr align=center><th>OCENA</th><th colspan=2 >$ocena1</th><th colspan=2>$ocena2</th><td>
<b>Zmień sem2</b>";
if($semx2==1){print"<input type=checkbox name=semx2 value=1 checked>";}
           else{print"<input type=checkbox name=semx2 value=1>";}
  print"         
</td></tr>
<tr></tr>

   <input type=hidden name=id value='$id'>  
    <input type=hidden name=login value=$login> 
    <input type=hidden name=haslo value=$haslo>
     <tr><td   colspan=6 align=center>";
    if($ocena1=='') {
     print"<input type=hidden name=dzialanie value='wstaw'>
<input type=submit value='Dodaj Ocenę'>";
  }
  else{
print"<input type=hidden name=dzialanie value='zmien'>
 <input type=hidden name=lp1 value='$lp1'> 
  <input type=hidden name=lp2 value='$lp2'> 
<input type=submit value='Zapisz Zmiany'>";
}
print"</td></tr>
 </table>
</form>";

          ?>

  </BODY>
</HTML> 
