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
                    @foreach ($movies as $movie)
                        <tr>
                            <th scope="row"><button type="button" class="text-blue-base btn" 
                            onclick="UpdateMovieHandler('{{$movie['id']}}', '{{$movie['title']}}', '{{$movie['year']}}', '{{$movie['description']}}', '{{$movie['classification_id']}}', '{{$movie['genders']}}')" data-bs-toggle="modal" data-bs-target="#updateMovieModal">{{$movie['id']}}</button></th>
                            <td>{{$movie['title']}}</td>
                            <td>{{$movie['classification']['name']}}</td>
                            <td>{{$movie['year']}}</td>
                            <td>
                                <ul class="list-group">
                                    @foreach ($movie['genders'] as $gender)
                                        <li>{{$gender['name']}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td><button class="btn text-success" data-bs-toggle="modal" data-bs-target="#descriptionMovieModal" onclick="OpenDescriptionHandler('{{$movie['description']}}')">Ver descripción</button></td>
                            <td>
                                <form action="{{ route('movies.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="text" value="{{$movie['id']}}" name="idDelete" id="idDelete" readonly hidden>
                                    <button type="submit" type="button" class="btn text-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addMoviemodal" tabindex="-1" aria-labelledby="addMoviemodal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" action="{{ route('movies.store') }}" method="POST">
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
                            <label for="classification_id" class="form-label">Clasificación</label>
                            <select class="form-select" id="classification_id" name="classification_id" require>
                                @foreach ($classifications as $classification)
                                    <option value="{{$classification['id']}}">{{$classification['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Fecha de salida</label>
                            <input type="date" class="form-control" id="date" name="date" require>
                        </div>
                        <div class="mb-3">
                            <p>Generos</p>
                            <div class="d-flex gap-2">
                               @foreach ($genders as $gender)
                                    <div>
                                        <label for="gender{{$gender['id']}}" class="form-label">{{$gender['name']}}</label>
                                        <input type="checkbox" value="{{$gender['id']}}" id="gender{{$gender['id']}}" name="genders[]">
                                    </div>
                               @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="description" name="description"> </textarea>
                        </div>
                        <div class="mb-3 d-flex gap-2">
                            <div>
                                <label for="video" class="form-label">Video</label>
                                <input type="file" class="form-control" id="video" name="video">
                            </div>
                            <div>
                                <label for="image" class="form-label">Portada</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="updateMovieModal" tabindex="-1" aria-labelledby="updateMovieModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" method="POST" action="{{ route('movies.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-film"></i> Actualizar película</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="id" class="form-label">Id</label>
                            <input type="text" class="form-control" name="id" id="id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateTittle" class="form-label">Título</label>
                            <input type="text" name="updateTittle" class="form-control" id="updateTittle" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateClassification" class="form-label">Clasificación</label>
                            <select class="form-select" id="updateClassification" name="updateClassification" require>
                                @foreach ($classifications as $classification)
                                    <option value="{{$classification['id']}}">{{$classification['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="updateYear" class="form-label">Fecha de salida</label>
                            <input type="date" class="form-control" name="updateYear" id="updateYear" require>
                        </div>
                        <div class="mb-3">
                            <p>Generos</p>
                            <div class="d-flex gap-2">
                               @foreach ($genders as $gender)
                                    <div>
                                        <label for="gender{{$gender['id']}}" class="form-label">{{$gender['name']}}</label>
                                        <input type="checkbox" value="{{$gender['id']}}" id="gender{{$gender['id']}}" name="gendersUpdate[]">
                                    </div>
                               @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="updateDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="updateDescription" id="updateDescription"> </textarea>
                        </div>
                        <div class="mb-3 d-flex gap-2">
                            <div>
                                <label for="videoUpdate" class="form-label">Video</label>
                                <input type="file" class="form-control" id="videoUpdate" name="videoUpdate">
                            </div>
                            <div>
                                <label for="imageUpdate" class="form-label">Portada</label>
                                <input type="file" class="form-control" id="imageUpdate" name="imageUpdate">
                            </div>
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
        function UpdateMovieHandler(id, title, year, description, classification_id, genders) {
            document.querySelector("#id").value = id
            document.querySelector("#updateTittle").value = title
            document.querySelector("#updateClassification").value = classification_id
            document.querySelector("#updateYear").value = new Date(year).toISOString().split('T')[0]
            document.querySelector("#updateDescription").value = description
            let checkboxes = document.querySelectorAll("input[name='gendersUpdate[]']");
            let genderIds = JSON.parse(genders).map(gender => gender.pivot.gender_id);
            checkboxes.forEach((checkbox) => {
                if(genderIds.includes(parseInt(checkbox.value))) {
                    checkbox.checked = true;
                }
            });
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