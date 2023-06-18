<?php
function getHeaders($data_array): string {
    $headers = "";
    foreach ($data_array as $field) {
        $headers .= "<th>$field->name</th>";
    }
    return $headers;
}

function getData($data): string {
    $result = "";
    while ($table_row = $data->fetch_assoc()) {
        $result .= "<tr>";
        foreach (array_keys($table_row) as $table_key) {
                $result .= "<td style=border-width:1px;border-style:solid;>$table_row[$table_key]</td>";
        }
        $result .= "</tr>";
    }
    return $result;
}

$host="sql7.freemysqlhosting.net";
$uname="sql7623590";
$pass="hcgbzgxuqN";
$dbname="sql7623590";
$db = mysqli_connect($host,$uname,$pass,$dbname) or die("cannot connect");

$sql = "SHOW TABLES;";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    foreach ($row as $key=>$table) {
        $sql = "SELECT * FROM $table;";
        $data = $db->query($sql);
        $rows = $data->num_rows;
        $data_array = $data->fetch_fields();
        echo "<div style=display:flex;flex-direction:column;border-width:1px;border-style:solid;>
            <h3>Table: $table (rows: $rows)</h3>
            <table style=text-align:center;>
                <thead>
                    <tr> 
                        ".getHeaders($data_array)."
                    </tr>
                </thead>
                <tbody>
                    ".getData($data)."
                </tbody>
            </table>
        </div>";
    }
}
$db->close();
?>