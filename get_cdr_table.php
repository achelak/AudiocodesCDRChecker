<?php

require_once 'vendor/connect.php';

$db_table = "cdr_test_alchemy";
// $countView = 10;
// $startIndex = ($pageNum-1)*$countView;



if ($_POST['phone_num'] > 0)
    {

    $phone_num = $_POST['phone_num'];
  
    $query = ("SELECT * FROM cdr_test_alchemy WHERE \"Source_URI\" LIKE '%$phone_num%' OR \"Destination_URI\" LIKE '%$phone_num%' ");

    $result = pg_query($connect, $query) or die("Ошибка " . pg_last_error($connect));
    
    if($result)
        {
        $rows = pg_num_rows($result); 

        echo "<table style=\"font-size:70%\" class=\"table  table-striped table_title\">
                <thead class=\"thead-dark \"> 
                    <tr class=\"active\">
                        </th><th>ID</th>
                        <th>Local Time</th>
                        <th>CDR Type</th>
                        <th>IP Group_Name</th>
                        <th>IP Profile Name</th>
                        <th>Call ID</th>
                        <th> Session ID</th>
                        <th>Setup Time</th>
                        <th>Connect Time</th>
                        <th>Release Time</th>
                        <th>Call Duration</th>
                        <th>Endpoint Type</th>
                        <th>Call Originated</th>
                        <th> Source URI</th>
                        <th>Destination URI</th>
                        <th>Termination Side</th>
                        <th>Termination Reason</th>
                        <th>SIP Termination_Reason</th>
                        <th>SIP Termination Description</th>
            </tr></thead>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = pg_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 19 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";

        pg_free_result($result);
        }

    pg_close($connect);

} else {
    echo "<p style=\"color:orange\";>Please enter valid phone number!</p>";
  }


?>






