<?php

namespace App\Repository;
interface InterfaceProductRepository {

    public function getAllProducts();
    public function createProduct($request);
    public function getSingleProduct($id);
    public function editProduct($id);
    public function updateProduct($id, $data);
    public function delete($id);
}

?>
