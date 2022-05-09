<?php
require_once ('connection-member.php');

class Courts
{
    public function listCourts()
    {
        global $conn;
        
        $sqlQuery = "SELECT c.court_id as 'ID', c.court_type 'court_type',  c.limit_capacity as 'limit_capacity', c.max_limit as 'max_limit',  l.location_id  as 'location_id' FROM courts c JOIN location l USING (location_id)";
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (c.court_type LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY c.court_type DESC ';
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
            $dataRow[] = $sqlRow['court_type'];
            $dataRow[] = $sqlRow['limit_capacity'];
            $dataRow[] = $sqlRow['max_limit'];
            $dataRow[] = $sqlRow['location_id'];
            
            $dataRow[] = '<button type="button" name="update" emp_id="' . $sqlRow["ID"] . '" class="btn btn-warning btn-sm update">Book Court</button>
                          <button type="button" name="delete" emp_id="' . $sqlRow["ID"] . '" class="btn btn-danger btn-sm delete" >Unbook Court</button>';
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
    
    
    public function listCourtsBooked()
    {
        global $conn;
        
        $sqlQuery = "SELECT c.court_id as 'ID', c.court_type 'court_type', l.location_id  as 'location_id' FROM courts c JOIN users_courts USING (court_id) JOIN location l USING (location_id) WHERE username_id = :username_id";
        
       
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bindValue(':username_id', $_SESSION['username_id']);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['ID'];
            $dataRow[] = $sqlRow['court_type'];
            $dataRow[] = $sqlRow['location_id'];
            
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
    

    
    public function updateCourt()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            $sqlQuery = "CALL addMemberToCourt( :username_id, (:court_id);" ;
                $stmt = $conn->prepare($sqlQuery);
                $stmt->bindValue(':court_id', $_POST["ID"]);
                $stmt->bindValue(':username_id', $_SESSION['username_id']);
                $stmt->execute();
                       
                           
    }
   
    
    }
    
    public function deleteCourt()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            $sqlQuery = "CALL removeMemberFromCourt(:username_id, :court_id);" ;
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':court_id', $_POST["ID"]);
            $stmt->bindValue(':username_id', $_SESSION['username_id']);
            $stmt->execute();
           
            
            
        }
    
    
    
    
}
}

$court = new Courts();

if(!empty($_POST['action']) && $_POST['action'] == 'listCourts') {
    $court->listCourts();
}
if(!empty($_POST['action']) && $_POST['action'] == 'listCourtsBooked'){
    $court->listCourtsBooked();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRoom') {
    $court->updateCourt();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRoom') {
    $court->deleteCourt();
    
}


?>
