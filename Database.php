<?php

class Database {
    private $connection = null;

    public function __construct(string $host, string $user, string $password, string $dbname) {
        $this->connection = new mysqli($host, $user, $password, $dbname);

    }

    public function close() {
        $this->connection->close();
    }

    private function make_create_query(array $array, string $table): string {
        $raw = "INSERT INTO $table (";
        $names = [];
        $values = [];

        foreach($array as $name => $value) {
            array_push($names, $name);
            array_push($values, $value);
        }

        for($i = 0;$i < sizeof($names); $i++) {
            if($i + 1 != sizeof($names)) {
                $raw .= "$names[$i], ";
            } else {
                $raw .= "$names[$i]) VALUES (";
            }
        }


        for($i = 0;$i < sizeof($values); $i++) {
            if($i + 1 != sizeof($values)) {
                $raw .= "'$values[$i]', ";
            } else {
                $raw .= "'$values[$i]');";
            }
        }

        return $raw;
    }

    private function make_read_query(array $array, string $table) {
        $raw = "SELECT ";

        for($i = 0;$i < sizeof($array);$i++) {
            if($i + 1 != sizeof($array)) {
                $raw .= "$array[$i], ";
            } else {
                $raw .= "$array[$i] FROM $table;";
            }
        }

        return $raw;
    }

    private function make_update_query(array $array, string $table, string $id) {
        $raw = "UPDATE $table SET ";
        $names = [];
        $values = [];

        foreach($array as $name=>$value) {
            array_push($names, $name);
            array_push($values, $value);
        }

        for($i = 0;$i < sizeof($names);$i++) {
            if($i + 1 != sizeof($names)) {
                $raw .= "$names[$i] = '$values[$i]', ";
            } else {
                $raw .= "$names[$i] = '$values[$i]' WHERE id = '$id';";
            }
        }

        return $raw;
    }

    private function make_delete_query(string $table, string $id) {
        $raw = "DELETE FROM $table WHERE id = $id;";

        return $raw;
    }

    public function create(array $array, string $table) {
        // echo $this->make_create_query(["name" => "'joao'", "email" => "'joao@gmail.com'"]);
        mysqli_query($this->connection, $this->make_create_query($array, $table));
    }

    public function read($array, $table) {
        // echo $this->make_read_query($array, $table);
        $data = [];
        $response = mysqli_query($this->connection, $this->make_read_query($array, $table));
        while($row = $response->fetch_assoc()) {
            array_push($data, $row);
        }

        return $data;
    }
    
    public function update($array, $table, $id) {
        echo $this->make_update_query($array, $table, $id);
        mysqli_query($this->connection, $this->make_update_query($array, $table, $id));
    }

    public function delete($table, $id) {
        // echo $this->make_delete_query($table, $id);
        mysqli_query($this->connection, $this->make_delete_query($table, $id));
    }
}