@extends('layouts.app')

@section('title','| Create Donation')
@section('styles')
    {!! Html::style('assets/css/select2.min.css') !!}

    <style>


        body {
            background: #E6EBF1;
            align-items: center;
            min-height: 100%;

            width: 100%;
        }

        form {
            width: 480px;
            margin: 20px auto;
        }

        .group {
            background: white;
            box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),
            0 3px 6px 0 rgba(0,0,0,0.08);
            border-radius: 4px;
            margin-bottom: 20px;
        }

        label {
            position: relative;
            color: #8898AA;
            font-weight: 300;
            height: 40px;
            line-height: 40px;
            margin-left: 20px;
            display: block;
        }

        .group label:not(:last-child) {
            border-bottom: 1px solid #F0F5FA;
        }

        label > span {
            width: 20%;
            text-align: right;
            float: left;
        }

        .field {
            background: transparent;
            font-weight: 300;
            border: 0;
            color: #31325F;
            outline: none;
            padding-right: 10px;
            padding-left: 10px;
            cursor: text;
            width: 70%;
            height: 40px;
            float: right;
        }

        .field::-webkit-input-placeholder { color: #CFD7E0; }
        .field::-moz-placeholder { color: #CFD7E0; }
        .field:-ms-input-placeholder { color: #CFD7E0; }

        button {
            float: left;
            display: block;
            background: #666EE8;
            color: white;
            box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),
            0 3px 6px 0 rgba(0,0,0,0.08);
            border-radius: 4px;
            border: 0;
            margin-top: 20px;
            font-size: 15px;
            font-weight: 400;
            width: 100%;
            height: 40px;
            line-height: 38px;
            outline: none;
        }

        button:focus {
            background: #555ABF;
        }

        button:active {
            background: #43458B;
        }

        .outcome {
            float: left;
            width: 100%;
            padding-top: 8px;
            min-height: 24px;
            text-align: center;
        }

        .success, .error {
            display: none;
            font-size: 13px;
        }

        .success.visible, .error.visible {
            display: inline;
        }

        .error {
            color: #E4584C;
        }

        .success {
            color: #666EE8;
        }

        .success .token {
            font-weight: 500;
            font-size: 13px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>Create Donations</h1>

            </div>

        </div>
        <hr>
        <div class="row">

            <div class="col-md-12">
                {!! Form::open(['route'=>'donation.store','method'=>'POST']) !!}
                <div class="row">
                    <div class="col-md-6">
                        {{Form::label('firstname','First Name')}}
                        {{Form::text('firstname',null,['class'=>'form-control'])}}

                        {{Form::label('lastname','Last Name')}}
                        {{Form::text('lastname',null,['class'=>'form-control'])}}
                    </div>

                    <div class="col-md-6">
                        {{Form::label('email','Email')}}
                        {{Form::text('email',null,['class'=>'form-control'])}}

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        {{Form::label('event_id','Category')}}
                        <select class="form-control" name="event_id">
                            @foreach($events as $event)
                                <option value="{{$event->id}}">{{$event->name }}</option>
                            @endforeach
                        </select>

                        {{Form::label('amount','Amount')}}
                        {{Form::text('amount',null,['class'=>'form-control'])}}

                        {{--{{Form::label('phone','Contact No')}}--}}
                        {{--{{Form::text('phone',null,['class'=>'form-control'])}}--}}
                    </div>
                    <div class="col-md-6">
                        {{Form::submit('Create new',['class'=>'btn btn-success btn-block','style'=>'margin-top:20px;'])}}
                    </div>
                </div>












                {!! Form::close() !!}
            </div>

            <div class="col-md-12">
                {{--<form action="{{route('donation.store')}}" method="POST">--}}
                    {{--{{csrf_field()}}--}}

                    {{--<script--}}

                            {{--src="https://checkout.stripe.com/checkout.js" class="stripe-button"--}}
                            {{--data-key="{{config('services.stripe.key')}}"--}}
                            {{--data-amount="2500"--}}
                            {{--data-name="Demo Site"--}}
                            {{--data-description="Widget"--}}
                            {{--data-image="https://stripe.com/img/documentation/checkout/marketplace.png"--}}
                            {{--data-locale="auto">--}}
                    {{--</script>--}}
                {{--</form>--}}


                <script src="https://js.stripe.com/v3/"></script>
                <form action="{{route('donation.store')}}" id="donation" method="POST">
                    {{csrf_field()}}
                    <div class="group">
                        <label>
                            <span>Name</span>
                            <input name="name" class="field" placeholder="Jane Doe" />
                        </label>
                        <label>
                            <span>Email</span>
                            <input name="email" class="field" placeholder="JaneDoe@gmail" />
                        </label>
                        <label>
                            <span>Phone</span>
                            <input class="field" placeholder="(123) 456-7890" name="phone" type="tel" />
                        </label>
                        <label>
                            <span>Amount</span>
                            <input class="field" placeholder="0.00" name="amount"/>
                        </label>
                    </div>
                    <div class="group">
                        <label>
                            <span>Card</span>
                            <div id="card-element" class="field"></div>
                        </label>
                    </div>
                    <button type="submit">Pay $25</button>
                    <div class="outcome">
                        <div class="error"></div>
                        <div class="success">
                            Success! Your Stripe token is <span class="token" name="stripeToken"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('assets/js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();


        var stripe = Stripe('{{config('services.stripe.key')}}');
        var elements = stripe.elements();

        var card = elements.create('card', {
            style: {
                base: {
                    iconColor: '#666EE8',
                    color: '#31325F',
                    lineHeight: '40px',
                    fontWeight: 300,
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSize: '15px',

                    '::placeholder': {
                        color: '#CFD7E0',
                    },
                },
            }
        });
        card.mount('#card-element');

        function setOutcome(result) {
            var successElement = document.querySelector('.success');
            var errorElement = document.querySelector('.error');
            successElement.classList.remove('visible');
            errorElement.classList.remove('visible');

            if (result.token) {
                // Use the token to create a charge or a customer
                // https://stripe.com/docs/charges
                successElement.querySelector('.token').textContent = result.token.id;
                successElement.classList.add('visible');
            } else if (result.error) {
                errorElement.textContent = result.error.message;
                errorElement.classList.add('visible');
            }
        }

        card.on('change', function(event) {
            setOutcome(event);
        });



        // Create a token or display an error the form is submitted.
        var form = document.getElementById('donation');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('donation');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>

@endsection