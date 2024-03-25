@extends('layouts.mainlayouts')
@section('contenu')
    <div class="pagetitle">
        <h1>Tableau Bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Accueil</a></li>
                <li class="breadcrumb-item active">Nouvelle inscription</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Details</button>
                            </li>

                            <li class="nav-item">
                                {{-- <a href="{{ transfert.liste }}"  class="nav-link">Voir la liste</a> --}}
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <div class="row">
                                    <div class="col-lg-12 col-md-4 label ">Dévise</div>
                                    <div class="col-lg-9 col-md-8">{{ $transfert->devise }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-4 label ">Date du jour</div>
                                    <div class="col-lg-9 col-md-8">{{ $transfert->date }}</div>
                                </div>

                                

                                <div class="row">
                                    <div class="col-lg-12 col-md-4 label">Taux de change</div>
                                    <div class="col-lg-9 col-md-8">{{ $transfert->taux }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-4 label">Lieu d'envoie</div>
                                    <div class="col-lg-9 col-md-8">{{ $transfert->lieu }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-4 label">Destination</div>
                                    <div class="col-lg-9 col-md-8">{{ $transfert->destination }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-4 label">Expéditeur</div>
                                    <div class="col-lg-9 col-md-8">{{ $transfert->expediteur }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-4 label">Contact de l'expéditeur</div>
                                    <div class="col-lg-9 col-md-8">{{ $transfert->contact_expediteur }}</div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-4 label">Destinataire</div>
                                <div class="col-lg-9 col-md-8">{{ $transfert->destinataire }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-4 label">Contact du destinataire</div>
                                <div class="col-lg-9 col-md-8">{{ $transfert->contact_destinataire }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-4 label">Montant envoyé selon la dévise de départ</div>
                                <div class="col-lg-9 col-md-8">{{ $transfert->montant_envoye_depart }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-4 label">Montant envoyé en FCFA</div>
                                <div class="col-lg-9 col-md-8">{{ $transfert->montant_envoye_cfa }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-4 label">Frais d'envoie</div>
                                <div class="col-lg-9 col-md-8">{{ $transfert->frais_envoie }}</div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-4 label">Montant a récupérer par le destinataire</div>
                            <div class="col-lg-9 col-md-8">{{ $transfert->montant_recupere }}</div>
                        </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
