<?php
require_once ('connection-member.php');

class Rooms
{
    public function listRooms()
    {
        global $conn;
        
        $sqlQuery = "SELECT r.room_id as 'ID', r.room_type 'room_type',  r.limit_capacity as 'limit_capacity', r.max_limit as 'max_limit',  l.location_id  as 'location_id' FROM rooms r JOIN location l USING (location_id)";
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (r.room_type LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY r.room_type DESC ';
        }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        if ($_POST["length"] != - 1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['ID'];
            $dataRow[] = $sqlRow['room_type'];
            $dataRow[] = $sqlRow['limit_capacity'];
            $dataRow[] = $sqlRow['max_limit'];
            $dataRow[] = $sqlRow['location_id'];
            
            $dataRow[] = '<button type="button" name="update" emp_id="' . $sqlRow["ID"] . '" class="btn btn-warning btn-sm update">Book Room</button>
                          <button type="button" name="delete" emp_id="' . $sqlRow["ID"] . '" class="btn btn-danger btn-sm delete" >Unbook Room</button>';
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }


    
    public function updateRoom()
    {
        global $conn;
        
        global $conn;
        if ($_POST["ID"]) {
            $sqlQuery = "SELECT * FROM users_rooms WHERE username_id = :username_id AND room_id = :room_id;" ;
                $stmt = $conn->prepare($sqlQuery);
                $stmt->bindValue(':room_id', $_POST["ID"]);
                $stmt->bindValue(':username_id', $_SESSION['username_id']);
                $stmt->execute();
                $queryResult = $stmt->fetch();
                
                // this means that the user has already booked it
                if (!empty($queryResult)){
                   
                    ?>
                    <body>
                    <?php
                    
                    echo '<script>alert("You have already booked this room! Try booking another room")</script>';
                    ?>
</body>

<?php
                    
                }
                else{
                    $sqlQuery = "INSERT INTO users_rooms (username_id, room_id) VALUES (:username_id, :room_id);";
                    $stmt = $conn->prepare($sqlQuery);
                    $stmt->bindValue(':room_id', $_POST["ID"]);
                    $stmt->bindValue(':username_id', $_SESSION['username_id']);
                    
                    $stmt->execute();
                    
                    $sqlQuery = "UPDATE rooms SET limit_capacity = limit_capacity-1 WHERE room_id = :room_id;";
                    $stmt = $conn->prepare($sqlQuery);
                    $stmt->bindValue(':room_id', $_POST["ID"]);
                    $stmt->bindValue(':username_id', $_SESSION['username_id']);
                    
                    $stmt->execute();
                    ?>
                    <body>
                    <?php
                   
                    
                    echo '<script>alert("You booked this room!")</script>';
                    ?>
</body>
<?php
                  
                }
            // need to do a little check to see if the user has already booked that room
           
            
        
    }
   
    
    }
    
    public function deleteRoom()
    {
        global $conn;
        if ($_POST["ID"]) {
            
            $sqlQuery = "DELETE FROM users_rooms WHERE room_id = :room_id;";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':room_id', $_POST["ID"]);
            $stmt->execute();
            
            $sqlQuery = "DELETE FROM rooms WHERE room_id = :room_id;";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':room_id', $_POST["ID"]);
            $stmt->execute();
        }
    }
    
    
    
    
}

$room = new Rooms();

if(!empty($_POST['action']) && $_POST['action'] == 'listRooms') {
    $room->listRooms();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRoom') {
    $room->updateRoom();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRoom') {
    $room->deleteRoom();
}


?>