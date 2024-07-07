<?php
 
header("Content-Type: application/json");

include_once 'Database.php';
include_once 'User.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
$request_method = $_SERVER["REQUEST_METHOD"];
switch($request_method) {
    case 'GET':
       if(!empty($_GET['name'])) {
            $user->name = $_GET['name'];
            $stmt = $user->read();
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            echo ("id: ".$row['id'].", User: ". $row['name']. ', password: '. $row['pass']. ', Email: '.$row['email']);       
        }           
        else {
        $stmt = $user->read1();
        $num = $stmt->rowCount();
        if($num > 0) {
            $users_arr = array();
            $users_arr["records"] = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ("id: ".$row['id'].", User: ". $row['name']. ', password: '. $row['pass']. ', Email: '.$row['email']."<br>\n\n"); 
            }
        } else {
            http_response_code(404);
            echo json_encode(["message" => "No users found."]);
        }
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        if(!empty($data->name) && !empty($data->email)) {
            $user->name = $data->name;
            $user->pass = $data->pass;
            $user->email = $data->email;
            if($user->create()) {
                http_response_code(201);
                echo json_encode(["message" => "User was created."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "Unable to create user."]);
            }
        } 
        elseif (!empty($data->name) && !empty($data->pass) && empty($data->email)) {
            $user->name = $data->name;
            $user->pass = $data->pass;  
            if($stmt = $user->auth()) {
                $users_arr = array();
                $users_arr["records"] = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $user_item = array(
                        "id" => $id,
                        "email" => $email
                    );
                    array_push($users_arr["records"], $user_item);
                }
                http_response_code(200);
                if (!empty($users_arr['records'][0]['id'])) echo ("id: ".$users_arr['records'][0]['id'].", User: ". $user->name. ', password: '. $user->pass. ', Email: '.$users_arr['records'][0]['email']);
                else echo "Данные не совпадают";
            } else {
                http_response_code(503);
                echo json_encode(["message" => "Unable to create user."]);
            }
        }  
        else {
            http_response_code(400);
            echo json_encode(["message" => "Unable to create user. Data is incomplete."]);
        }
        break;
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));    
        if(!empty($data->name) && !empty($data->email)) {            
            $user->pass = $data->pass;
            $user->name = $data->name;
            $user->email = $data->email;
            if($user->update()) {
                http_response_code(200);
                echo json_encode(["message" => "User was updated."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "Unable to update user."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Unable to update user. Data is incomplete."]);
        }
        break;
    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"));
        if(!empty($data->name)) {
            $user->name = $data->name;
            if($user->delete()) {
                http_response_code(200);
                echo json_encode(["message" => "User was deleted."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "Unable to delete user."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Unable to delete user. Data is incomplete."]);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
