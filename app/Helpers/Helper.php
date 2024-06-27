<?php

namespace App\Helpers;

class Helper
{
    public static function convertToCategory($data, $fieldToFilter): array
    {
        $dataModified = [];
        foreach ($data as $value) {
            $category = $value[$fieldToFilter];
            if (! array_key_exists($category, $dataModified)) {
                $dataModified[$category] = [];
            }
            $dataModified[$category][] = $value;
        }

        return $dataModified;
    }
}
