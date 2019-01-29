<?php
    class User {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        // Register User
        public function register($data)
        {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $this->db->query($sql);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email){
            $sql = "SELECT * FROM users WHERE email=:email";
            $this->db->query($sql);
            $this->db->bind(':email', $email);


            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        public function getUserById($id){
            $sql = "SELECT * FROM users WHERE id=:id";
            $this->db->query($sql);
            $this->db->bind(':id', $id);


            $row = $this->db->single();

            // Check row
            return $row;
        }

        // Login User
        public function login($email, $password){
            $sql = "SELECT * FROM users WHERE email=:email";
            $this->db->query($sql);
            $this->db->bind(":email",$email);

            $row = $this->db->single();
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }
    }
