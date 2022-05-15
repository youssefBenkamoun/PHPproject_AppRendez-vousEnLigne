<?php
if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    }
  if(isset($_SESSION['employe'])){

 ?>
<div class="container-fluid">
    <div class="card bg-white" >
        <div class="card-header card-color">
            <p class="h2 text-center text-uppercase font-weight-bold pt-2">Gestion des Specialités</p>
        </div>
        <div class="card-body container-fluid" >
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="code">Code : </label>
                    <input class="" type="text" id="id" hidden>
                    <input class="form-control" type="text" id="code" required>

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="nom">Nom : </label>
                    <input class="form-control" type="text" id="nom" required>
                </div>
                <div class="col-sm-6 mb-2">
                    <label for="service">Service : </label>
                    <input class="form-control" type="text" id="service" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn">Ajouter</button>
                </div>
                <div class="col">
                    <select id="specialite">
                        
                    </select>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-success mt-3 mb-3" id="send">Send</button>
                </div>
            </div>
            <div class="row table-responsive m-auto rounded">
                <table class="table table-hover">
                    <thead id="tete">
                        
                    </thead>
                    <tbody id="table-content">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script src="script/fonction.js" type="text/javascript"></script>
<?php

}else{
  header("Location: ../index.php");
}
 ?>
