<?php
class CategoryModel extends BaseModel
{
    const TABLE = 'categories';

    public function getQuantityCate()
    {
        $query = "SELECT categories.id, categories.categoryName ,COUNT(categoryId) as quantity from products RIGHT JOIN categories on products.categoryId = categories.id GROUP BY categoryId ORDER BY categories.id";

        return $this->query_all($query);
    }

    public function getAllCate()
    {
        return $this->all(self::TABLE);
    }

    public function updateCate($newArrCate,  $idCate)
    {
        return $this->update(self::TABLE, $newArrCate, $idCate);
    }

    public function createCategory($newCateInsert)
    {
        return $this->create(self::TABLE, $newCateInsert);
    }
}