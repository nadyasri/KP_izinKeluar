<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class JabatanService
{
    public function getHierarchy($groupId)
    {
        $query = "
            WITH RECURSIVE hierarchy AS (
                SELECT groupId, parentId, jabatan
                FROM jabatan
                WHERE groupId = ?

                UNION ALL

                SELECT j.groupId, j.parentId, j.jabatan
                FROM jabatan j
                INNER JOIN hierarchy h ON j.parentId = h.groupId
            )
            SELECT * FROM hierarchy;
        ";

        return DB::select($query, [$groupId]);
    }
}
