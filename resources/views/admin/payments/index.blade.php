<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>
    <style>
        #dropin-container {
            width: 100%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            margin-top: 50px;
        }

        #submit-button {
            background: #008CBA;
            /* Blue */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="dropin-container"></div>
    <form id="payment-form" method="post" action="{{ route('admin.braintree.checkout', $plan) }}"
        class="d-flex flex-column align-items-center mt-4">
        @csrf
        <input type="hidden" id="nonce" name="payment_method_nonce" />
        <input type="text" id="amount-display" name="amount-display" value="{{ $plan->price }}$" readonly />
        <input type="hidden" id="amount" name="amount" value="{{ $plan }}" />
        <input type="hidden" id="apartment" name="apartment" value="{{ $apartment }}" />
        <button id="submit-button" class="mt-3 d-flex justify-content-center" type="button">Purchase</button>
    </form>

    @if (session('error'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <script>
        var button = document.querySelector('#submit-button');
        var form = document.querySelector('#payment-form');
        var nonceInput = document.querySelector('#nonce');
        var isSecondClick = false;

        braintree.dropin.create({
            authorization: '{{ $token }}',
            container: '#dropin-container'
        }, function(createErr, instance) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                if (!isSecondClick) {
                    instance.requestPaymentMethod(function(err, payload) {
                        if (err) {
                            console.error(err);
                            return;
                        }

                        // Set the nonce
                        nonceInput.value = payload.nonce;

                        // Set flag to true
                        isSecondClick = true;
                    });
                } else {
                    // Submit the form on the second click
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>
