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
            <h1>Tableau de Bord</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Accueil</a></li>
                    <li class="breadcrumb-item active">Nouvelle inscription</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
    </div>

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Formulaire inscription étudiant -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Ajouter un Transfert </h5>

                                <form method="POST" action="{{ route('transfert.store') }}" class="row g-3"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Date du jour</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustom04" class="form-label">Devise</label>
                                        <select class="form-control" id="validationCustom04" name="devise" required>
                                            <option selected disabled value="">Choisir une devise</option>
                                            <option value="Dollars">Dollars</option>
                                            
                                        </select>
                                        <div class="invalid-feedback">
                                            Veuillez choisir une devise !
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Taux d'echange</label>
                                        <input type="number" step="any" class="form-control" name="taux" id="taux" oninput="updateFields()">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustom04" class="form-label">Lieu d'envoi</label>
                                        <select class="form-control" id="validationCustom04" name="lieu" required>
                                            <option selected disabled value="">Choisir le lieu d'envoi</option>
                                            <option value="USA">USA</option>
                                            
                                        </select>
                                        <div class="invalid-feedback">
                                            Veuillez choisir le lieu !
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustom04" class="form-label">Destination</label>
                                        <select class="form-control" id="validationCustom04" name="destination" required>
                                            <option selected disabled value="">Choisir une destination</option>
                                            <option value="BURKINA FASO">BURKINA FASO</option>
                                            
                                        </select>
                                        <div class="invalid-feedback">
                                            Veuillez choisir la destination !
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label for="inputAddress5" class="form-label">Expéditeur</label>
                                        <input type="text" class="form-control" name="expediteur">
                                    </div>

                                    <div class="col-6">
                                        <label for="inputAddress5" class="form-label">Contact Expéditeur</label>
                                        <input type="number" class="form-control" name="contact_expediteur">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputName5" class="form-label">Destinataire</label>
                                        <input type="text" class="form-control" name="destinataire">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail5" class="form-label">Contact Destinataire</label>
                                        <input type="number" class="form-control" name="contact_destinataire">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Montant envoyé selon la devise de départ</label>
                                        <input type="number" step="any" class="form-control" name="montant_envoye_depart" id="montant_envoye_depart" oninput="updateFields()">
                                    </div>

                                    <div class="col-6">
                                        <label for="inputAddress5" class="form-label">Montant envoyé en CFA</label>
                                        <input type="number" step="any" class="form-control" name="montant_envoye_cfa" id="montant_envoye_cfa" readonly>
                                    </div>

                                    <div class="col-6">
                                        <label for="inputAddress5" class="form-label">Frais d'envoi</label>
                                        <input type="number" step="any" class="form-control" name="frais_envoie" id="frais_envoie" readonly>
                                    </div>

                                    <div class="col-6">
                                        <label for="inputAddress5" class="form-label">Montant à récupérer par le destinataire</label>
                                        <input type="number" step="any" class="form-control" name="montant_recupere" id="montant_recupere" readonly>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        <button type="reset" class="btn btn-danger">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Formulaire inscription étudiant -->
                </div>
            </div>
            <!-- End Left side columns -->
        </div>
    </section>
    @include('require.footer')

    <script>
        // Fonction pour mettre à jour les champs calculés
        function updateFields() {
            // Récupération des valeurs des champs
            var montantEnvoyeDepart = parseFloat(document.getElementById('montant_envoye_depart').value);
            var taux = parseFloat(document.getElementById('taux').value);
    
            // Calcul du montant envoyé en CFA
            var montantEnvoyeCFA = montantEnvoyeDepart * taux;
            document.getElementById('montant_envoye_cfa').value = montantEnvoyeCFA.toFixed(2);
    
            // Calcul des frais d'envoi
            var fraisEnvoie = calculateFraisEnvoie(montantEnvoyeDepart);
            document.getElementById('frais_envoie').value = fraisEnvoie;
    
            // Calcul du montant à récupérer
            var montantRecupere = montantEnvoyeCFA - (fraisEnvoie * 600); // frais_envoie * 600
            document.getElementById('montant_recupere').value = montantRecupere.toFixed(2);
        }
    
        // Fonction pour calculer les frais d'envoi en fonction du montant envoyé au départ
        function calculateFraisEnvoie(montantEnvoyeDepart) {
            if (montantEnvoyeDepart >= 1 && montantEnvoyeDepart <= 200) {
                return 5;
            } else if (montantEnvoyeDepart >= 201 && montantEnvoyeDepart <= 500) {
                return 10;
            } else if (montantEnvoyeDepart >= 501 && montantEnvoyeDepart <= 1000) {
                return 15;
            } else {
                return 20;
            }
        }
    </script>
    
@endsection
