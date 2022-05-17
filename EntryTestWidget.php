<?php
require_once 'ProgramFunctions/Fields.fnc.php';

$host="localhost";
$port="5432";
$dbname="rosariosis_db";
$user="";
$password="matifa";

$connection_string= "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
$db = pg_connect($connection_string);



echo('<div  tabindex="0" role="main" class="mod">
				<table class="header">
					<tbody>
						<tr class="cv">
							<td class="header1"> 
								<h2> <span class="module-icon EntryTest"></span> Periodes de Test dentree</h2>
							</td>

						</tr>
					</tbody>
				</table><br>
				<table class="postbox cellspacing-0">


		
			<thead><tr><th class="center"><h3 class="title">Show&nbsp;Test&nbsp;Periode</h3></th></tr></thead>
			<tbody><tr><td class="popTable"><form name="search" id="search" action="Modules.php?modname=EntryTest/EntryTestWidget.php&amp;modfunc=&amp;search_modfunc=list&amp;next_modname=EntryTest/EntryTestWidget.php&amp;advanced=" method="GET">

			</div>');
	

echo ('<form method="POST" action="Modules.php?modname=EntryTest/EntryTestWidget.php">
    <div>
	<label for="niveau">Niveau:&nbsp;</label>
               <select type="text" name = "niveau" required>
               <option value=""></option>
                  <option value="primaire"> primaire </option>
                  <option value="college" >college </option>
                  <option value="lycee" >lycee </option>
                </select><br><br>
    </div><br>
    
    <div>
	&nbsp;&nbsp;<label for="date">Date du test</label>
      <input type="date" name="date" size="24" maxlength="50" autofocus="" required>
    </div><br><br>
    
    <div style="
    border-radius: 3px;
    padding-left:80px;
    padding-right:80px;
    box-sizing: content-box;
    white-space: normal;
    border-color: #15556b;
    font-weight: 700;
    input[type="submit"],
    color: #fff;
    background: -moz-linear-gradient(top,#298cba,#1d6385);
    text-shadow: rgba(0,0,0,.3) 0 -1px 0;
    outline: 0;
    max-width: 100%;
    font-size: 14px;
    word-wrap: break-word;">
     
    <input class="button-primary" type="submit"  name="submit" value="ok">
    </div> 
    </form>');



	function addEntry(){
		$niveau = $_GET['niveau'];
		$dateE = $_GET['date'];
		
	DBQuery( "INSERT INTO entry_test ( niveau, date_entry) VALUES ('". $niveau ."', '". $date ."')" );
	}
	if (isset($_GET['submit'])){
		addEntry();
	}

  function primaryLevel() {
    $niveau = $_GET['niveau'];
		$dateE = $_GET['date'];


    $primary=  DBGet( DBQuery("SELECT niveau,date_entry from entry_test where niveau like '%primaire%' "));

      $i=1;

  echo ('<table border="1" width="100%" cellspacing="0" cellpadding="6">
  

         <tr>
                 <th>niveau</th>
                 <th>dateEntree</th>
              
              </tr>  '); 

      while ($i<=count($primary)){
        $primar=$primary[$i];
        echo '<tr>';
    foreach ($primar as $prim) {
        echo '<td>'.$prim.'</td>';
    }
    echo '</tr>';
        
           $i=$i+1; echo '<br>';
         
      } 
      echo '</table> '; 
  }

  if (isset($_GET['submit'])){
		primaryLevel();
	}
  ?> 