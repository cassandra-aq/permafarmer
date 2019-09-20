@extends('welcome')

@section('content')
    <nav class="navbar navbar-light navbar-green bg-light d-flex flex-row justify-content-end mt-0">
        <a class="navbar-brand" href="{{ route('my_subscriptions', ['user' => $user]) }}">Mes abonnements</a>
        <a class="navbar-brand" href="{{ route('my_products', ['user' => $user]) }}">Mon panier de la semaine</a>
        <a class="navbar-brand" href="{{ route('my_account', ['user' => $user]) }}">Mon compte</a>
    </nav>
    <h2>Mon compte</h2>
    <div class="d-flex flex-row justify-content-around">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 card uper">
            <div class="card-body">
                <h3>Informations personnelles</h3>
                <form method="post" action="{{ route('users.update', ['user' => $user]) }}">
                    <div class="form-group">
                        @csrf
                        @method('PUT')
                        <label for="lastname">Nom:</label>
                        <input id="lastname" type="text" class="form-control" name="lastname"
                               value="{{ $user->lastname }}"/>
                        <label for="firstname">Prénom:</label>
                        <input id="firstname" type="text" class="form-control" name="firstname"
                               value="{{ $user->firstname }}"/>
                        <label for="email">Email:</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"/>
                    </div>
                    <button type="submit" class="btn btn-primary green_btn">Valider</button>
                </form>


            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 card uper">
            <div class="card-body">
                <h3>Changer le mot de passe</h3>
                <form method="post" action="{{ route('reset_password', ['user' => $user]) }}">
                    <div class="form-group">
                        @csrf
                        @method('PUT')
                        <label for="old_password">Ancien mot de passe :</label>
                        <input id="old_password" type="password" class="form-control" name="old_password"/>
                        <label for="new_password">Nouveau mot de passe :</label>
                        <input id="new_password" type="password" class="form-control" name="new_password"/>
                        <label for="new_password_again">Retapez votre mot de passe :</label>
                        <input id="new_password_again" type="password" class="form-control"/>
                    </div>
                    <button type="submit" id="submit_new_password" class="btn btn-primary green_btn">Valider</button>
                </form>


            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 card uper">
            <div class="card-body">
                <h3>Changer mes informations bancaires</h3>
                <form method="post" action="{{ route('users.update', ['user' => $user]) }}">
                    <div class="form-group">
                        @csrf
                        @method('PUT')
                        <label for="lastname">IBAN:</label>
                        <input id="lastname" type="text" class="form-control" name="lastname"
                               value="{{ $user->iban }}"/>
                        <label for="firstname">BIC:</label>
                        <input id="firstname" type="text" class="form-control" name="firstname"
                               value="{{ $user->bic }}"/>
                    </div>
                    <button type="submit" class="btn btn-primary green_btn">Valider</button>
                </form>


            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            var new_password = $('#new_password');
            var new_password_again = $('#new_password_again');

            $(document).on('click', '#submit_new_password', function () {
                if (new_password.val() !== new_password_again.val()) {
                    alert("Les mots de passe ne sont pas identiques");
                    e.preventDefault();
                }
            });
        });

    </script>
@endpush