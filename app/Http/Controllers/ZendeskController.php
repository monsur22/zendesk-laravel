<?php

namespace App\Http\Controllers;

use Zendesk\API\Client;
use Illuminate\Http\Request;
use Huddle\Zendesk\Facades\Zendesk;
use Huddle\Zendesk\Services\ZendeskService;
class ZendeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(ZendeskService $zendesk_service) {
        $this->zendesk_service = $zendesk_service;
    }

    public function index()
    {
        $data =  $this->zendesk_service->tickets()->findAll();
        // return($data);
        return response()->json($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->zendesk_service->tickets()->create([
            'subject' => 'Subject',
            'comment' => [
                  'body' => 'Ticket content.'
            ],
            'priority' => 'normal'
      ]);
      return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=$this->zendesk_service->tickets($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$this->zendesk_service->tickets($id)->update();

            // $data=$this->zendesk_service->tickets()->update($id);
        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=$this->zendesk_service->tickets($id)->delete();
        return response()->json($delete);

    }
}
