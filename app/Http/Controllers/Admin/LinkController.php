<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Link\DestroyRequest;
use App\Http\Requests\Admin\Link\EditRequest;
use App\Http\Requests\Admin\Link\IndexRequest;
use App\Http\Requests\Admin\Link\SaveRequest;
use App\Http\Requests\Admin\Link\StoreRequest;
use App\Http\Requests\Admin\Link\UpdateRequest;
use App\Models\Link;
use App\Repositories\LinkRepository;

class LinkController extends Controller
{
    public function __construct(private LinkRepository $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }

    public function index(IndexRequest $request)
    {
        $links = $this->linkRepository->get();
        return view('admin.links.index', compact('links'));
    }

    public function store(StoreRequest $request)
    {
        return view('admin.links.form');
    }

    public function save(SaveRequest $request)
    {
        $this->linkRepository->store([
            'old_url' => $request->get('old_url'),
            'new_url' => $this->linkRepository->generateRandomCode(),
        ]);
        return redirect()->route('links.index')->with($this->sendAlert('success', 'Success', 'Link added successfully'));
    }


    public function update(UpdateRequest $request, Link $link)
    {
        $data = [
            'old_url' => $request->get('old_url'),
            'new_url' => $request->get('new_url'),
        ];

        $this->linkRepository->update($data, $link);
        return redirect()->route('links.index')->with($this->sendAlert('success', 'Success', 'Link updated successfully'));
    }


    public function edit(EditRequest $request, Link $link)
    {
        return view('admin.links.form', compact('link'));
    }

    public function destroy(DestroyRequest $request, Link $link)
    {
        $this->linkRepository->destroy($link);
        return redirect()->route('links.index')->with($this->sendAlert('success', 'Success', 'Link delete successfully'));
    }
}
