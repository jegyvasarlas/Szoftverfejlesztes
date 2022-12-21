<?php
function Selects(){
    $SELECTS = array("select * from orszagok",
        "select fovaros from orszagok where orszag = 'MADAGASZKAR';",
        "select orszag from orszagok where fovaros = 'OUAGADOUGOU';",
        "select orszag from orszagok where autojel = 'TT';",
        "select orszag from orszagok where penzjel = 'SGD';",
        "select orszag from orszagok where telefon = 61;",
        "select terulet from orszagok where orszag = 'Monaco';",
        "select nepesseg*1000 from orszagok where orszag = 'Malta';",
        "select nepesseg*1000 / terulet as nepsuruseg from orszagok where orszag = 'Japan';",
        "select sum(nepesseg*1000) from orszagok;",
        "select sum(terulet) from orszagok;",
        "select avg(nepesseg*1000) from orszagok;",
        "select avg(terulet) from orszagok;",
        "select sum(nepesseg*1000 / terulet) as ossz_nepsuruseg from orszagok;",
        "select count(orszag) from orszagok where terulet>1000000;",
        "select count(orszag) from orszagok where terulet<100;",
        "select count(orszag) from orszagok where nepesseg*1000<20000;",
        "select count(orszag) from orszagok where nepesseg*1000<20000 or terulet<100;",
        "select count(orszag) from orszagok where terulet between 50000 and 150000;",
        "select count(orszag) from orszagok where nepesseg*1000 between 8000000 and 12000000;",
        "select fovaros from orszagok where nepesseg*1000 > 20000000;",
        "select orszag from orszagok where nepesseg*1000 / terulet > 500;",
        "select orszag from orszagok where allamforma = 'köztársaság';",
        "select orszag from orszagok where penznem='kelet-karib dollár';",
        "select count(orszag) from orszagok where orszag like '%ORSZAG%';",
        "select orszag from orszagok where orszagok.penznem like '%KORONA%';",
        "select sum(terulet) from orszagok where foldr_hely like '%Europa%';",
        "select sum(nepesseg*1000) from orszagok where foldr_hely like '%Europa%';",
        "select sum(nepesseg*1000/terulet) from orszagok where foldr_hely like '%Europa%';",
        "select count(orszag) from orszagok where foldr_hely like '%Afrika%';",
        "select sum(nepesseg*1000) from orszagok where foldr_hely like '%Afrika%';",
        "select sum(nepesseg*1000 / terulet) from orszagok where foldr_hely like '%Afrika%';",
        "select orszag from orszagok where orszagok.orszag like '%sziget%';",
        "select orszag from orszagok where orszagok.allamforma = 'hercegség' or allamforma = 'királyság';",
        "select count(orszag) from orszagok where autojel = '';",
        "select orszag, valtopenz from orszagok where valtopenz not like '%100%';",
        "select count(orszag) from orszagok where terulet < (SELECT terulet from orszagok where orszag = 'Magyarorszag');",
        "select orszag, terulet from orszagok where orszagok.terulet = (SELECT MAX(terulet) from orszagok);",
        "select orszag, terulet from orszagok where orszagok.terulet = (SELECT MIN(terulet) from orszagok);",
        "select orszag, nepesseg*1000 from orszagok where nepesseg*1000 = (SELECT MAX(nepesseg*1000) from orszagok);",
        "select orszag, nepesseg*1000 from orszagok where nepesseg*1000 = (SELECT MIN(nepesseg*1000) from orszagok);",
        "select orszag, (nepesseg*1000/terulet) as nepsuruseg from orszagok where (nepesseg*1000/terulet) = (SELECT MAX((nepesseg*1000/terulet)) from orszagok);",
        "select orszag, (nepesseg*1000/terulet) as nepsuruseg from orszagok where (nepesseg*1000/terulet) = (SELECT MIN((nepesseg*1000/terulet)) from orszagok);",
        "select orszag, terulet from orszagok where foldr_hely like '%afrika%' order by terulet desc limit 1;",
        "select orszag, nepesseg*1000 as lakossag from orszagok where foldr_hely like '%amerika%' order by terulet asc limit 1;",
        "select orszag, nepesseg*1000/terulet as nepsuruseg from orszagok where terulet order by nepsuruseg desc limit 4;",
        "select fovaros, nepesseg*1000 as lakossag from orszagok order by lakossag desc limit 7;",
        "select orszag from orszagok order by gdp desc limit 10;",
        "select orszag from orszagok order by gdp*(nepesseg*1000) desc limit 10;",
        "select orszag from orszagok order by gdp asc limit 1 offset 1;",
        "select orszag from orszagok order by terulet asc limit 1 offset 39;",
        "select orszag from orszagok order by nepesseg asc limit 1 offset 14;",
        "select orszag from orszagok order by nepesseg desc limit 1 offset 60;",
        "SET @MO_terulet = (select orszagok.terulet from orszagok where orszagok.orszag like 'MAGYARORSZAG');select orszag,terulet, round(abs(terulet-@MO_terulet),0) as 'Kulonbseg' from orszagok where orszagok.orszag not like 'MAGYARORSZAG' order by Kulonbseg limit 3;",
        "set @AzsiaLakossag = (select sum(nepesseg) from orszagok where LOWER(foldr_hely) like '%Azsia%');set @FoldLakossag = (select sum(nepesseg) from orszagok);select round((@AzsiaLakossag/@FoldLakossag),6) as 'Azsiai lakosok aranya a foldon';",
        "set @OroszorszagTerulet = (select terulet from orszagok where orszag like 'Oroszorszag');set @OsszTerulet = (select sum(terulet) from orszagok);select round((@OroszorszagTerulet/@OsszTerulet),6) as 'Oroszorszag teruleti aranya a szazasfokon';",
        "set @EuroLakossag = (select sum(nepesseg) from orszagok where penznem like 'Euro');set @FoldLakossag = (select sum(nepesseg) from orszagok);select round((@EuroLakossag/@FoldLakossag),6) as 'Euroval fizeto lakosok aranya a foldon';",
        "select MAX(gdp)/(select gdp from orszagok order by gdp asc limit 1 offset 1) from orszagok;",
        "select round((select sum(gdp*(nepesseg*1000)) from orszagok where orszag like 'AMERIKAI EGYESÜLT ÁLLAMOK')/(select sum(gdp*(nepesseg*1000)) from orszagok),6) as 'USA aranya a vilag GDP-jenek';",
        "select round((select sum(gdp*(nepesseg*1000)) from orszagok where foldr_hely like '%euro%')/(select sum(gdp*(nepesseg*1000)) from orszagok),6) as 'Euro aranya a vilag GDP-jenek';",
        "select orszag from orszagok where gdp > (select avg(gdp) from orszagok) and foldr_hely not like '%europa%' and foldr_hely not like '%amerika%';",
        "select count(distinct allamforma) from orszagok where foldr_hely like '%Europa%';",
        "select count(distinct allamforma) from orszagok;",
        "select count(penznem) from orszagok where penznem not like '%euro%' and foldr_hely like '%europa%';",
        "select penznem from orszagok group by penznem having COUNT(1) != 1;",
        "select allamforma from orszagok group by allamforma having COUNT(1) = 1;"
    );
    return $SELECTS;
}
function SelectsSplit(){
    $SELECTS = array(
        "SET @MO_terulet = (select orszagok.terulet from orszagok where orszagok.orszag like 'MAGYARORSZAG');",
        "select orszag,terulet, round(abs(terulet-@MO_terulet),0) as 'Kulonbseg' from orszagok where orszagok.orszag not like 'MAGYARORSZAG' order by Kulonbseg limit 3;",
        "set @AzsiaLakossag = (select sum(nepesseg) from orszagok where LOWER(foldr_hely) like '%Azsia%');",
        "set @FoldLakossag = (select sum(nepesseg) from orszagok);",
        "select round((@AzsiaLakossag/@FoldLakossag),6) as 'Azsiai lakosok aranya a foldon';",
        "set @OroszorszagTerulet = (select terulet from orszagok where orszag like 'Oroszorszag');",
        "set @OsszTerulet = (select sum(terulet) from orszagok);",
        "select round((@OroszorszagTerulet/@OsszTerulet),6) as 'Oroszorszag teruleti aranya a szazasfokon';",
        "set @EuroLakossag = (select sum(nepesseg) from orszagok where penznem like 'Euro');",
        "set @FoldLakossag = (select sum(nepesseg) from orszagok);",
        "select round((@EuroLakossag/@FoldLakossag),6) as 'Euroval fizeto lakosok aranya a foldon';"
    );
    return $SELECTS;
}
function ConnectDB(){
    $server = "localhost";
    $user = "root";
    $psw = "";
    $db = "foldrajz";

    $con = new mysqli($server, $user, $psw, $db);

    if($con->connect_error){
        die("Connection failed: " . $con->connect_error);
    }

    $con->set_charset("utf8");
    return $con;
}
function DisconnectDB($con){
    $con->close();
}
function Hibakereses()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[0]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table style='font-size: 11px;padding: 1px'>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>fovaros</th>";
    $output .= "<th>foldr_hely</th>";
    $output .= "<th>terulet</th>";
    $output .= "<th>allamforma</th>";
    $output .= "<th>nepesseg</th>";
    $output .= "<th>nep_fovaros</th>";
    $output .= "<th>autojel</th>";
    $output .= "<th>country</th>";
    $output .= "<th>capital</th>";
    $output .= "<th>penznem</th>";
    $output .= "<th>penzjel</th>";
    $output .= "<th>valtopenz</th>";
    $output .= "<th>telefon</th>";
    $output .= "<th>gdp</th>";
    $output .= "<th>kat</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["fovaros"] . "</td>";
            $output .= "<td>" . $row["foldr_hely"] . "</td>";
            $output .= "<td>" . $row["terulet"] . "</td>";
            $output .= "<td>" . $row["allamforma"] . "</td>";
            $output .= "<td>" . $row["nepesseg"] . "</td>";
            $output .= "<td>" . $row["nep_fovaros"] . "</td>";
            $output .= "<td>" . $row["autojel"] . "</td>";
            $output .= "<td>" . $row["country"] . "</td>";
            $output .= "<td>" . $row["capital"] . "</td>";
            $output .= "<td>" . $row["penznem"] . "</td>";
            $output .= "<td>" . $row["penzjel"] . "</td>";
            $output .= "<td>" . $row["valtopenz"] . "</td>";
            $output .= "<td>" . $row["telefon"] . "</td>";
            $output .= "<td>" . $row["gdp"] . "</td>";
            $output .= "<td>" . $row["kat"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat1()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[1]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>fovaros</th>";

    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["fovaros"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat2()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[2]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat3()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[3]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat4()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[4]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat5()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[5]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat6()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[6]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>terulet</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["terulet"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat7()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[7]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>nepesseg*1000</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["nepesseg*1000"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat8()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[8]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>nepsuruseg</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["nepsuruseg"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat9()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[9]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>sum(nepesseg*1000)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["sum(nepesseg*1000)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat10()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[10]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>sum(terulet)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["sum(terulet)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat11()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[11]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>avg(nepesseg*1000)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["avg(nepesseg*1000)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat12()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[12]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>avg(terulet)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["avg(terulet)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat13()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[13]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>ossz_nepsuruseg</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["ossz_nepsuruseg"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat14()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[14]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat15()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[15]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat16()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[16]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat17()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[17]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat18()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[18]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat19()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[19]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat20()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[20]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>fovaros</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["fovaros"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat21()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[21]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat22()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[22]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat23()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[23]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat24()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[24]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat25()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[25]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat26()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[26]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>sum(terulet)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["sum(terulet)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat27()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[27]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>sum(nepesseg*1000)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["sum(nepesseg*1000)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat28()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[28]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>sum(nepesseg*1000/terulet)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["sum(nepesseg*1000/terulet)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat29()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[25]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat30()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[30]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>sum(nepesseg*1000)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["sum(nepesseg*1000)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat31()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[31]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>sum(nepesseg*1000 / terulet)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["sum(nepesseg*1000 / terulet)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat32()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[32]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat33()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[33]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat34()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[34]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat35()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[35]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>valtopenz</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["valtopenz"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat36()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[36]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(orszag)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(orszag)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat37()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[37]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>terulet</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["terulet"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat38()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[38]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>terulet</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["terulet"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat39()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[39]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>nepesseg*1000</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["nepesseg*1000"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat40()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[40]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>nepesseg*1000</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["nepesseg*1000"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat41()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[41]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>nepsuruseg</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["nepsuruseg"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat42()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[42]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>nepsuruseg</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["nepsuruseg"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat43()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[43]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>terulet</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["terulet"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat44()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[44]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>lakossag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["lakossag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat45()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[45]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>nepsuruseg</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["nepsuruseg"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat46()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[46]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>fovaros</th>";
    $output .= "<th>lakossag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["fovaros"] . "</td>";
            $output .= "<td>" . $row["lakossag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat47()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[47]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat48()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[48]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat49()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[49]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat50()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[50]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat51()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[51]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat52()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[52]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat53()
{
    $con = ConnectDB();
    $selects = SelectsSplit();
    $sql = "$selects[0]";
    $result = $con->query($sql);
    $sql = "$selects[1]";
    $result = $con->query($sql);
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "<th>terulet</th>";
    $output .= "<th>Kulonbseg</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "<td>" . $row["terulet"] . "</td>";
            $output .= "<td>" . $row["Kulonbseg"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat54()
{
    $con = ConnectDB();
    $selects = SelectsSplit();
    $sql = "$selects[2]";
    $result = $con->query($sql);
    $sql = "$selects[3]";
    $result = $con->query($sql);
    $sql = "$selects[4]";
    $result = $con->query($sql);
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>Azsiai lakosok aranya a foldon</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["Azsiai lakosok aranya a foldon"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat55()
{
    $con = ConnectDB();
    $selects = SelectsSplit();
    $sql = "$selects[5]";
    $result = $con->query($sql);
    $sql = "$selects[6]";
    $result = $con->query($sql);
    $sql = "$selects[7]";
    $result = $con->query($sql);
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>Oroszorszag teruleti aranya a szazasfokon</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["Oroszorszag teruleti aranya a szazasfokon"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat56()
{
    $con = ConnectDB();
    $selects = SelectsSplit();
    $sql = "$selects[8]";
    $result = $con->query($sql);
    $sql = "$selects[9]";
    $result = $con->query($sql);
    $sql = "$selects[10]";
    $result = $con->query($sql);
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>Euroval fizeto lakosok aranya a foldon</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["Euroval fizeto lakosok aranya a foldon"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat57()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[57]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>MAX(gdp)/(select gdp from orszagok order by gdp asc limit 1 offset 1)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["MAX(gdp)/(select gdp from orszagok order by gdp asc limit 1 offset 1)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat58()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[58]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>USA aranya a vilag GDP-jenek</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["USA aranya a vilag GDP-jenek"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat59()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[59]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>Euro aranya a vilag GDP-jenek</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["Euro aranya a vilag GDP-jenek"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat60()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[60]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>orszag</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["orszag"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat61()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[61]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(distinct allamforma)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(distinct allamforma)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat62()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[62]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(distinct allamforma)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(distinct allamforma)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat63()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[63]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>count(penznem)</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["count(penznem)"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat64()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[64]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>penznem</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["penznem"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
function Feladat65()
{
    $con = ConnectDB();
    $selects = Selects();
    $sql = "$selects[65]";
    $result = $con->query($sql); // eredmenyhalmaz
    $output = "";
    $output .= "<table>";
    $output .= "<thead>";
    $output .= "<tr>";
    $output .= "<th>allamforma</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= "<tr>";
            $output .= "<td>" . $row["allamforma"] . "</td>";
            $output .= "</tr>";
        }
    }
    else{
        echo "A lekerdezes nem adott vissza egy sort sem!";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    return $output;
    DisconnectDB($con);
}
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>Országok</title>
        <style>
            table, th, td {
                border: 1px solid #eee;
                border-collapse: collapse;
            }

            th, td {
                padding: 5px;
            }

            form {
                display: inline;
            }

            * {
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                box-sizing: border-box;
                margin: 0;
            }

            .part {
                width: 14.28571428571429%;
                margin: auto;
                justify-content: center;
                display: flex;
                flex-wrap: wrap;
            }

            .full {
                width: 100%;
                margin: auto;
                justify-content: center;
                display: flex;
                flex-wrap: wrap;
            }

            .item::after {
                content: "";
                clear: both;
                display: table;
            }

            .sor {
                margin: auto;
                display: flex;
            }

            h1 {
                text-align: center;
            }

            body {
                background-color: #212121;
                color: #eee;
            }
        </style>
    </head>
    <body>
        <h1>Orszagok - PHP feladat</h1>
        <br>
        <div class="sor">
            <div class="item part">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="selectEgyTiz">1-10 feladatok:</label><br><br>
                    <select name="selectEgyTiz">
                        <option value='none' selected disabled hidden>&nbsp</option>
                        <option value="1">1. feladat</option>
                        <option value="2">2. feladat</option>
                        <option value="3">3. feladat</option>
                        <option value="4">4. feladat</option>
                        <option value="5">5. feladat</option>
                        <option value="6">6. feladat</option>
                        <option value="7">7. feladat</option>
                        <option value="8">8. feladat</option>
                        <option value="9">9. feladat</option>
                        <option value="10">10. feladat</option>
                    </select>
                    <input type="submit" name="submitEgyTiz" value="Futtatas">
                </form>
            </div>
            <div class="item part">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="selectTizHusz">11-20 feladatok:</label><br><br>
                    <select name="selectTizHusz">
                        <option value='none' selected disabled hidden>&nbsp</option>
                        <option value="11">11. feladat</option>
                        <option value="12">12. feladat</option>
                        <option value="13">13. feladat</option>
                        <option value="14">14. feladat</option>
                        <option value="15">15. feladat</option>
                        <option value="16">16. feladat</option>
                        <option value="17">17. feladat</option>
                        <option value="18">18. feladat</option>
                        <option value="19">19. feladat</option>
                        <option value="20">20. feladat</option>
                    </select>
                    <input type="submit" name="submitTizHusz" value="Futtatas">
                </form>
            </div>
            <div class="item part">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="selectHuszHarminc">21-30 feladatok:</label><br><br>
                    <select name="selectHuszHarminc">
                        <option value='none' selected disabled hidden>&nbsp</option>
                        <option value="21">21. feladat</option>
                        <option value="22">22. feladat</option>
                        <option value="23">23. feladat</option>
                        <option value="24">24. feladat</option>
                        <option value="25">25. feladat</option>
                        <option value="26">26. feladat</option>
                        <option value="27">27. feladat</option>
                        <option value="28">28. feladat</option>
                        <option value="29">29. feladat</option>
                        <option value="30">30. feladat</option>
                    </select>
                    <input type="submit" name="submitHuszHarminc" value="Futtatas">
                </form>
            </div>
            <div class="item part">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="selectHarmincNegyven">31-40 feladatok:</label><br><br>
                    <select name="selectHarmincNegyven">
                        <option value='none' selected disabled hidden>&nbsp</option>
                        <option value="31">31. feladat</option>
                        <option value="32">32. feladat</option>
                        <option value="33">33. feladat</option>
                        <option value="34">34. feladat</option>
                        <option value="35">35. feladat</option>
                        <option value="36">36. feladat</option>
                        <option value="37">37. feladat</option>
                        <option value="38">38. feladat</option>
                        <option value="39">39. feladat</option>
                        <option value="40">40. feladat</option>
                    </select>
                    <input type="submit" name="submitHarmincNegyven" value="Futtatas">
                </form>
            </div>
            <div class="item part">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="selectNegyvenOtven">41-50 feladatok:</label><br><br>
                    <select name="selectNegyvenOtven">
                        <option value='none' selected disabled hidden>&nbsp</option>
                        <option value="41">41. feladat</option>
                        <option value="42">42. feladat</option>
                        <option value="43">43. feladat</option>
                        <option value="44">44. feladat</option>
                        <option value="45">45. feladat</option>
                        <option value="46">46. feladat</option>
                        <option value="47">47. feladat</option>
                        <option value="48">48. feladat</option>
                        <option value="49">49. feladat</option>
                        <option value="50">50. feladat</option>
                    </select>
                    <input type="submit" name="submitNegyvenOtven" value="Futtatas">
                </form>
            </div>
            <div class="item part">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="selectOtvenHatvan">51-60 feladatok:</label><br><br>
                    <select name="selectOtvenHatvan">
                        <option value='none' selected disabled hidden>&nbsp</option>
                        <option value="51">51. feladat</option>
                        <option value="52">52. feladat</option>
                        <option value="53">53. feladat</option>
                        <option value="54">54. feladat</option>
                        <option value="55">55. feladat</option>
                        <option value="56">56. feladat</option>
                        <option value="57">57. feladat</option>
                        <option value="58">58. feladat</option>
                        <option value="59">59. feladat</option>
                        <option value="60">60. feladat</option>
                    </select>
                    <input type="submit" name="submitOtvenHatvan" value="Futtatas">
                </form>
            </div>
            <div class="item part">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="selectHatvanHatvanot">61-65 feladatok:</label><br><br>
                    <select name="selectHatvanHatvanot">
                        <option value='none' selected disabled hidden>&nbsp</option>
                        <option value="61">61. feladat</option>
                        <option value="62">62. feladat</option>
                        <option value="63">63. feladat</option>
                        <option value="64">64. feladat</option>
                        <option value="65">65. feladat</option>
                        <option value="debug">Hibakereses</option>
                    </select>
                    <input type="submit" name="submitHatvanHatvanot" value="Futtatas">
                </form>
            </div>
        </div>
        <br>
        <div class="sor">
            <div class="item full">
                <?php
                    if(isset($_POST['submitEgyTiz'])){
                        $feladat = $_POST['selectEgyTiz'];
                        switch($feladat){
                            case 1: echo Feladat1();break;
                            case 2: echo Feladat2();break;
                            case 3: echo Feladat3();break;
                            case 4: echo Feladat4();break;
                            case 5: echo Feladat5();break;
                            case 6: echo Feladat6();break;
                            case 7: echo Feladat7();break;
                            case 8: echo Feladat8();break;
                            case 9: echo Feladat9();break;
                            case 10: echo Feladat10();break;
                            default: echo "<script>alert('Nincs feladat kivalasztva');</script>";break;
                        }
                    }
                    if(isset($_POST['submitTizHusz'])){
                        $feladat = $_POST['selectTizHusz'];
                        switch($feladat){
                            case 11: echo Feladat11();break;
                            case 12: echo Feladat12();break;
                            case 13: echo Feladat13();break;
                            case 14: echo Feladat14();break;
                            case 15: echo Feladat15();break;
                            case 16: echo Feladat16();break;
                            case 17: echo Feladat17();break;
                            case 18: echo Feladat18();break;
                            case 19: echo Feladat19();break;
                            case 20: echo Feladat20();break;
                            default: echo "<script>alert('Nincs feladat kivalasztva');</script>";break;
                        }
                    }
                    if(isset($_POST['submitHuszHarminc'])){
                        $feladat = $_POST['selectHuszHarminc'];
                        switch($feladat){
                            case 21: echo Feladat21();break;
                            case 22: echo Feladat22();break;
                            case 23: echo Feladat23();break;
                            case 24: echo Feladat24();break;
                            case 25: echo Feladat25();break;
                            case 26: echo Feladat26();break;
                            case 27: echo Feladat27();break;
                            case 28: echo Feladat28();break;
                            case 29: echo Feladat29();break;
                            case 30: echo Feladat30();break;
                            default: echo "<script>alert('Nincs feladat kivalasztva');</script>";break;
                        }
                    }
                    if(isset($_POST['submitHarmincNegyven'])){
                        $feladat = $_POST['selectHarmincNegyven'];
                        switch($feladat){
                            case 31: echo Feladat31();break;
                            case 32: echo Feladat32();break;
                            case 33: echo Feladat33();break;
                            case 34: echo Feladat34();break;
                            case 35: echo Feladat35();break;
                            case 36: echo Feladat36();break;
                            case 37: echo Feladat37();break;
                            case 38: echo Feladat38();break;
                            case 39: echo Feladat39();break;
                            case 40: echo Feladat40();break;
                            default: echo "<script>alert('Nincs feladat kivalasztva');</script>";break;
                        }
                    }
                    if(isset($_POST['submitNegyvenOtven'])){
                        $feladat = $_POST['selectNegyvenOtven'];
                        switch($feladat){
                            case 41: echo Feladat41();break;
                            case 42: echo Feladat42();break;
                            case 43: echo Feladat43();break;
                            case 44: echo Feladat44();break;
                            case 45: echo Feladat45();break;
                            case 46: echo Feladat46();break;
                            case 47: echo Feladat47();break;
                            case 48: echo Feladat48();break;
                            case 49: echo Feladat49();break;
                            case 50: echo Feladat50();break;
                            default: echo "<script>alert('Nincs feladat kivalasztva');</script>";break;
                        }
                    }
                    if(isset($_POST['submitOtvenHatvan'])){
                        $feladat = $_POST['selectOtvenHatvan'];
                        switch($feladat){
                            case 51: echo Feladat51();break;
                            case 52: echo Feladat52();break;
                            case 53: echo Feladat53();break;
                            case 54: echo Feladat54();break;
                            case 55: echo Feladat55();break;
                            case 56: echo Feladat56();break;
                            case 57: echo Feladat57();break;
                            case 58: echo Feladat58();break;
                            case 59: echo Feladat59();break;
                            case 60: echo Feladat60();break;
                            default: echo "<script>alert('Nincs feladat kivalasztva');</script>";break;
                        }
                    }
                    if(isset($_POST['submitHatvanHatvanot'])){
                        $feladat = $_POST['selectHatvanHatvanot'];
                        switch($feladat){
                            case 61: echo Feladat61();break;
                            case 62: echo Feladat62();break;
                            case 63: echo Feladat63();break;
                            case 64: echo Feladat64();break;
                            case 65: echo Feladat65();break;
                            case "debug": echo Hibakereses();break;
                            default: echo "<script>alert('Nincs feladat kivalasztva');</script>";break;
                        }
                    }
                ?>
            </div>
        </div>
        <div class="sor">
            <div class="item full">
                <br>A feladatok szovege:<br>
                <br>1. feladat - Mi MADAGASZKÁR fővárosa?
                <br>2. feladat - Melyik ország fővárosa OUAGADOUGOU?
                <br>3. feladat - Melyik ország autójele a TT?
                <br>4. feladat - Melyik ország pénzének jele az SGD?
                <br>5. feladat - Melyik ország nemzetközi telefon-hívószáma a 61?
                <br>6. feladat - Mekkora területű Monaco?
                <br>7. feladat - Hányan laknak Máltán?
                <br>8. feladat - Mennyi Japán népsűrűsége?
                <br>9. feladat - Hány lakosa van a Földnek?
                <br>10. feladat - Mennyi az országok területe összesen?
                <br>11. feladat - Mennyi az országok átlagos népessége?
                <br>12. feladat - Mennyi az országok átlagos területe?
                <br>13. feladat - Mennyi a Föld népsűrűsége?
                <br>14. feladat - Hány 1.000.000 km2-nél nagyobb területű ország van?
                <br>15. feladat - Hány 100 km2-nél kisebb területű ország van?
                <br>16. feladat - Hány 20.000 főnél kevesebb lakosú ország van?
                <br>17. feladat - Hány országra igaz, hogy területe kisebb 100 km2-nél, vagy pedig a lakossága kevesebb 20.000 főnél?
                <br>18. feladat - Hány ország területe 50.000 és 150.000 km2 közötti?
                <br>19. feladat - Hány ország lakossága 8 és 12 millió közötti?
                <br>20. feladat - Mely fővárosok népesebbek 20 millió főnél?
                <br>21. feladat - Mely országok népsűrűsége nagyobb 500 fő/km2-nél?
                <br>22. feladat - Hány ország államformája köztársaság?
                <br>23. feladat - Mely országok pénzneme a kelet-karib dollár?
                <br>24. feladat - Hány ország nevében van benne az "ORSZÁG" szó?
                <br>25. feladat - Mely országokban korona a hivatalos fizetőeszköz?
                <br>26. feladat - Mennyi Európa területe?
                <br>27. feladat - Mennyi Európa lakossága?
                <br>28. feladat - Mennyi Európa népsűrűsége?
                <br>29. feladat - Hány ország van Afrikában?
                <br>30. feladat - Mennyi Afrika lakossága?
                <br>31. feladat - Mennyi Afrika népsűrűsége?
                <br>32. feladat - Melyek a szigetországok?
                <br>33. feladat - Mely országok államformája hercegség, vagy királyság?
                <br>34. feladat - Hány országnak nincs autójelzése?
                <br>35. feladat - Mennyi a váltószáma az aprópénznek azokban az országokban, ahol nem 100?
                <br>36. feladat - Hány ország területe kisebb Magyarországénál?
                <br>37. feladat - Melyik a legnagyobb területű ország, és mennyi a területe?
                <br>38. feladat - Melyik a legkisebb területű ország, és mennyi a területe?
                <br>39. feladat - Melyik a legnépesebb ország, és hány lakosa van?
                <br>40. feladat - Melyik a legkisebb népességű ország, és hány lakosa van?
                <br>41. feladat - Melyik a legsűrűbben lakott ország, és mennyi a népsűrűsége?
                <br>42. feladat - Melyik a legritkábban lakott ország, és mennyi a népsűrűsége?
                <br>43. feladat - Melyik a legnagyobb afrikai ország és mekkora?
                <br>44. feladat - Melyik a legkisebb amerikai ország és hányan lakják?
                <br>45. feladat - Melyik az első három legsűrűbben lakott "országméretű" ország (tehát nem város- vagy törpeállam)?
                <br>46. feladat - Melyik a világ hat legnépesebb fővárosa?
                <br>47. feladat - Melyik tíz ország egy főre jutó GDP-je a legnagyobb?
                <br>48. feladat - Melyik tíz ország össz-GDP-je a legnagyobb?
                <br>49. feladat - Melyik országban a legszegényebbek az emberek?
                <br>50. feladat - Melyik a 40. legkisebb területű ország?
                <br>51. feladat - Melyik a 15. legkisebb népsűrűségű ország?
                <br>52. feladat - Melyik a 61. legnagyobb népsűrűségű ország?
                <br>53. feladat - Melyik három ország területe hasonlít leginkább Magyaroszág méretéhez?
                <br>54. feladat - Az emberek hányadrésze él Ázsiában?
                <br>55. feladat - A szárazföldek mekkora hányadát foglalja el Oroszország?
                <br>56. feladat - Az emberek hány százaléka fizet euroval?
                <br>57. feladat - Hányszorosa a leggazdagabb ország egy főre jutó GDP-je a legszegényebb ország egy főre jutó GDP-jének?
                <br>58. feladat - A világ össz-GDP-jének hány százalékát adja az USA?
                <br>59. feladat - A világ össz-GDP-jének hány százalékát adja az euroövezet?
                <br>60. feladat - Melyek azok az átlagnál gazdagabb országok, amelyek nem az európai vagy az amerikai kontinensen találhatóak?
                <br>61. feladat - Milyen államformák léteznek Európában?
                <br>62. feladat - Hányféle államforma létezik a világon?
                <br>63. feladat - Hányféle fizetőeszközt használnak Európában az eurón kívül?
                <br>64. feladat - Mely pénznemeket használják több országban is?
                <br>65. feladat - Mely országok államformája egyedi?
            </div>
        </div>
    </body>
</html>
