@extends('layouts.auth')


@section('content')
<section class="container pt-4">

    <div class="table-responsive">
        <table id="message-table" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="d-none d-md-table-cell">Nome</th>
                    <th scope="col" class="d-none d-md-table-cell">Cognome</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="d-none d-md-table-cell">Testo</th>
                    <th scope="col">Ricevuto</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    
                @foreach($newMessages as $newMessage)
                <tr>

                    <td class="d-none d-md-table-cell">{{ $newMessage->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $newMessage->lastname }}</td>
                    <td>{{ $newMessage->email }}</td>
                    <td class="d-none d-md-table-cell">{{ $newMessage->text }}</td>
                    <td>{{ $newMessage->created_at }}</td>
                    <td>

                        {{-- Elimina --}}
                        <button class="bi bi-trash3-fill text-danger btn-icon" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $newMessage->id }}" title="Elimina">
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</section>



@foreach ($newMessages as $newMessage)
<!-- Modal -->
<div class="modal fade" id="delete-modal-{{ $newMessage->id }}" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-bg">
                <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">Il messaggio n°
                    {{ $newMessage->id }} sta per essere cestinato
                </h1>
                <a type="button" class="text-light" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </a>
            </div>
            <div class="modal-body modal-bg">
                Sei sicuro di voler proseguire?
            </div>
            <div class="modal-footer modal-bg">

                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">
                    <i class="bi bi-file-arrow-down"></i>
                    Annulla
                </button>

                <form action="{{route('admin.messages.destroy', ['id'=>$newMessage->id])}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger">
                        <i class="bi bi-trash3-fill"></i>
                        Elimina
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection