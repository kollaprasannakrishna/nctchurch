<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Event;
use App\FundraisingEvent;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events=Event::all();
        $fundEvents=array();
        foreach ($events as $event){
            if(!is_null($event->fundraisingEvent)){
                array_push($fundEvents,$event);
            }
        }

       // dd($fundEvents);

        return view('controlPanel.donation.create')->with('events',$fundEvents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request,array(
//           'firstname'=>'Required',
//            'lastname'=>'Required',
//            'event_id'=>'Required',
//            'amount'=>'Required',
//            'email'=>'Required'
//        ));
//
//
//        $donation=new Donation();
//        $donation->firstname= $request->firstname;
//        $donation->lastname= $request->lastname;
//        $donation->email=$request->email;
//        $donation->amount=$request->amount;
//
//        $event=Event::find($request->event_id);
//
//        $event->donations()->save($donation);
//
//        //dd($event->fundraisingEvent->reached);
//      $oldVal= $event->fundraisingEvent->reached;
//        $newVal=$oldVal+$request->amount;
//        //dd($newVal);
//        $event->fundraisingEvent->reached= $newVal;
//        $event->fundraisingEvent->save();

        //dd($request->all());
        Stripe::setApiKey(config('services.stripe.secret'));

        $customer=Customer::create([
            'email'=>request('email'),
             'source'=> request('stripeToken')
        ]);

        $amount=$request->amount * 100;
        Charge::create([
           'customer'=> $customer->id,
            'amount' =>$amount,
            'currency' =>'usd'
        ]);
        return "All done";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
