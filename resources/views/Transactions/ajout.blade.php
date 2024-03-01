@extends('layouts.mainlayouts')

@section('contenu')
    <div class="pagetitle">

        <div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger"> {{ $error }}</li>
                @endforeach
            </ul>
            <h1>Tableau Bord</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Accueil</a></li>
                    <li class="breadcrumb-item active">Nouvelle inscription</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">

            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Formulaire inscription etudiant -->

                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">Ajouter une nouvelle transaction </h5>

                                    <form method="POST" action="{{ route('transactions.store') }}" class="row g-3"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="inputPassword5" class="form-label">Date du jour</label>
                                            <input type="date" step="any" class="form-control" name="date">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="validationCustom04" class="form-label">Devise</label>
                                            <select class="form-control" id="validationCustom04" name="devise"
                                                required>
                                                <option selected disabled value="">Choisir une dévise</option>
                                                <option>Dollars</option>
                                                <option>FCFA</option>
                                                <option>EURO</option>
                                                <option>YEN</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Svp veuillez choisir une dévise!
                                            </div>
                                        </div>
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="inputEmail5" class="form-label">Change en CFA</label>
                                            <input type="number" step="any" class="form-control" name="change">
                                        </div>



                                        <div class="col-md-6">
                                            <label for="inputPassword5" class="form-label">Majoration sur taux</label>
                                            <input type="number" step="any" class="form-control" name="taux">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="validationCustom04" class="form-label">Lieu d'envoie</label>
                                            <select class="form-control" id="validationCustom04" name="lieu"
                                                required>
                                                <option selected disabled value="">Choisir le lieu d'envoie</option>
                                                <option>USA</option>
                                                <option>EUROPE</option>
                                                <option>BURKINA FASO</option>
                                                <option>CHINE</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Svp veuillez choisir le lieu!
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label for="validationCustom04" class="form-label">Destination</label>
                                            <select class="form-control" id="validationCustom04" name="destination"
                                                required>
                                                <option selected disabled value="">Choisir une destination</option>
                                                <option>Dollars</option>
                                                <option>FCFA</option>
                                                <option>Euro</option>
                                                <option>Yen</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Svp veuillez choisir la destination!
                                            </div>
                                        </div>



                                        <div class="col-6">
                                            <label for="inputAddress5" class="form-label">Expéditeur</label>
                                            <input type="text" class="form-control" name="expediteur">
                                        </div>



                                        <div class="col-6">
                                            <label for="inputAddress5" class="form-label">Contact Expéditeur </label>
                                            <input type="number" class="form-control" name="contact_expediteur">
                                        </div>


                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">Destinataire </label>
                                            <input type="text" class="form-control" name="destinataire">
                                        </div>
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="inputEmail5" class="form-label">Contact Destinataire</label>
                                            <input type="number" class="form-control" name="contact_destinataire">
                                        </div>



                                        <div class="col-md-6">
                                            <label for="inputPassword5" class="form-label">Montant envoyé selon la dévise de
                                                départ</label>
                                            <input type="number" step="any" class="form-control" name="montant_envoye_depart">
                                        </div>

                                        <div class="col-6">
                                            <label for="inputAddress5" class="form-label">Montant envoyé en CFA</label>
                                            <input type="number" step="any" class="form-control" name="montant_envoye_cfa">
                                        </div>


                                        <div class="col-6">
                                            <label for="inputAddress5" class="form-label">Frais d'envoie</label>
                                            <input type="number" step="any" class="form-control" name="frais_envoie">
                                        </div>



                                        <div class="col-6">
                                            <label for="inputAddress5" class="form-label">Montant a récupérer par le
                                                destinataire</label>
                                            <input type="number" step="any" class="form-control" name="montant_recupere">
                                        </div>




                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            <button type="reset" class="btn btn-danger">Annuler</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <!-- End Formulaire inscription etudiant -->

                    </div>
                </div>
                <!-- End Left side columns -->

            </div>
        </section>
        @include('require.footer')
    @endsection
