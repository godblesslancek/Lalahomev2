<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 26/11/2017
 * Time: 15:43
 */


class Users
{
    private $ID;
    private $id_Building;
    private $LastName;
    private $FirstName;
    private $Email;
    private $Phone;
    private $id_Role;
    private $Password;
    private $id_Appart;
    private $conn;


    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function connect($Email,$Password){


        $stmt = $this->conn->prepare('SELECT * from user WHERE email = ? ');
        $stmt->bind_param('s', $Email);
        $stmt->execute();
        $row = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();
        if ($row->num_rows != 1){
            $error =   "An error as occured, too many users with the same email";
            return False;
        }
        else{

            $data = $row->fetch_assoc();

            if (password_verify($Password, $data['password'])){
                //setcookie('IDuser', $data['ID'], time() + 365*24*3600, null, null, false, true);
                $_SESSION['Role'] = $data['role_user'];
                return True;

            }
            else
                return False;

        }

    }



    public function create_user($user_param){


        $password = password_hash($user_param['password'], PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare('INSERT INTO user (surname_user,name_user,email,phone,password,role_user) VALUES (?,?,?,?,?,?)');
        $stmt->bind_param("sssssi", $user_param['LastName'],$user_param['FirstName'] , $user_param['Email'], $user_param['Phone'] , $user_param['Password'] ,$user_param['Role']);
        $stmt->execute();
        $stmt->close();
        $$this->conn->close();
    }
    
    public function update_user($user_param){

        $password = password_hash($user_param['password'], PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare('UPDATE user SET surname_user = ?, name_user = ?, email = ?, phone = ? WHERE id = ?')     ;
        $stmt->bind_param("sssi", $user_param['LastName'],$user_param['FirstName'] , $user_param['Email'], $user_param['Phone']);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }

    public function delete_user($id_user){
        $stmt = $this->conn->prepare('DELETE FROM user WHERE id = ?')     ;
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }


}

?>