<?php

namespace Devall\Mastering\Api;

interface CompanyRepositoryInterface
{
    /**
     * @param $queue
     * @return mixed
     */
    public function save($queue);

    /**
     * @param $queue
     * @param $id
     * @return mixed
     */
    public function load($queue, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);
}
