<html>
<head>
  <title>dfkod</title>
</head>
<body>
<?php
if(isset($_REQUEST['search']))
{
    $toilet = $_REQUEST['toilet'];
    $unseen = $_REQUEST['unseen'];
    $tourdesk = $_REQUEST['tourdesk'];
    $wifi = $_REQUEST['wifi'];
    $threeGfourG = $_REQUEST['threeGfourG'];
    $Medical = $_REQUEST['Medical'];
    $facilitiesfordisabled = $_REQUEST['facilitiesfordisabled'];
    $history = $_REQUEST['history'];
    $activities = $_REQUEST['activities'];
    $festival = $_REQUEST['festival'];
    $security = $_REQUEST['security'];
    $variousnature = $_REQUEST['variousnature'];
    $replaceout = $_REQUEST['replaceout'];
    $replacein = $_REQUEST['replacein'];

    foreach ($_REQUEST['toilet'] as $toilet) {
        $statearray[] = mysqli_real_escape_string($toilet);
    }
    foreach ($_REQUEST['unseen'] as $unseen) {
        $statearray[] = mysql_reali_escape_string($unseen);
    }
    foreach ($_REQUEST['tourdesk'] as $tourdesk) {
        $statearray[] = mysql_reali_escape_string($tourdesk);
    }
    foreach ($_REQUEST['wifi'] as $wifi) {
      $statearray[] = mysql_reali_escape_string($wifi);
    }
    foreach ($_REQUEST['threeGfourG'] as $threeGfourG) {
        $statearray[] = mysql_reali_escape_string($threeGfourG);
    }
    foreach ($_REQUEST['Medical'] as $Medical) {
        $statearray[] = mysql_reali_escape_string($Medical);
    }
    foreach ($_REQUEST['facilitiesfordisabled'] as $facilitiesfordisabled) {
        $statearray[] = mysql_reali_escape_string($facilitiesfordisabled);
    }
    foreach ($_REQUEST['history'] as $history) {
        $statearray[] = mysql_reali_escape_string($history);
    }
    foreach ($_REQUEST['activities'] as $activities) {
        $statearray[] = mysql_reali_escape_string($activities);
    }
    foreach ($_REQUEST['festival'] as $festival) {
        $statearray[] = mysql_reali_escape_string($festival);
    }
    foreach ($_REQUEST['security'] as $security) {
        $statearray[] = mysql_reali_escape_string($security);
    }
    foreach ($_REQUEST['variousnature'] as $variousnature) {
        $statearray[] = mysql_reali_escape_string($variousnature);
    }
    foreach ($_REQUEST['replaceout'] as $replaceout) {
        $statearray[] = mysql_reali_escape_string($replaceout);
    }
    foreach ($_REQUEST['replacein'] as $replacein) {
        $statearray[] = mysql_reali_escape_string($replacein);
    }
    $states = implode ("','", $statearray);
    //$codes = implode ("','", $codesarray);
    //$hsn = implode ("','", $hsnarray);
    $sql = "SELECT * FROM attractions WHERE attracID IN ('$states')";

    //Now we search for our search term, in the field the user specified
    $result = mysqli_query($sql) or die(mysqli_error());

    //This counts the number or results - and if there wasn't any it gives them a     little     message explaining that
    if (mysqli_num_rows($result) == 0)
    {
        echo "Sorry, but we can not find an entry to match your query...<br><br>";
    }
    else
    {
        echo "<table border='1' width='900' class='srchrslt'>
        <tr class='head'>
        <td>atname</td>
        <td>toilet</td>
        <td>threeGfourG</td>
        <td>unseen</td>
        <td>adress</td>
        </tr>";

        //And we display the results
        while($row = mysqli_fetch_assoc( $result ))
        {
            echo "<tr>";

            echo "<td>" . $row['atname'] . " </td>";
            echo "<td>" . $row['toilet'] . " </td>";
            echo "<td>" . $row['threeGfourG'] . " </td>";
            echo "<td>" . $row['unseen'] . " </td>";
            echo "<td>" . $row['adress'] . " </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>
</body>
</html>
