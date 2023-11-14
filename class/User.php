<?php 
    class User {
        private $id,
                $name,
                $gender,
                $email,
                $password,
                $address,
                $phone,
                $image,
                $province,
                $city,
                $postal_code;

        public function getId() {
            return $this->id;
        }

        public function getGender() {
            return $this->gender;
        }

        public function getProvince() {
            return $this->province;
        }

        public function getCity() {
            return $this->city;
        }

        public function getPostalCode() {
            return $this->postal_code;
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

        public function setGender($gender) {
            if (!is_string($gender)) {
                throw new Exception("Kelamin harus String!", 1); 
            }
            $this->gender = $gender;
        }

        public function setProvince($province) {
            if (!is_string($province)) {
                throw new Exception("Provinsi harus String!", 1); 
            }
            $this->province = $province;
        }

        public function setCity($city) {
            if (!is_string($city)) {
                throw new Exception("Kota harus String!", 1); 
            }
            $this->city = $city;
        }

        public function setPostalCode($postalCode) {
            if (!is_string($postalCode)) {
                throw new Exception("Kode pos harus String!", 1); 
            }
            $this->postal_code = $postalCode;
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