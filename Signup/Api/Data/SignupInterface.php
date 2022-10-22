<?php

namespace Devall\Signup\Api\Data;

interface SignupInterface
{
    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getDate();

    /**
     * @param $date
     * @return mixed
     */
    public function setDate($date);

}
