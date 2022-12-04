<?php
class AccountModel extends BaseModel
{
    const TABLE = 'users';

    public function getAllUer()
    {
        return $this->all(self::TABLE);
    }

    public function getAuth($login_email)
    {
        $sql = "SELECT * from users where email = '$login_email'";

        return $this->query_one($sql);
    }

    public function addNew($arrUser)
    {
        return $this->create(self::TABLE, $arrUser);
    }

    public function updateCensorship($lisrUserUpdate)
    {
        $arr = [];
        foreach ($lisrUserUpdate as $key => $value) {
            array_push($arr, "or id = ${value}");
        }

        $newDataString = implode(' ', $arr);
        $testStr = substr($newDataString, 3);
        $sql = "UPDATE users SET censorship = 1 WHERE $testStr";
        return $this->execute($sql);
    }
}