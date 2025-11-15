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
      h1 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 12pt;color:blue}
      h2 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 10pt}
      p {font-family: Arial, Helvetica, sans-serif; font-size: 9pt; color:red}
    </STYLE>
  </HEAD>
  <body background="images/back.gif">
<img src="images/logo.gif" alt="Jerry" align="left" border=4 height=55 width=70>
    <? 
          $r=date("Y");
    $m=date("m");
    $d=date("d");
    
       
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
      print "<center><h1>Dzis jest $konwersja[$dzientygodnia]. </h1></center>";
     print"<p>$d - $m - $r</p>";
                   
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
                 
                        print"<center><h2><br>Zalogowany Uzytkownik: $login<br></h2> 
                        <form action=dane.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Dane Osobowe'></form>
                        
                              <form action=info.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Dodaj komentarz o uczniu'></form>                        
                         
                         <form action=oceny.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Lista Klasy'></form>
                            
                            <form action=zestaw.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>                           
                            <input type=submit value='Zestawienie'></form>

                              <form action=security.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>                           
                            <input type=submit value='Menu'></form>
                            
                          <form action=index.php method=post target=_top>
                          <input type=submit value='Wyloguj się'></form>
                         </center>";
                        
                            
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
