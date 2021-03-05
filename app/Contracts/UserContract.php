<?php


namespace App\Contracts;


interface UserContract
{
    /**
     * @param $id
     * @return mixed
     */
    public function findOneById($id);


    /**
     * @param int $per_page
     * @return mixed
     */
    public function findByFilter($per_page = 10);

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id,array $data);


    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
