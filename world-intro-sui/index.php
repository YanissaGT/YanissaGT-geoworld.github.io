<?php require_once 'header.php'; ?>

<div class="ui container">
    <<center>
    <h3>Select a continent</h3>
    <form action="" method="post">
	    <select name="continent">
        <option value="">...</option>
		    <option value="North America">North America</option>
		    <option value="Asia">Asia</option>
		    <option value="Africa">Africa</option>
		    <option value="Europe">Europe</option>
        <option value="South America">South America</option>
        <option value="Oceania">Oceania</option>
        <option value="Antarctica">Antarctica</option>
	    </select>
      <input type="submit" name="submit" value="Afficher" />
    </form>
    <?php
      $varContinent = "";
      if(isset($_POST['continent']))
      {
        $varContinent = $_POST['continent'];
      }
    ?>
    </center>
    <?php
      //$varContinent == ""
      if(empty($varContinent)){
        echo "<h1>Please select a continent</h1>";
      } 
      else {
        echo "<h1>Countrie in" . $varContinent . " : </h1>";
      }
    ?>
      <div>
        <?php
            require_once 'inc/manager-db.php';
            $continent = $varContinent;
            $desPays = getCountriesByContinent($continent);
        ?>
        <div>
          <style>
            table, th, td {
              border: 1px solid black;
              border-collapse: collapse;
            }
            th, td {
             padding: 5px;
             text-align: left;
           }
          </style>
          <table>
            <tr>
              <th>Name</th>
              <th>Region</th>
              <th>SurfaceArea</th>
              <th>IndepYear</th>
              <th>Population</th>
              <th>LifeExpectancy</th>
              <th>GNP</th>
              <th>LocalName</th>
              <th>GovernmentForm</th>
              <th>HeadOfState</th>
            </tr>
            <tr>
              <?php 
                for($i = 0; $i < count($desPays); $i++){
                  echo "<tr>";
                  echo "<td>" . $desPays[$i]->Name ."</td>";
                  echo "<td>" . $desPays[$i]->Region ."</td>";
                  echo "<td>" . $desPays[$i]->SurfaceArea ."</td>";
                  echo "<td>" . $desPays[$i]->IndepYear ."</td>";
                  echo "<td>" . $desPays[$i]->Population ."</td>";
                  echo "<td>" . $desPays[$i]->LifeExpectancy ."</td>";
                  echo "<td>" . $desPays[$i]->GNP ."</td>";
                  echo "<td>" . $desPays[$i]->LocalName ."</td>";
                  echo "<td>" . $desPays[$i]->GovernmentForm ."</td>";
                  echo "<td>" . $desPays[$i]->HeadOfState ."</td>";
                  echo "</tr>";
                }
              ?>
            </tr>
          </table>
        </div>
    </div>
    <p></p>

    <div class="ui one column grid">
        <div class="column">
            <div class="ui raised segment">
                <a class="ui red ribbon label">Tableau d'objets</a>
                <p>Le code ci-dessus représente une vue "debug" du premier élément d'un tableau. Ce tableau est
                    constitué d'objets PHP "standard" (stdClass).</p>
                <p>Pour accéder à l'<b>attribut</b> d'un <b>objet</b> on utilisera le symbole <b>-></b></p>
                <p>Ainsi, pour accéder au nom du premier pays de la liste
                <code>$desPays</code> on fera <b><code>$desPays[0]->Name</code></b>
                </p>
                <p>La variable <b><code>$desPays</code></b> référence un tableau (<i>array</i>).
                    Ainsi, pour générer le code HTML (table), devriez vous coder une boucle,
                    par exemple de type <b><code>foreach</code></b> sur l'ensembles des objets de ce tableau. </p>
                <p>Référez-vous à la structure des tables pour connaître le nom des <b><code>attributs</code></b>.
                    En effet, les objets du tableau ont pour attributs (nom et valeur)
                    le nom des colonnes de la table interrogée par un requête SQL, via l'appel à la
                    fonction <b><code>getCountriesByContinent</code></b> (du script <b><code>manager-db.php</code></b>.</p>
                <p>Par exemple <b><code>Name</code></b> est une des colonnes de la relation (table) <b><code>Country</code></b>)</p>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
