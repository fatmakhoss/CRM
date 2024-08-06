@extends('design.base')
@section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liste des Interactions</div>
                    <div class="card-body">
                        <a href="{{ route('interactions.create') }}" class="btn btn-primary mb-3">Créer une nouvelle interaction</a>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Client</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Rappel</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($interactionsCount as $interaction)
                                    <tr>
                                        <td>{{ $interaction->id }}</td>
                                        <td>{{ $interaction->client->nom }}</td>
                                        <td>{{ $interaction->type}}</td>
                                        <td>{{ $interaction->date }}</td>
                                        <td>{{ $interaction->rappel }}</td>

                                        <td>
                                            <a href="{{ route('interactions.show', $interaction->id) }}" class="btn btn-primary btn-sm">show</a>
                                            <a href="{{ route('interactions.edit', $interaction->id) }}" class="btn btn-warning btn-sm">edit</a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $interaction->id }}">Supprimer</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Aucune interaction trouvée.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette interaction ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form id="deleteForm" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var interactionId = button.data('id')
            var action = "{{ url('interactions') }}/" + interactionId
            var modal = $(this)
            modal.find('.modal-footer #deleteForm').attr('action', action)
        })
    </script>
@endsection
