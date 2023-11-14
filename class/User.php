<?php 
    class User {
        private $id,
                $name,
                $email,
                $password,
                $address,
                $phone,
                $image;

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getAddress() {
            return $this->address;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function getImage() {
            return $this->image;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            if (!is_string($name)) {
                throw new Exception("Nama harus String!", 1); 
            }
            $this->name = $name;
        }

        public function setEmail($email) {
            if (!is_string($email)) {
                throw new Exception("Email harus String!", 1); 
            }
            $this->email = $email;
        }

        public function setPassword($pass) {
            $this->password = $pass;
        }

        public function setAddress($address) {
            if (!is_string($address)) {
                throw new Exception("Alamat harus String!", 1); 
            }
            $this->address = $address;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
        }

        public function setImage($image) {
            $this->image = $image;
        }
    }

?>