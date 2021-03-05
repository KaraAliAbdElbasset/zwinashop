<?php


namespace App\Contracts;


interface CategoryContract
{
    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param array $params
     * @param array|null $relations
     * @return mixed
     */
    public function findOneBy(array $params,array $relations = null);

    /**
     * @param array $param
     * @param $excepts
     * @param array|null $relations
     * @return mixed
     */
    public function findBy(array $param,$excepts = null,array $relations = null);

    /**
     * @param null $excepts array for ids
     * @param array|null $relations
     * @return mixed
     */
    public function all( $excepts = null,array $relations = null);

    /**
     * @param int $per_page
     * @param array $relations
     * @return mixed
     */
    public function findByFilter($per_page = 10,$relations = []);

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
