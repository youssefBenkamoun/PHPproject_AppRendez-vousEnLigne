<?php
if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    }
  if(isset($_SESSION['employe'])){

 ?>
<div class="container-fluid">
    <div class="card bg-white" >
        <div class="card-header card-color">
            <p class="h2 text-center text-uppercase font-weight-bold pt-2">Gestion des medecins</p>
        </div>
        <div class="card-body container-fluid" >
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="cin">CIN : </label>
                    <input class="" type="text" id="id" hidden>
                    <input class="form-control" type="text" id="cin" required>

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="nom">Nom : </label>
                    <input class="form-control" type="text" id="nom" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="prenom">Prenom : </label>
                    <input class="form-control" type="text" id="prenom" required>

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="email">Email : </label>
                    <input class="form-control" type="email" id="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="telephone">Telephone : </label>
                    <input class="form-control" type="tel" id="telephone" required>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="password">Password : </label>
                    <input class="form-control" type="password" id="password" required>

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="role">Role : </label>
                    <input class="form-control" type="text" id="role" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="departement">Service : </label>
                    <select id="id_service" class="custom-select" ></select>
                </div>
                <div class="col-sm-6 mb-2">
                    <label for="fonction">Specialite : </label><br>
                    <select id="id_specialite" class="custom-select" ></select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="photo">Photo : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" required>
                        <label class="custom-file-label" for="photo">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn">Ajouter</button>
                </div>
            </div>
            <div class="row table-responsive m-auto rounded">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-uppercase bg-light">
                            <th scope="col">Photo</th>
                            <th scope="col">Cin</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Service</th>
                            <th scope="col">Specialite</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Modifier</th>
                        </tr>
                    </thead>
                    <tbody id="table-content">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="script/employe.js" type="text/javascript"></script>
<?php

}else{
  header("Location: ../index.php");
}
 ?>