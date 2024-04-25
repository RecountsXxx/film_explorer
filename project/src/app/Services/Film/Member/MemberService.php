<?php
namespace App\Services\Film\Member;

use App\Repositories\Film\CastMemberRepository;
use Illuminate\Support\Facades\Storage;

class MemberService{
    public function __construct(private CastMemberRepository $castMemberRepository){}

    public function index()
    {
        return $this->castMemberRepository->getPaginatedMembers();
    }

    public function store(array $data)
    {
       $cast = $this->castMemberRepository->create($data);

       $this->uploadPhoto($data['photo'], $cast->id);
    }

    public function update(array $data, int $id)
    {
        $member = $this->castMemberRepository->findOrFail($id);
        $this->castMemberRepository->update($member, $data);

        isset($data['photo']) ? $this->uploadPhoto($data['photo'], $id) : null;
    }

    public function uploadPhoto($image,$memberId){
        $posterFileName = $memberId . '/member.' . $image->getClientOriginalExtension();
        Storage::disk('members')->putFileAs('members_images', $image, $posterFileName);
        $url = Storage::disk('members')->url('members/members_images/' . $posterFileName);

        $film = $this->castMemberRepository->findOrFail($memberId);
        $this->castMemberRepository->update($film, ['photo' => $url]);
    }

    public function getMemberById(int $id)
    {
     return $this->castMemberRepository->findOrFail($id);
    }

    public function destroy(string $id)
    {
        $member = $this->castMemberRepository->findOrFail($id);
        Storage::disk('members')->deleteDirectory('members/members_images/' . $member->id);
        $this->castMemberRepository->delete($member);
    }
}
