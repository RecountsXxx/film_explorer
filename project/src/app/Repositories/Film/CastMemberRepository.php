<?php

namespace App\Repositories\Film;

use App\Models\CastMember;
use App\Repositories\BaseRepository;

class CastMemberRepository extends BaseRepository
{
    public function __construct(CastMember $member)
    {
        parent::__construct($member);
    }

    public function getPaginatedMembers()
    {
        return $this->paginate(12);
    }
}
