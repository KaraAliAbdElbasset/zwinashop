<?php


namespace App\Contracts;


interface OrderContract
{
    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param array $params
     * @param array|[] $relations
     * @return mixed
     */
    public function findOneBy(array $params,array $relations = []);


    /**
     * @param int $per_page
     * @return mixed
     */
    public function findByFilter($per_page = 10);



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
