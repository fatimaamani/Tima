<?php

require_once 'ProgramFunctions/Fields.fnc.php';

$host="localhost";
$port="5432";
$dbname="rosariosis_db";
$user="";
$password="matifa";

$connection_string= "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
$db = pg_connect($connection_string);



echo( '<div id="body" tabindex="0" role="main" class="mod">
				<table class="header"><tbody><tr class="cv">
                <td class="header1"><h2><span class="module-icon EntryTest">
                </span>College Level</h2></td></tr></tbody>
                </table><br><table class="postbox cellspacing-0"> ');		

 

    $college =  DBGet( DBQuery("SELECT niveau,date_entry from entry_test where niveau like '%college%' "));

      $i=1;

  echo ('<table border="1" width="100%" cellspacing="0" cellpadding="6">
  

         <tr>
                 <th>niveau</th>
                 <th>dateEntree</th>
              
              </tr>  '); 

      while ($i<=count($college)){
        $colge=$college[$i];
        echo '<tr>';
    foreach ($colge as $col) {
        echo '<td>'.$col.'</td>';
    }
    echo '</tr>';
        
           $i=$i+1; echo '<br>';
         
      } 
      echo '</table> '; 
  

 ?>