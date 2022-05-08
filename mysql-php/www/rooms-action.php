<?php
require_once ('connection.php');

class Rooms
{
    public function listRooms()
    {
        global $conn;
        
        $sqlQuery = "SELECT r.room_id as 'Room_Id', r.room_type 'Room_Type',  r.room_capacity as 'Room_Limit', l.location_name  as 'Room_Location' FROM rooms r JOIN location l USING (location_id)";
        
//                 if (! empty($_POST["search"]["value"])) {
//                     $sqlQuery .= 'WHERE (r.room_type LIKE "%' . $_POST["search"]["value"] . '%") ';
//                 }
        
//                 if (! empty($_POST["order"])) {
//                     $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
//                 } else {
//                     $sqlQuery .= 'ORDER BY r.room_type DESC ';
//                 }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
//                 if ($_POST["length"] != - 1) {
//                     $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
//                 }
        
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Room_Id'];
            $dataRow[] = $sqlRow['Room_Type'];
            $dataRow[] = $sqlRow['Room_Limit'];
            $dataRow[] = $sqlRow['Room_Location'];

            
            $dataRow[] = '<button type="button" name="update" emp_id="' . $sqlRow["Room_Id"] . '" class="btn btn-warning btn-sm update">Book Room</button>
                          <button type="button" name="delete" emp_id="' . $sqlRow["Room_Id"] . '" class="btn btn-danger btn-sm delete">Unbook Room</button>';
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
    
}

$room = new Rooms();

if(!empty($_POST['action']) && $_POST['action'] == 'listRooms') {
    $room->listRooms();
}


?>