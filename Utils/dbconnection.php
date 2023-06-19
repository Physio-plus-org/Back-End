<?php 
class DBConnection {
    private $DB_HOST;
    private $DB_USERNAME;
    private $DB_PASSWORD;
    private $DB_NAME;
    private $DB_PORT;
    private $DB_CONN_OBJ;
    
    function __construct() {
        $this->DB_HOST= "localhost";
        $this->DB_USERNAME= "id20930892_physio_user";
        $this->DB_PASSWORD="Physio__Plus_User2023";
        $this->DB_NAME="id20930892_physio_plus";
        $this->DB_PORT=3306;
    }

    function connect() {
        $this->DB_CONN_OBJ = mysqli_connect(
            $this->DB_HOST,
            $this->DB_USERNAME,
            $this->DB_PASSWORD,
            $this->DB_NAME,
            $this->DB_PORT)
        or die("cannot connect");
        return $this->DB_CONN_OBJ ? True : False;
    }

    function close() {
        $this->DB_CONN_OBJ->close();
    }

    function error() {
        return $this->DB_CONN_OBJ->error;
    }

    function query($sql) {
        return $this->DB_CONN_OBJ->query($sql);
    }

    function show() {
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
        $sql = "SHOW TABLES;";
        $result = $this->query($sql);
        while ($row = $result->fetch_assoc()) {
            foreach ($row as $key=>$table) {
                $sql = "SELECT * FROM $table;";
                $data = $this->query($sql);
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
    }
}
?>