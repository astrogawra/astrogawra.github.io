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
    <style>
      h1 {font-family: Monotype Corsiva, Helvetica, sans-serif; font-variant: small-caps ;font-size: 18pt;color:#007100}
      h2 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 11pt;color:#3F56C7}
      p {font-family: Arial, Helvetica, sans-serif; font-size: 12pt; color:red}
    </STYLE>
  </HEAD>
  <body background="images/back.gif">
 <a href="istat/index.php"><img src="images/logo.gif" alt="Jerry" align="left" border=4 height=90 width=110></A>
    <? 
    $r=date("Y");
    $m=date("m");
    $d=date("d");
        
       $user_db='jarwol';
       $pass_db='alfik';
       
       $dzisiaj=date("l");
       $k['Monday'] = 1;
     $k['Tuesday'] =2;
     $k['Wednesday'] =3;
     $k['Thursday'] = 4;
     $k['Friday'] =5;
     $k['Saturday'] =6;
     $k['Sunday'] =7;
      $konwersja['Monday'] = 'poniedziałek';
     $konwersja['Tuesday'] = 'wtorek';
     $konwersja['Wednesday'] = 'środa';
     $konwersja['Thursday'] = 'czwartek';
     $konwersja['Friday'] = 'piątek';
     $konwersja['Saturday'] = 'sobota';
     $konwersja['Sunday'] = 'niedziela';
         if ($nr_d=="")
        {
        $dzientygodnia = $dzisiaj;
        $nr_d=$k[$dzientygodnia];
        } else
         {
         $nr_d=$nr_d+$przod;
          switch ($nr_d) {
                       case '1':$dzientygodnia = 'Monday'; break;
                        case '2': $dzientygodnia = 'Tuesday'; break;
                      case '3': $dzientygodnia = 'Wednesday'; break;
                     case '4':$dzientygodnia = 'Thursday'; break;
                      case '5': $dzientygodnia = 'Friday'; break;
                      case '6': $dzientygodnia= 'Saturday'; break;
                     case '7': $dzientygodnia = 'Sunday'; break;
                      default: $dzientygodnia = 'niezidentyfikowany'; break;
                                        }
              }
       print "<table border=35 width=40% cellpadding=0 align=center bgcolor=>";
      print "<TR align=center ><TD><h1>Menu <br>Asystenta Wychowawcy<br></h1></tr>
      <tr  align=center><td><h2>Dzis jest $konwersja[$dzientygodnia]</h2> ";
        
                       print"<p>$d - $m - $r</p>";
                       print"</td></tr>";
    

  $user_db='jarstan';
       $pass_db='alfik';
         mysql_connect ("localhost", "$user_db", "$pass_db") or 
        die ("Nie można połączyć się z MySQL");
      mysql_select_db ("szkola2") or 
        die ("Nie można połączyć się z bazą szkola2");      
         $wynik = mysql_query ("SELECT * FROM klasy WHERE wych='$login';") or 
        die ("błąd w pytaniu");    
         $rekord = mysql_fetch_array ($wynik);
          $loginx = $rekord[3];
          $passx=$rekord[4];

if(($login==$loginx) && ($haslo==$passx)) 
{
                 
                        print"<TR align=center ><TD><h2>Zalogowany Użytkownik : $login</h2></td></tr>
                        <p>
                       <TR align=center ><TD> <form action=dane.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Przeglądaj i Edytuj Dane Uczniów'></form></td></tr>
                        
                            <TR align=center ><TD> <form action=info.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Dodaj Informację o Uczniu'></form> </td></tr>    
                        
                          <TR align=center ><TD> <form action=info_k.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Dodaj Informację o Klasie'></form>  </td></tr>                      
                         
                         <TR align=center ><TD><form action=oceny.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Edycja Oceny z Zachowania'></form></td></tr>
                            
                           <TR align=center ><TD> <form action=zestaw.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>                           
                            <input type=submit value='Przygotowanie Zestawienia do Wydruku'></form></td></tr>
                            
                            <TR align=center ><TD> <form action=haslo.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>                           
                            <input type=submit value='Zmiana Hasła'></form></td></tr>
                            
                          <TR align=center ><TD><form action=index.php method=post target=_top>
                          <input type=submit value='Wyloguj się'></form></td></tr>
                          
                            
                         </table></center></p>";
                        
                            
}
else 
{
print"<font size=9 color=maroon<Center> Wprowadzono złe dane!!!</font>";
print"<center> <form action=index.php method=post>
                          
                          
                            
                            <input type=submit value='Powrót'>
                        
                         </center>";
}
   ?>

  </BODY>
</HTML> 
