<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 24/08/2017
 * Time: 14:28
 */

namespace App\Serializers;


use League\Fractal\Serializer\ArraySerializer;

class DataArraySerializer extends ArraySerializer
{
    /**
     * Serialize a collection.
     *
     * @param string $resourceKey or false
     * @param array $data
     *
     * @return array
     */
    public function collection($resourceKey, array $data)
    {
        if (false === $resourceKey) {
            return $data;
        } else if ($resourceKey) {
            return [$resourceKey => $data];

        }

        return ['data' => $data];
    }

    /**
     * Serialize an item.
     *
     * @param string $resourceKey or false
     * @param array $data
     *
     * @return array
     */
    public function item($resourceKey, array $data)
    {
        if (false === $resourceKey) {
            return $data;
        } else if ($resourceKey) {
            return [$resourceKey => $data];
        }

        return ['data' => $data];
    }

    /**
     * Serialize null resource.
     *
     * @return array
     */
    public function null()
    {
        return ['data' => []];
    }
}
