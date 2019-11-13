<?php

$mysqli = new mysqli('localhost', 'root', '', 'ets');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM items WHERE deleted != '1'");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['hallID'] ?></td>
            <td><?php echo $row['itemNo'] ?></td>
            <td><?php echo $row['type'] ?></td>
            <td><?php echo $row['noOfItems'] ?></td>
            <td><?php echo $row['status'] ?></td>
    
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);



    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE items SET itemNo='" . $input['itemNo'] . "', type='" . $input['type'] . "', noOfItems='" . $input['noOfItems'] . "', status='" . $input['status'] .  "' WHERE hallID='" . $input['hallID'] . "'");
    } else if ($input['action'] == 'delete') {
        $mysqli->query("UPDATE items SET deleted=1 hallID='" . $input['hallID'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE items SET deleted=0 hallID='" . $input['hallID'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>