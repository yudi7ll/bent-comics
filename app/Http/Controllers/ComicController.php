<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Http\Requests\AddComicRequest;
use App\Http\Requests\UpdateComicRequest;

class ComicController extends Controller
{
    private $comic;

    public function __construct(Comic $comic)
    {
        $this->comic = $comic;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->comic->all();
    }

    public function store(AddComicRequest $request)
    {
        $lowerCasedAuthor = str_replace(' ', '', $request->author);
        $lowerCasedTitle = str_replace(' ', '', $request->title);
        $filename = $lowerCasedAuthor . '_' . $lowerCasedTitle;
        $fileExt = '.'.$request->file('cover')->getClientOriginalExtension();

        $request
            ->file('cover')
            ->storeAs('/public/img', $filename . $fileExt);

        $this->comic->insert($request->all());

        return response('Data Has Been Saved Successfully', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->comic->findOrFail($id)->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComicRequest $request, $id)
    {
        $this->comic->findOrFail($id)->update($request->all());

        return response('Data has Been Updated Successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->comic->findOrFail($id)->delete()) {
            return response('Delete Failed!', 400);
        }

        return response('Data Deleted Successfully', 200);
    }
}
