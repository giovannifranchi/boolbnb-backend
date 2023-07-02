@extends('layouts.auth')


@section('content')
<div  class="container px-3">
<button class=" btn-back"> <a href="{{ route('admin.apartments.index') }}"
    class="nav-link">{{ __('Go back to your apartments') }} </a></button>
<section class="ms-container pt-5">

    <div class="table-responsive">
        <table id="message-table" class="table table-striped table-hover">
            <thead>
                <tr class="table-success">
                    <th scope="col" class="d-none d-md-table-cell">Nome</th>
                    <th scope="col" class="d-none d-md-table-cell">Cognome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Testo</th>
                    <th scope="col" class="d-none d-md-table-cell">Ricevuto</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    
                @foreach($newMessages as $newMessage)
                <tr>

                    <td class="d-none d-md-table-cell">{{ $newMessage->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $newMessage->lastname }}</td>
                    <td>{{ $newMessage->email }}</td>
                    <td>{{ $newMessage->text }}</td>
                    <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($newMessage->created_at)->format('d M Y')  }}</td>
                    <td>

                        {{-- Elimina --}}
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $newMessage->id }}" title="Elimina">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    {{--<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $newMessage->id }}" title="Elimina">
                            DELETE
                        </button> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</section>



@foreach ($newMessages as $newMessage)
<!-- Modal -->
<div class="modal fade" id="delete-modal-{{ $newMessage->id }}" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-bg">
                <h1 class="modal-title fs-5 ms-text-primary" id="exampleModalLabel">The message from {{ $newMessage->name }} will be deleted!
                </h1>
                <a type="button" class="text-light" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </a>
            </div>
            <div class="modal-body modal-bg ms-text-light">
                Are you sure to continue?
            </div>
            <div class="modal-footer modal-bg">

                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">
                    <i class=""></i>
                    Back
                </button>

                <form action="{{route('admin.messages.destroy', ['id'=>$newMessage->id, 'apartment'=> $apartment])}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger">
                        <i class="bi bi-trash3-fill"></i>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
<style>
 .btn-back {
            margin-top: 35px;
            border: 1px solid var(--custom-green);
            padding: 10px 20px;
            color: var(--custom-green);
            border-radius: 25px;
            font-weight: 600;


        }

        .btn-back:hover {
            /* scale: 1.05; */
            transition: transform 0.2s ease-in-out;
            background-color: var(--custom-green);
            color: white;

        }
    .ms-text-primary{
        color: var(--custom-black);
    }
    .ms-text-light{
        color: var(--custom-black);
    }
</style>