<?php

namespace Devall\Signup\Api;

interface SignupRepositoryInterface
{
    /**
     * @param $signup
     * @return mixed
     */
    public function save($signup);

    /**
     * @param $signup
     * @param $id
     * @return mixed
     */
    public function load($signup, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @return \Devall\Signup\Api\Data\SignupInterface[]
     */
    public function getList();
}
