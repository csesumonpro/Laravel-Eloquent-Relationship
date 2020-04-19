<?php

namespace App\Http\Controllers;

use App\Model\Audio;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audios = Audio::all();
        return  view('pages.audio_list',compact('audios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.audio_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = $request->tags;
        unset($request['tags']);
        $audio = Audio::create($request->all());
        $audio->tags()->attach($tags);
        return  redirect()->route('audio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {
        return view('pages.audio_edit',compact('audio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audio $audio)
    {
        $tags = $request->tags;
        unset($request['tags']);
        $audio->update($request->all());
        $audio->tags()->detach();
        $audio->tags()->attach($tags);
        return  redirect()->route('audio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio)
    {
        $audio->delete();
        $audio->tags()->detach();
        return  redirect()->route('audio.index');
    }
}
