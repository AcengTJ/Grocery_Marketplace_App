<?php 
    class Product {
        private $id,
                $name,
                $image,
                $address;
        
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getImage() {
            return $this->image;
        }

        public function getAddress() {
            return $this->address;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function setAddress($address) {
            $this->address = $address;
        }
    }

?>