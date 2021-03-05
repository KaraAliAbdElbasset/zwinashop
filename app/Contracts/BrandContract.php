<?php


namespace App\Contracts;


interface BrandContract
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
     * @param array $relations
     * @return mixed
     */
    public function all(array $relations = []);

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
