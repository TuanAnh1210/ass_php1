<?php
class AdminModel extends BaseModel
{
    const TABLE = 'admin';

    public function addPrd($prdName, $prdDesc, $prdImage, $prdPrice, $cateId)
    {
        $sql = "INSERT INTO products (productName, productDesc, productImage, productPrice, categoryId) VALUES ('$prdName', '$prdDesc', '$prdImage', '$prdPrice', $cateId)";

        return $this->execute($sql);
    }
}