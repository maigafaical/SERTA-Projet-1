@extends('layouts.mainlayouts')

@section('contenu')
    <section class="section">
        <div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des Transactions</h5>

                            <div>
                                <button class="btn btn-info" onclick="imprimerPage()">Imprimer</button>
                            </div>


                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Expéditeur</th>
                                        <th scope="col">Destinataire </th>
                                        <th scope="col">Montant envoyé</th>
                                        <th scope="col">Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->date }}</td>
                                            <td>{{ $transaction->expediteur }}</td>
                                            <td>{{ $transaction->destinataire }}</td>
                                            <td>{{ $transaction->montant_envoye_depart }}</td>

                                            <td>


                                                <a href="{{ route('transactions.edit', $transaction->id) }}"
                                                    class="btn btn-info"><i class="bi bi-pencil-square"
                                                        title="modifier"></i></a>



                                                <a href="{{ route('transactions.show', $transaction->id) }}"
                                                    class="btn btn-success"><i class="bi bi-eye" title="détails"></i></a>


                                                <a href="{{ url('supprimer-transactions/' . $transaction->id) }}"
                                                    class="btn btn-danger"> <i class="bi bi-trash"
                                                        title="supprimer"></i></a>


                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
            <script src="{{ asset('assets/impression.js') }}"></script>
    </section>
@endsection
