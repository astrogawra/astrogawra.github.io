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
      h2 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 15pt;color:red}
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
        die ("Nie można połączyć się z bazą as");
      
      
        if($dzialanie=='zmien'){  
                        if($new1_h!=$new2_h){
                                print"<center><h2>Błędna weryfikacja hasła</h2></center>";
                                $popraw='';
                                }elseif($old_h!=$haslo){
                                        print"<center><h2>Błędne stare hasło</h2></center>";
                                        $popraw='';
                                        }else{
                                                   $query = "UPDATE klasy SET pass='$new2_h'  WHERE wych='$login'";
                                                   $wynik = mysql_query ($query);
                                                   $popraw='no';
                                   print"<center><H1> $login : Zmieniono Twoje Hasło </h1>";
                                    print "<form action=security.php method=post>                           
                                                  <input type=hidden name=rocznik value=$rocznik> 
                                                   <input type=hidden name=login value=$login> 
                                                  <input type=hidden name=haslo value=$new2_h>                 
                                                    <input type=submit value='Powrót do Menu'>
                                                     </form></center>";
                                                     }
                                                     }
                                                
                
  
 if($popraw==''){ 
$wynik = mysql_query ("SELECT * FROM klasy WHERE wych='$login';") or 
        die ("błąd w pytaniu");
                 $rekord = mysql_fetch_array ($wynik);
                     $rocznik=$rekord[1];
                     $id_k=$rekord[2];  
                     $loginx = $rekord[3];
                      $passx=$rekord[4];



 print"<center><h1> Wychowawca : $login <br></h1>";    
       print "<form method=post>  <TABLE align=center BORDER=5>";
      print "<TR bgcolor=#B1A901><Th colspan=2>Zmiana Hasła Logowania</Th></tr>
              <TR bgcolor=#FCA250><Th>podaj stare hasło</Th>
                <td><input type=password  name=old_h></td> 
                <TR align=center bgcolor=#27C8FD><Th>podaj nowe hasło</Th>
                <td><input type=password  name=new1_h></td> 
                <TR align=center bgcolor=#27C8FD><Th>weryfikacja hasła</Th>
                <td><input type=password name=new2_h></td> 
                </table><br>
                <input type=hidden name=dzialanie value='zmien'>
                           <input type=hidden name=rocznik value=$rocznik>    
                           <input type=hidden name=haslo value=$haslo>    
                           <input type=hidden name=login value=$login>                              
                            <input type=submit value='Akceptuj'>
                                   </form>                                 
 
                              <form action=security.php method=post>  
                              <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>                              
                            <input type=submit value=Powrót do Menu>
                             </form></center>";
                
                     }               
      
        ?>

  </BODY>
</HTML> 
