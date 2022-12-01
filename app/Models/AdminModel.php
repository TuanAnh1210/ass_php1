<?php
class AdminModel extends BaseModel
{
    const TABLE = 'products';



    public function addPrd($newListPrd)
    {

        return $this->create(self::TABLE, $newListPrd);
    }

    public function getAllPrd()
    {
        return $this->all(self::TABLE);
    }
}