<?php


namespace App\Contracts;


interface ProductContract
{
    /**
     * @param $id
     * @return mixed
     */
    public function findOneById($id);


    /**
     * @param array $params
     * @param array $relations
     * @return mixed
     */
    public function findOneBy(array $params,array $relations = []);

    /**
     * @param int $per_page
     * @param array $relations
     * @param array $scopes
     * @return mixed
     */
    public function findByFilter($per_page = 10,array $relations = [],$scopes=[]);

    /**
     * @param array $param
     * @param null $excepts
     * @param array $relations
     * @return mixed
     */
    public function findBy(array $param,$excepts = null,array $relations = []);

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
