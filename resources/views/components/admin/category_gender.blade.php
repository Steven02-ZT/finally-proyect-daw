<x-admin.admin_layout :title="'Generales'">

    <div class="d-flex gap-5 justify-content-center container mt-5">
        <div class="">
            <div>
                <h2>Clasificaciones</h2>
                <div class="col-auto">
                    <button type="button" class="btn bg-blue-base text-light-base" data-bs-toggle="modal" data-bs-target="#addClassificationModal"><i class="fa-brands fa-slack"></i> Nueva clasificación</button>
                </div>
            </div>
            <table class="table table-light table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Clasificación</th>
                        <th scope="col">Descripción</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><button type="button" class="text-blue-base btn" onclick="updateClassificationHandler(1,'clasificacion','descripcion')" data-bs-toggle="modal" data-bs-target="#updateClassificationModal">1</button></th>
                        <td>A</td>
                        <td><button class="btn text-success" data-bs-toggle="modal" data-bs-target="#descriptionMovieModal" onclick="OpenDescriptionHandler('description')">Ver descripción</button></td>
                        <td><button type="button" class="btn text-danger" onclick="DeleteClassificationHandler(1)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <div>
                <h2>Géneros</h2>
                <div class="col-auto">
                    <button type="button" class="btn bg-blue-base text-light-base" data-bs-toggle="modal" data-bs-target="#addGendernModal"><i class="fa-solid fa-tag"></i> Nuevo género</button>
                </div>
            </div>
            <table class="table table-light table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><button type="button" class="text-blue-base btn" onclick="updateGenderHandler(1,'nombre','descripcion')" data-bs-toggle="modal" data-bs-target="#updateGenderModal">1</button></th>
                        <td>Scifi</td>
                        <td><button class="btn text-success" data-bs-toggle="modal" data-bs-target="#descriptionMovieModal" onclick="OpenDescriptionHandler('description 2')">Ver descripción</button></td>
                        <td><button type="button" class="btn text-danger" onclick="DeleteGenderHandler(1)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addClassificationModal" tabindex="-1" aria-labelledby="addClassificationModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-brands fa-slack"></i> Agregar clasificación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="classification" class="form-label">Clasificación</label>
                            <input type="text" class="form-control" id="classification" require>
                        </div>
                        <div class="mb-3">
                            <label for="ClassificationDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="ClassificationDescription"> </textarea>
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

    <div class="modal fade" id="addGendernModal" tabindex="-1" aria-labelledby="addGendernModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-tag"></i> Agregar género</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="classification" require>
                        </div>
                        <div class="mb-3">
                            <label for="genderDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="ClassificationDescription"> </textarea>
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

    <div class="modal fade" id="updateClassificationModal" tabindex="-1" aria-labelledby="updateClassificationModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-brands fa-slack"></i> Actualizar clasificación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="idClassification" class="form-label">Id</label>
                            <input type="text" class="form-control" id="idClassification" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateclassification" class="form-label">Clasificación</label>
                            <input type="text" class="form-control" id="updateclassification" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateClassificationDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="updateClassificationDescription"> </textarea>
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

    <div class="modal fade" id="updateGenderModal" tabindex="-1" aria-labelledby="updateGenderModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-brands fa-slack"></i> Actualizar géenero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="idGender" class="form-label">Id</label>
                            <input type="text" class="form-control" id="idGender" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="updateName" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateGenderDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="updateGenderDescription"> </textarea>
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
        function updateClassificationHandler(id,classification,description) {
            document.querySelector("#idClassification").value = id
            document.querySelector("#updateclassification").value = classification
            document.querySelector("#updateClassificationDescription").value = description
        }

        function updateGenderHandler(id,classification,description) {
            document.querySelector("#idGender").value = id
            document.querySelector("#updateName").value = classification
            document.querySelector("#updateGenderDescription").value = description
        }

        function DeleteClassificationHandler(id) {
            alert(`deleter classification ${id}`)
        }

        function DeleteGenderHandler(id) {
            alert(`deleter gender ${id}`)
        }

        function OpenDescriptionHandler(description) {
            document.querySelector("#descriptionMovieContent").innerHTML = description
        }

    </script>
</x-admin.admin_layout>