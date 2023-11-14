<?php 
    class Product {
        private $id,
                $user_id,
                $store_id,
                $image,
                $name,
                $brand,
                $mass,
                $density,
                $category,
                $stock,
                $price;

        public function getId() {
            return $this->id;
        }

        public function getUserId() {
            return $this->user_id;
        }

        public function getStoreId() {
            return $this->store_id;
        }

        public function getImage() {
            return $this->image;
        }

        public function getName() {
            return $this->name;
        }

        public function getBrand() {
            return $this->brand;
        }

        public function getMass() {
            return $this->mass;
        }

        public function getDensity() {
            return $this->density;
        }

        public function getCategory() {
            return $this->category;
        }

        public function getStock() {
            return $this->stock;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setUserId($userId) {
            $this->user_id = $userId;
        }

        public function setStoreId($storeId) {
            $this->store_id = $storeId;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setBrand($brand) {
            $this->brand = $brand;
        }

        public function setMass($mass) {
            $this->mass = $mass;
        }

        public function setDensity($density) {
            $this->density = $density;
        }

        public function setCategory($category) {
            $this->category = $category;
        }

        public function setStock($stock) {
            $this->stock = $stock;
        }

        public function setPrice($price) {
            $this->price = $price;
        }
    }

?>