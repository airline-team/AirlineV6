<?php
if(isset($_POST['search_this'])){
    require_once '../constants.php';
    $search_text = mysqli_real_escape_string($dbc, trim($_POST['search_this']));

    echo "---------------------------------------------";
    echo '<br>';
    echo "Поля в таблице company:";

    $sql = "SHOW COLUMNS FROM company";
    $query = mysqli_query($dbc,$sql);
    $company_columns = [];

    echo '<br>';
    while ($res = mysqli_fetch_array($query)){
        $company_columns[] = $res[0];
        print $res[0];
        print "<br>";
    }

    print "<br>";
    echo "---------------------------------------------";
    echo '<br>';
    echo "Поля в таблице company_service:";
    echo '<br>';
    $sql = "SHOW COLUMNS FROM company_service";
    $query = mysqli_query($dbc,$sql);
    $company_service_columns = [];

    echo '<br>';
    while ($res = mysqli_fetch_array($query)){
        $company_service_columns[] = $res[0];
        print $res[0];
        print "<br>";
    }

    $sql = "select * from `company` where concat(".implode(',', $company_columns).") like '%$search_text%'";
    $result = $dbc -> query($sql);

    echo "---------------------------------------------";
    echo '<br>';
    echo "Поиск по Company table:";
    echo "<br>";
    echo "<br>";
    foreach ($result as $item){
        foreach ($item as $value){
            print $value;
            echo '<br>';
        }
        echo '<br>';
    }

    echo "---------------------------------------------";
    echo '<br>';
    echo "Поиск по Company_service table:";
    echo '<br>';
    echo '<br>';

    $sql = "select * from `company_service` where concat(".implode(',', $company_service_columns).") like '%$search_text%'";
    $result = $dbc -> query($sql);

    foreach ($result as $item){
        foreach ($item as $value){
            print $value;
            echo '<br>';
        }
        echo '<br>';
    }

}else {
    echo "Nothing";
}