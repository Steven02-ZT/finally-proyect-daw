<x-admin.admin_layout :title="'Peliculas'">
    <div class="container mt-5">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="search" class="col-form-label fs-3 text-dark-base">Buscar película por título</label>
            </div>
            <div class="col-auto">
                <input type="email" id="search" class="form-control" aria-describedby="searchUser">
            </div>
            <div class="col-auto">
                <button type="button" class="btn bg-dark-base text-light-base"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn bg-blue-base text-light-base" data-bs-toggle="modal" data-bs-target="#addMoviemodal"><i class="fa-solid fa-video"></i> Nueva película</button>
            </div>
            <div class="row gap-2 col-auto">
                <fieldset class="col-auto">
                    <legend>Filtrado por categoría</legend>
                    <div class="mb-3">
                        <select id="categorySelect" class="form-select">
                            <option value=""></option>
                            <option value="0">Categoria 1</option>
                            <option value="1">Categoria 2</option>
                            <option value="3">Categoria 3</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="col-auto">
                    <legend>Filtrado por clasificación</legend>
                    <div class="mb-3">
                        <select id="classificationSelect" class="form-select">
                            <option value=""></option>
                            <option value="0">clasificación 1</option>
                            <option value="1">clasificación 2</option>
                            <option value="3">clasificación 3</option>
                        </select>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <div>
        <div class="container mt-5">
            <table class="table table-light table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Clasificación</th>
                        <th scope="col">Año de salida</th>
                        <th scope="col">Categorías</th>
                        <th scope="col">Descripción</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><button type="button" class="text-blue-base btn" onclick="UpdateMovieHandler('tittle', 1, '04/30/2003', 0, 'description')" data-bs-toggle="modal" data-bs-target="#updateMovieModal">1</button></th>
                        <td>Avengers</td>
                        <td>C</td>
                        <td>01/01/2001</td>
                        <td>
                            <ul class="list-group">
                                <li>SciFi</li>
                                <li>Acción</li>
                            </ul>
                        </td>
                        <td><button class="btn text-success" data-bs-toggle="modal" data-bs-target="#descriptionMovieModal" onclick="OpenDescriptionHandler('description')">Ver descripción</button></td>
                        <td><button type="button" class="btn text-danger" onclick="DeleteMovieHandler(1)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addMoviemodal" tabindex="-1" aria-labelledby="addMoviemodal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('movies.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-film"></i> Agregar película</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" class="form-control" name="title" id="title" require>
                        </div>
                        <div class="mb-3">
                            <label for="classification" class="form-label">Clasificación</label>
                            <select class="form-select" id="classification" name="classification" require>
                                <option value="0">A</option>
                                <option value="1">B</option>
                                <option value="2">C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Fecha de salida</label>
                            <input type="date" class="form-control" id="date" name="date" require>
                        </div>
                        <div class="mb-3">
                            <p>Generos</p>
                            <div class="d-flex gap-2">
                               <div>
                                    <label for="gender1" class="form-label">Genero</label>
                                    <input type="checkbox" class="" id="gender1" name="gender">
                                </div>
                                <div>
                                    <label for="gender2" class="form-label">Genero</label>
                                    <input type="checkbox" class="" id="gender2" name="gender">
                                </div>
                                <div>
                                    <label for="gender3" class="form-label">Genero</label>
                                    <input type="checkbox" class="" id="gender3" name="gender">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="description"> </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="updateMovieModal" tabindex="-1" aria-labelledby="updateMovieModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-film"></i> Actualizar película</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="updateTittle" class="form-label">Título</label>
                            <input type="text" class="form-control" id="updateTittle" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateClassification" class="form-label">Clasificación</label>
                            <select class="form-select" id="updateClassification" require>
                                <option value="0">A</option>
                                <option value="1">B</option>
                                <option value="2">C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="updateYear" class="form-label">Año de salida</label>
                            <input type="date" class="form-control" id="updateYear" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateGender" class="form-label">Género</label>
                            <select class="form-select" id="updateGender" require>
                                <option value="0">Genero 1</option>
                                <option value="1">Genero 2</option>
                                <option value="2">Genero 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="updateDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="updateDescription"> </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="descriptionMovieModal" tabindex="-1" aria-labelledby="descriptionMovieModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p id="descriptionMovieContent"></p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function UpdateMovieHandler(tittle, classification, year, gender, description) {
            document.querySelector("#updateTittle").value = tittle
            document.querySelector("#updateClassification").selectedIndex = classification
            document.querySelector("#updateYear").value = new Date(year).toISOString().split('T')[0]
            document.querySelector("#updateGender").selectedIndex = gender
            document.querySelector("#updateDescription").value = description
        }

        function DeleteMovieHandler(id) {
            alert(`deleter movie ${id}`)
        }

        function OpenDescriptionHandler(description) {
            document.querySelector("#descriptionMovieContent").innerHTML = description
        }

        window.addEventListener('DOMContentLoaded', function() {
            category = document.querySelector("#categorySelect")
            classification = document.querySelector("#classificationSelect")

            category.addEventListener("change", function() {
                if (category.value != "") {
                    alert(category.value)
                }
            });

            classification.addEventListener("change", function() {
                if (classification.value != "") {
                    alert(classification.value)
                }
            });
        });
    </script>
</x-admin.admin_layout>