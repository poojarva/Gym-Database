<?php
require_once ('connection.php');

class Member
{
    public function listMembers()
    {
        global $conn;
        
        $sqlQuery = "SELECT m.username_id as 'ID', u.first_name as 'First Name', u.last_name as 'Last Name', l.location_id as 'Location ID', l.location_name as 'Location Name', u.email as 'Email' 
                     FROM members m JOIN users u USING (username_id) JOIN location l using (location_id)";
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (u.first_name LIKE "%' . $_POST["search"]["value"] . '%" OR u.last_name LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY u.username_id DESC ';
        }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        if ($_POST["length"] != - 1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['ID'];
            $dataRow[] = $sqlRow['First Name'];
            $dataRow[] = $sqlRow['Last Name'];
            $dataRow[] = $sqlRow['Location ID'];
            $dataRow[] = $sqlRow['Location Name'];
            $dataRow[] = $sqlRow['Email'];
            
            $dataRow[] = '<button type="button" name="update" emp_id="' . $sqlRow["ID"] . '" class="btn btn-warning btn-sm update">Update</button>
                          <button type="button" name="delete" emp_id="' . $sqlRow["ID"] . '" class="btn btn-danger btn-sm delete" >Delete</button>';
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
    
    public function getMember()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            
            $sqlQuery = "SELECT m.username_id as 'ID', u.first_name as 'First Name', u.last_name as 'Last Name', l.location_id as 'Location ID', l.location_name as 'Location Name', u.email as 'Email' 
                     FROM members m JOIN users u USING (username_id) JOIN location l using (location_id) WHERE ID = :usernameID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':username_ID', $_POST["ID"]);
            $stmt->execute();
            
            echo json_encode($stmt->fetch());
        }
    }
    
    public function updateMember()
    {
        global $conn;
        
        if ($_POST['ID']) {
            
            $sqlQuery = "UPDATE users
                            SET
                            first_name = :first_name,
                            last_name = :last_name,
                            location_id = :location_id,
                            email = :email,
                            password = :password
                            WHERE username_id = :username_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':first_name', $_POST["first_name"]);
            $stmt->bindValue(':last_name', $_POST["last_name"]);
            $stmt->bindValue(':email', $_POST["email"]);
            $stmt->bindValue(':location_id', $_POST["location_id"]);
            $stmt->bindValue(':password', password_hash($_POST["password"], PASSWORD_DEFAULT));
            $stmt->bindValue(':username_id', $_POST["ID"]);
            $stmt->execute();
        }
    }
    
    // TODO : add a check to see if the member is already in the system, throw an error if it is
    public function addMember()
    {
        global $conn;
        
        $sqlQuery = "INSERT INTO users
                     (first_name, last_name, password, type, location_id, email)
                     VALUES
                     (:first_name, :last_name, :password, 'Member', :location_id, :email)";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bindValue(':first_name', $_POST["first_name"]);
        $stmt->bindValue(':last_name', $_POST["last_name"]);
//       TEST: will the password hashing work?
        $stmt->bindValue(':password', password_hash($_POST["password"], PASSWORD_DEFAULT));
        $stmt->bindValue(':location_id', $_POST["location_id"]);
        $stmt->bindValue(':email', $_POST["email"]);
        $stmt->execute();
        
   // TODO!     //NEED TO ALSO ADD MEMBER TO MEMBERS TABLE!!
   
        $sqlQueryAddMember = "INSERT INTO members
                     (username_id) 
                     
                     SELECT username_id FROM users WHERE email = :email";
        
        $stmt = $conn->prepare($sqlQueryAddMember);
        $stmt->bindValue(':email', $_POST["email"]);
        $stmt->execute();
        
    }
    
    public function deleteMember()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            
            $sqlQuery = "DELETE FROM members WHERE username_id = :username_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':username_ID', $_POST["ID"]);
            $stmt->execute();
            
            $sqlQuery = "DELETE FROM members_equipment WHERE username_id = :username_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':username_ID', $_POST["ID"]);
            $stmt->execute();
            
            
            $sqlQuery = "DELETE FROM classes_members WHERE username_id = :username_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':username_ID', $_POST["ID"]);
            $stmt->execute();
            
            
            $sqlQuery = "DELETE FROM users_courts WHERE username_id = :username_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':username_ID', $_POST["ID"]);
            $stmt->execute();
            
            
            $sqlQuery = "DELETE FROM users_lockers WHERE username_id = :username_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':username_ID', $_POST["ID"]);
            $stmt->execute();
            
            
            $sqlQuery = "DELETE FROM users_rooms WHERE username_id = :username_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':username_ID', $_POST["ID"]);
            $stmt->execute();
            
            
            $sqlQuery = "DELETE FROM users WHERE username_id = :username_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':username_ID', $_POST["ID"]);
            $stmt->execute();
        }
    }
}

$member = new Member();

if(!empty($_POST['action']) && $_POST['action'] == 'listMembers') {
    $member->listMembers();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addMember') {
    $member->addMember();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getMember') {
    $member->getMember();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateMember') {
    $member->updateMember();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteMember') {
    $member->deleteMember();
}

?>