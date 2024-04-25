<?php

namespace App\Http\Controllers\Admin\Films\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\Member\MemberRequest;
use App\Http\Requests\Admin\Film\Member\UpdateMemberRequest;
use App\Services\Film\Member\MemberService;
class MemberController extends Controller
{
    public function __construct(private MemberService $memberService){}


    public function index()
    {
        $members = $this->memberService->index();
        return view('admin.film.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.film.members.create');
    }

    public function edit(string $id)
    {
        $member = $this->memberService->getMemberById($id);
        return view('admin.film.members.edit', compact('member'));
    }

    public function store(MemberRequest $request)
    {
        $this->memberService->store($request->validated());

        return redirect()->route('member.index')->with('success', ((__('messages.member_successfully_added'))));
    }

    public function update(UpdateMemberRequest $request,string $id)
    {
        $this->memberService->update($request->validated(),$id);

        return redirect()->route('member.index')->with('success', ((__('messages.member_successfully_updated'))));
    }

    public function destroy(string $id)
    {
        $this->memberService->destroy($id);

        return redirect()->route('member.index')->with('success', ((__('messages.member_successfully_deleted'))));
    }
}
