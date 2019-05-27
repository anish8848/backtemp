<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use Illuminate\Support\Facades\DB;
use App\Page;

class PageController extends Controller
{

  public function create()
{
  return view('backend.page.create');
}

public function store(PageRequest $request)
{
  DB::transaction( function () use ($request)
  {
    $data = $request->data();
    $page = Page::create($data);
  // $this->uploadRequestImage($request,$page);

  });

}

}
