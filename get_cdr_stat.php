<?php
require_once 'vendor/connect.php';
$db_table = "cdr_test_alchemy";
$db_table_area_code = "area_code";

$month_id = $_POST['month_id'];

$price = array();


$query = ("SELECT price FROM \"$db_table_area_code\" ");

$result = pg_query($connect, $query) or die("Ошибка " . pg_last_error($connect)); 
if($result)
{
    $rows = pg_num_rows($result); 

    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = pg_fetch_row($result);
            for ($j = 0 ; $j < 1 ; ++$j) array_push($price, $row[$j]);
    }

    // очищаем результат
    pg_free_result($result);
}

// echo $price[25];




$query = ("SELECT
\"request_1\" AS \"Total_Call_Count\",
\"request_2\" AS \"Austria\",
\"request_3\" AS \"Belgium\",
\"request_4\" AS \"Bulgaria\",
\"request_5\" AS \"Czesh\",
\"request_6\" AS \"Denmark\",
\"request_7\" AS \"Estonia\",
\"request_8\" AS \"Finland\",
\"request_9\" AS \"France\",
\"request_10\" AS \"Germany\",
\"request_11\" AS \"Greece\",
\"request_12\" AS \"Hungary\",
\"request_13\" AS \"Italy\",
\"request_14\" AS \"Latvia\",
\"request_15\" AS \"Lithuania\",
\"request_16\" AS \"Luxemburg\",
\"request_17\" AS \"Netherlands\",
\"request_18\" AS \"Norway\",
\"request_19\" AS \"Poland\",
\"request_20\" AS \"Portugal\",
\"request_21\" AS \"Romania\",
\"request_22\" AS \"Russia\",
\"request_23\" AS \"Slovakia\",
\"request_24\" AS \"Slovenia\",
\"request_25\" AS \"Spain\",
\"request_26\" AS \"Sweden\",
\"request_27\" AS \"Switzerland\",
\"request_28\" AS \"United Kingdom\"

FROM 
(SELECT ((SUM(\"Call_Duration\") / 60)) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND  \"Connect_Time\" LIKE '%$month_id%')  AS \"request_1\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND  ( \"Source_URI\" LIKE '43%' OR \"Destination_URI\" LIKE '43%'))  AS \"request_2\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '32%' OR \"Destination_URI\" LIKE '32%'))  AS \"request_3\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '359%' OR \"Destination_URI\" LIKE '359%'))  AS \"request_4\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '420%' OR \"Destination_URI\" LIKE '420%'))  AS \"request_5\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '45%' OR \"Destination_URI\" LIKE '45%'))  AS \"request_6\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '372%' OR \"Destination_URI\" LIKE '372%'))  AS \"request_7\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '358%' OR \"Destination_URI\" LIKE '358%'))  AS \"request_8\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '33%' OR \"Destination_URI\" LIKE '33%'))  AS \"request_9\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '49%' OR \"Destination_URI\" LIKE '49%'))  AS \"request_10\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '30%' OR \"Destination_URI\" LIKE '30%'))  AS \"request_11\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '36%' OR \"Destination_URI\" LIKE '36%'))  AS \"request_12\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '39%' OR \"Destination_URI\" LIKE '39%'))  AS \"request_13\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '371%' OR \"Destination_URI\" LIKE '371%'))  AS \"request_14\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '370%' OR \"Destination_URI\" LIKE '370%'))  AS \"request_15\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '352%' OR \"Destination_URI\" LIKE '352%'))  AS \"request_16\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '31%' OR \"Destination_URI\" LIKE '31%'))  AS \"request_17\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '47%' OR \"Destination_URI\" LIKE '47%'))  AS \"request_18\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '48%' OR \"Destination_URI\" LIKE '48%'))  AS \"request_19\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '351%' OR \"Destination_URI\" LIKE '351%'))  AS \"request_20\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '40%' OR \"Destination_URI\" LIKE '40%'))  AS \"request_21\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '7%' OR \"Destination_URI\" LIKE '7%'))  AS \"request_22\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '421%' OR \"Destination_URI\" LIKE '421%'))  AS \"request_23\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '386%' OR \"Destination_URI\" LIKE '386%'))  AS \"request_24\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '34%' OR \"Destination_URI\" LIKE '34%'))  AS \"request_25\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%'AND ( \"Source_URI\" LIKE '46%' OR \"Destination_URI\" LIKE '46%'))  AS \"request_26\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '41%' OR \"Destination_URI\" LIKE '41%'))  AS \"request_27\",
(SELECT ((SUM(\"Call_Duration\") / 60))  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '44%' OR \"Destination_URI\" LIKE '44%'))  AS \"request_28\"

; ");

// FROM 
// (SELECT SUM(\"Call_Duration\") FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND  \"Connect_Time\" LIKE '%$month_id%')  AS \"request_1\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND  ( \"Source_URI\" LIKE '43%' OR \"Destination_URI\" LIKE '43%'))  AS \"request_2\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '32%' OR \"Destination_URI\" LIKE '32%'))  AS \"request_3\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '359%' OR \"Destination_URI\" LIKE '359%'))  AS \"request_4\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '420%' OR \"Destination_URI\" LIKE '420%'))  AS \"request_5\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '45%' OR \"Destination_URI\" LIKE '45%'))  AS \"request_6\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '372%' OR \"Destination_URI\" LIKE '372%'))  AS \"request_7\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '358%' OR \"Destination_URI\" LIKE '358%'))  AS \"request_8\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '33%' OR \"Destination_URI\" LIKE '33%'))  AS \"request_9\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '49%' OR \"Destination_URI\" LIKE '49%'))  AS \"request_10\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '30%' OR \"Destination_URI\" LIKE '30%'))  AS \"request_11\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '36%' OR \"Destination_URI\" LIKE '36%'))  AS \"request_12\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '39%' OR \"Destination_URI\" LIKE '39%'))  AS \"request_13\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '371%' OR \"Destination_URI\" LIKE '371%'))  AS \"request_14\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '370%' OR \"Destination_URI\" LIKE '370%'))  AS \"request_15\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '352%' OR \"Destination_URI\" LIKE '352%'))  AS \"request_16\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '31%' OR \"Destination_URI\" LIKE '31%'))  AS \"request_17\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '47%' OR \"Destination_URI\" LIKE '47%'))  AS \"request_18\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '48%' OR \"Destination_URI\" LIKE '48%'))  AS \"request_19\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '351%' OR \"Destination_URI\" LIKE '351%'))  AS \"request_20\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '40%' OR \"Destination_URI\" LIKE '40%'))  AS \"request_21\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '7%' OR \"Destination_URI\" LIKE '7%'))  AS \"request_22\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '421%' OR \"Destination_URI\" LIKE '421%'))  AS \"request_23\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '386%' OR \"Destination_URI\" LIKE '386%'))  AS \"request_24\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '34%' OR \"Destination_URI\" LIKE '34%'))  AS \"request_25\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%'AND ( \"Source_URI\" LIKE '46%' OR \"Destination_URI\" LIKE '46%'))  AS \"request_26\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '41%' OR \"Destination_URI\" LIKE '41%'))  AS \"request_27\",
// (SELECT SUM(\"Call_Duration\")  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '44%' OR \"Destination_URI\" LIKE '44%'))  AS \"request_28\"


$result = pg_query($connect, $query) or die("Ошибка " . pg_last_error($connect)); 
if($result)
{
    $rows = pg_num_rows($result); // количество полученных строк


    echo "<table style=\"font-size:70%\" class=\"table  table-striped table_title\">
            <thead class=\"thead-dark \"> 
                <tr class=\"active\"></th>
                    <th>Duration sum, min:</th>
                    <th>Austria</th>
                    <th>Belgium</th>
                    <th>Bulgaria</th>
                    <th>Czesh</th>
                    <th>Denmark</th>
                    <th>Estonia</th>
                    <th>Finland</th>
                    <th>France</th>
                    <th>Germany</th>
                    <th>Greece</th>
                    <th>Hungary</th>
                    <th>Italy</th>
                    <th>Latvia</th>
                    <th>Lithuania</th>
                    <th>Luxemburg</th>
                    <th>Netherlands</th>
                    <th>Norway</th>
                    <th>Poland</th>
                    <th>Portugal</th>
                    <th>Romania</th>
                    <th>Russia</th>
                    <th>Slovakia</th>
                    <th>Slovenia</th>
                    <th>Spain</th>
                    <th>Sweden</th>
                    <th>Switzerland</th>
                    <th>United Kingdom</th>
                </tr></thead>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = pg_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 28 ; ++$j) echo "<td>".str_replace(array( '(', ')' ), '', $row[$j])."</td>"; 
        // for ($j = 0 ; $j < 28 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";

    // очищаем результат
    pg_free_result($result);
}





// ------------------------------------------------------------------------------------------

// $query = ("SELECT \"request_1\" AS \"Call_Duration\", \"request_2\" AS \"Call_Count\" 
// FROM 
//     (SELECT SUM(\"Call_Duration\") FROM \"$db_table\"  WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Connect_Time\" LIKE '%$month_id%' ) AS \"request_1\", 
//     (SELECT COUNT(\"Call_Duration\") FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%') AS \"request_2\"; "
// );


$query = ("SELECT
\"request_1\" AS \"Total_Call_Count\",
\"request_2\" AS \"Austria\",
\"request_3\" AS \"Belgium\",
\"request_4\" AS \"Bulgaria\",
\"request_5\" AS \"Czesh\",
\"request_6\" AS \"Denmark\",
\"request_7\" AS \"Estonia\",
\"request_8\" AS \"Finland\",
\"request_9\" AS \"France\",
\"request_10\" AS \"Germany\",
\"request_11\" AS \"Greece\",
\"request_12\" AS \"Hungary\",
\"request_13\" AS \"Italy\",
\"request_14\" AS \"Latvia\",
\"request_15\" AS \"Lithuania\",
\"request_16\" AS \"Luxemburg\",
\"request_17\" AS \"Netherlands\",
\"request_18\" AS \"Norway\",
\"request_19\" AS \"Poland\",
\"request_20\" AS \"Portugal\",
\"request_21\" AS \"Romania\",
\"request_22\" AS \"Russia\",
\"request_23\" AS \"Slovakia\",
\"request_24\" AS \"Slovenia\",
\"request_25\" AS \"Spain\",
\"request_26\" AS \"Sweden\",
\"request_27\" AS \"Switzerland\",
\"request_28\" AS \"United Kingdom\"

FROM 
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0 AND \"Connect_Time\" LIKE '%$month_id%' ) AS \"request_1\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND  ( \"Source_URI\" LIKE '43%' OR \"Destination_URI\" LIKE '43%'))  AS \"request_2\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '32%' OR \"Destination_URI\" LIKE '32%'))  AS \"request_3\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '359%' OR \"Destination_URI\" LIKE '359%'))  AS \"request_4\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '420%' OR \"Destination_URI\" LIKE '420%'))  AS \"request_5\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '45%' OR \"Destination_URI\" LIKE '45%'))  AS \"request_6\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '372%' OR \"Destination_URI\" LIKE '372%'))  AS \"request_7\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '358%' OR \"Destination_URI\" LIKE '358%'))  AS \"request_8\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '33%' OR \"Destination_URI\" LIKE '33%'))  AS \"request_9\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '49%' OR \"Destination_URI\" LIKE '49%'))  AS \"request_10\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '30%' OR \"Destination_URI\" LIKE '30%'))  AS \"request_11\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '36%' OR \"Destination_URI\" LIKE '36%'))  AS \"request_12\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '39%' OR \"Destination_URI\" LIKE '39%'))  AS \"request_13\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '371%' OR \"Destination_URI\" LIKE '371%'))  AS \"request_14\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '370%' OR \"Destination_URI\" LIKE '370%'))  AS \"request_15\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '352%' OR \"Destination_URI\" LIKE '352%'))  AS \"request_16\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '31%' OR \"Destination_URI\" LIKE '31%'))  AS \"request_17\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '47%' OR \"Destination_URI\" LIKE '47%'))  AS \"request_18\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '48%' OR \"Destination_URI\" LIKE '48%'))  AS \"request_19\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '351%' OR \"Destination_URI\" LIKE '351%'))  AS \"request_20\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '40%' OR \"Destination_URI\" LIKE '40%'))  AS \"request_21\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '7%' OR \"Destination_URI\" LIKE '7%'))  AS \"request_22\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '421%' OR \"Destination_URI\" LIKE '421%'))  AS \"request_23\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '386%' OR \"Destination_URI\" LIKE '386%'))  AS \"request_24\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '34%' OR \"Destination_URI\" LIKE '34%'))  AS \"request_25\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%'AND ( \"Source_URI\" LIKE '46%' OR \"Destination_URI\" LIKE '46%'))  AS \"request_26\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '41%' OR \"Destination_URI\" LIKE '41%'))  AS \"request_27\",
(SELECT COUNT(*) FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '44%' OR \"Destination_URI\" LIKE '44%'))  AS \"request_28\"

; ");




$result = pg_query($connect, $query) or die("Ошибка " . pg_last_error($connect)); 
if($result)
{
    $rows = pg_num_rows($result); 


    echo "<table style=\"font-size:70%\" class=\"table  table-striped table_title\">
            <thead class=\"thead-dark \"> 
                <tr class=\"active\"></th>
                    <th>Calls count, n:</th>
                    <th>Austria</th><th>Belgium</th>
                    <th>Bulgaria</th>
                    <th>Czesh</th>
                    <th>Denmark</th>
                    <th>Estonia</th>
                    <th>Finland</th>
                    <th>France</th>
                    <th>Germany</th>
                    <th>Greece</th>
                    <th>Hungary</th>
                    <th>Italy</th>
                    <th>Latvia</th>
                    <th>Lithuania</th>
                    <th>Luxemburg</th>
                    <th>Netherlands</th>
                    <th>Norway</th>
                    <th>Poland</th>
                    <th>Portugal</th>
                    <th>Romania</th>
                    <th>Russia</th>
                    <th>Slovakia</th>
                    <th>Slovenia</th>
                    <th>Spain</th>
                    <th>Sweden</th>
                    <th>Switzerland</th>
                    <th>United Kingdom</th>
                </tr></thead>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = pg_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 28 ; ++$j) echo "<td>".str_replace(array( '(', ')' ), '', $row[$j])."</td>"; 
        echo "</tr>";
    }
    echo "</table>";

    // очищаем результат
    pg_free_result($result);
}



//-------------------------------------------------------------------------
// $query = ("SELECT
// \"request_1\" AS \"Total_Call_Count\",
// \"request_2\" AS \"Austria\",
// \"request_3\" AS \"Belgium\",
// \"request_4\" AS \"Bulgaria\",
// \"request_5\" AS \"Czesh\",
// \"request_6\" AS \"Denmark\",
// \"request_7\" AS \"Estonia\",
// \"request_8\" AS \"Finland\",
// \"request_9\" AS \"France\",
// \"request_10\" AS \"Germany\",
// \"request_11\" AS \"Greece\",
// \"request_12\" AS \"Hungary\",
// \"request_13\" AS \"Italy\",
// \"request_14\" AS \"Latvia\",
// \"request_15\" AS \"Lithuania\",
// \"request_16\" AS \"Luxemburg\",
// \"request_17\" AS \"Netherlands\",
// \"request_18\" AS \"Norway\",
// \"request_19\" AS \"Poland\",
// \"request_20\" AS \"Portugal\",
// \"request_21\" AS \"Romania\",
// \"request_22\" AS \"Russia\",
// \"request_23\" AS \"Slovakia\",
// \"request_24\" AS \"Slovenia\",
// \"request_25\" AS \"Spain\",
// \"request_26\" AS \"Sweden\",
// \"request_27\" AS \"Switzerland\",
// \"request_28\" AS \"United Kingdom\"

// FROM 
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[0])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND  \"Connect_Time\" LIKE '%$month_id%')  AS \"request_1\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[0])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND  ( \"Source_URI\" LIKE '43%' OR \"Destination_URI\" LIKE '43%'))  AS \"request_2\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[1])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '32%' OR \"Destination_URI\" LIKE '32%'))  AS \"request_3\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[2])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '359%' OR \"Destination_URI\" LIKE '359%'))  AS \"request_4\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[3])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '420%' OR \"Destination_URI\" LIKE '420%'))  AS \"request_5\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[4])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '45%' OR \"Destination_URI\" LIKE '45%'))  AS \"request_6\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[5])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '372%' OR \"Destination_URI\" LIKE '372%'))  AS \"request_7\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[6])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '358%' OR \"Destination_URI\" LIKE '358%'))  AS \"request_8\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[7])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '33%' OR \"Destination_URI\" LIKE '33%'))  AS \"request_9\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[8])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '49%' OR \"Destination_URI\" LIKE '49%'))  AS \"request_10\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[9])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '30%' OR \"Destination_URI\" LIKE '30%'))  AS \"request_11\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[10])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '36%' OR \"Destination_URI\" LIKE '36%'))  AS \"request_12\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[11])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '39%' OR \"Destination_URI\" LIKE '39%'))  AS \"request_13\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[12])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '371%' OR \"Destination_URI\" LIKE '371%'))  AS \"request_14\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[13])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '370%' OR \"Destination_URI\" LIKE '370%'))  AS \"request_15\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[14])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '352%' OR \"Destination_URI\" LIKE '352%'))  AS \"request_16\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[15])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '31%' OR \"Destination_URI\" LIKE '31%'))  AS \"request_17\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[16])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '47%' OR \"Destination_URI\" LIKE '47%'))  AS \"request_18\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[17])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '48%' OR \"Destination_URI\" LIKE '48%'))  AS \"request_19\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[18])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '351%' OR \"Destination_URI\" LIKE '351%'))  AS \"request_20\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[20])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '40%' OR \"Destination_URI\" LIKE '40%'))  AS \"request_21\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[19])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '7%' OR \"Destination_URI\" LIKE '7%'))  AS \"request_22\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[21])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '421%' OR \"Destination_URI\" LIKE '421%'))  AS \"request_23\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[22])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '386%' OR \"Destination_URI\" LIKE '386%'))  AS \"request_24\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[23])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '34%' OR \"Destination_URI\" LIKE '34%'))  AS \"request_25\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[24])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%'AND ( \"Source_URI\" LIKE '46%' OR \"Destination_URI\" LIKE '46%'))  AS \"request_26\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[25])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '41%' OR \"Destination_URI\" LIKE '41%'))  AS \"request_27\",
// (SELECT ((SUM(\"Call_Duration\") / 60) * $price[25])  FROM \"$db_table\" WHERE \"IP_Group_Name\"='BICS' AND \"IP_Profile_Name\"='BICS' AND \"Call_Duration\" != 0  AND \"Connect_Time\" LIKE '%$month_id%' AND ( \"Source_URI\" LIKE '44%' OR \"Destination_URI\" LIKE '44%'))  AS \"request_28\"

// ; ");

// $result = pg_query($connect, $query) or die("Ошибка " . pg_last_error($connect)); 
// if($result)
// {
//     $rows = pg_num_rows($result); // количество полученных строк


//     echo "<table class=\"table table-hover table-condensed\"> <tr class=\"active\"></th><th>Approximate cost,€:</th><th>Austria</th><th>Belgium</th><th>Bulgaria</th><th>Czesh</th><th>Denmark</th><th>Estonia</th><th>Finland</th><th>France</th><th>Germany</th><th>Greece</th><th>Hungary</th><th>Italy</th><th>Latvia</th><th>Lithuania</th><th>Luxemburg</th><th>Netherlands</th><th>Norway</th><th>Poland</th><th>Portugal</th><th>Romania</th><th>Russia</th><th>Slovakia</th><th>Slovenia</th><th>Spain</th><th>Sweden</th><th>Switzerland</th><th>United Kingdom</th>";
//     for ($i = 0 ; $i < $rows ; ++$i)
//     {
//         $row = pg_fetch_row($result);
//         echo "<tr>";
//             for ($j = 0 ; $j < 28 ; ++$j) echo "<td>".str_replace(array( '(', ')' ), '', $row[$j])."</td>"; 
//         // for ($j = 0 ; $j < 28 ; ++$j) echo "<td>$row[$j]</td>";
//         echo "</tr>";
//     }
//     echo "</table>";

//     // очищаем результат
//     pg_free_result($result);
// }



// pg_close($connect);


?>






