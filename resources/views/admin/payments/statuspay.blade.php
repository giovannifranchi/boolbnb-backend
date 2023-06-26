@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Risultato del pagamento</div>

                <div class="card-body">
                    @if ($success)
                    <h3>Pagamento avvenuto con successo!</h3>
                    <p>Grazie per il tuo pagamento. Il tuo ordine è stato elaborato correttamente.</p>
                    @else
                    <h3>Pagamento non riuscito</h3>
                    <p>Si è verificato un problema durante l'elaborazione del pagamento. Si prega di riprovare più tardi.</p>
                    @endif
                   
                    <a href="{{ route('admin.apartments.index')}}" class="btn btn-primary">Torna alla Home</a>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection