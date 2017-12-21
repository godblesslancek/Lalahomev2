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
    private $Role;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->Role;
    }




    public function connect($Email,$Password){

        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare('SELECT * from user WHERE email = ? ');
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
                $this->Role = $data['role_user'];
                $this->FirstName = $data['name_user'];
                $this->ID = $data['id_user'];
                return True;

            }
            else
                return False;

        }

    }



    public function create_user($user_param){

        $db = Database::getInstance();
        $conn = $db->getConnection();
        $password = password_hash($user_param['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare('INSERT INTO user (surname_user,name_user,email,phone,password,role_user) VALUES (?,?,?,?,?,?)');
        $stmt->bind_param("sssssi", $user_param['LastName'],$user_param['FirstName'] , $user_param['Email'], $user_param['Phone'] , $user_param['Password'] ,$user_param['Role']);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    
    public function update_user($user_param){
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $password = password_hash($user_param['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare('UPDATE user SET surname_user = ?, name_user = ?, email = ?, phone = ? WHERE id = ?')     ;
        $stmt->bind_param("sssi", $user_param['LastName'],$user_param['FirstName'] , $user_param['Email'], $user_param['Phone']);
        $stmt->execute();
        $stmt->close();
        $conn->close();



    }


}

?>