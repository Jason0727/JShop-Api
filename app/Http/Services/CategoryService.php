<?php


namespace App\Http\Services;

use Illuminate\Support\Collection;

class CategoryService
{
    /**
     * 递归分类
     *
     * @param Collection $data
     * @param int $parentId
     * @return array|bool
     */
    public static function getCategoryTree(Collection $data, int $parentId = 0)
    {
        $arrTree = [];

        # 终止条件
        if ($data->isEmpty()) return false;

        # 数据处理
        foreach ($data as $key => $value) {
            if ($value->parent_id == $parentId) {
                unset($data[$key]); # 注销当前节点数据，减少已无用的遍历
                $son = self::getCategoryTree($data, $value->id);
                $son && $value->son = $son;
                $arrTree[] = $value;
            }
        }

        return $arrTree;
    }
}
