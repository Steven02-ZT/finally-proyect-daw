<x-admin.admin_layout :title="'Generales'">

    <div class="d-flex gap-5 justify-content-center container mt-5">
        <div class="">
            <div>
                <h2>Membresias</h2>
                <div class="col-auto">
                    <button type="button" class="btn bg-blue-base text-light-base" data-bs-toggle="modal" data-bs-target="#addClassificationModal"><i class="fa-solid fa-credit-card"></i> Nueva membresía</button>
                </div>
            </div>
            <table class="table table-light table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Beneficios</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><button type="button" class="text-blue-base btn" onclick="updateMembershipHandler(1,'Basico',5.99,'descripcion',[2,3])" data-bs-toggle="modal" data-bs-target="#updateMembershipModal">1</button></th>
                        <td>Básico</td>
                        <td>$0.00</td>
                        <td><button class="btn text-success" data-bs-toggle="modal" data-bs-target="#descriptionContent" onclick="descriptionContent('description')">Ver descripción</button></td>
                        <td>
                            <ul class="list-group">
                                <li class="list-item">nombre beneficio</li>
                                <li class="list-item">nombre beneficio</li>
                                <li class="list-item">nombre beneficio</li>
                            </ul>
                        </td>
                        <td><button type="button" class="btn text-danger" onclick="DeleteMembershipHandler(1)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <div>
                <h2>Beneficios</h2>
                <div class="col-auto">
                    <button type="button" class="btn bg-blue-base text-light-base" data-bs-toggle="modal" data-bs-target="#addGendernModal"><i class="fa-solid fa-star"></i> Nuevo beneficio</button>
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
                        <th scope="row"><button type="button" class="text-blue-base btn" onclick="updateBenefitHandler(1,'nombre','descripcion')" data-bs-toggle="modal" data-bs-target="#updateBenefitModal">1</button></th>
                        <td>benificio</td>
                        <td><button class="btn text-success" data-bs-toggle="modal" data-bs-target="#descriptionContent" onclick="OpenDescriptionHandler('description 2')">Ver descripción</button></td>
                        <td><button type="button" class="btn text-danger" onclick="DeleteBenefitHandler(1)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addClassificationModal" tabindex="-1" aria-labelledby="addClassificationModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-credit-card"></i> Agregar membresia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Nivel</label>
                            <input type="text" class="form-control" id="level" require>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio</label>
                            <input type="int" class="form-control" id="price" require>
                        </div>
                        <div class="mb-3">
                            <label for="ClassificationDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="ClassificationDescription"> </textarea>
                        </div>
                        <div class="mb-3">
                            <p>Beneficios</p>
                            <div class="d-flex gap-2">
                               <div>
                                    <label for="beneficio" class="form-label">beneficio</label>
                                    <input type="checkbox" class="" id="beneficio">
                                </div>
                                <div>
                                    <label for="beneficio" class="form-label">beneficio</label>
                                    <input type="checkbox" class="" id="beneficio">
                                </div>
                                <div>
                                    <label for="beneficio" class="form-label">beneficio</label>
                                    <input type="checkbox" class="" id="beneficio">
                                </div>
                            </div>
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
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-star"></i> Agregar beneficio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" require>
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

    <div class="modal fade" id="updateMembershipModal" tabindex="-1" aria-labelledby="updateMembershipModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-credit-card"></i> Actualizar membresia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="updateIdMembership" class="form-label">Id</label>
                            <input type="text" class="form-control" id="updateIdMembership" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateLevel" class="form-label">Nivel</label>
                            <input type="text" class="form-control" id="updateLevel" require>
                        </div>
                        <div class="mb-3">
                            <label for="updatePrice" class="form-label">Precio</label>
                            <input type="text" class="form-control" id="updatePrice" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateMembershipDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="updateMembershipDescription"> </textarea>
                        </div>
                        <div class="mb-3">
                            <p>Beneficios</p>
                            <div class="d-flex gap-2">
                               <div>
                                    <label for="beneficio1" class="form-label">beneficio</label>
                                    <input type="checkbox" class="" id="beneficio1">
                                </div>
                                <div>
                                    <label for="beneficio2" class="form-label">beneficio</label>
                                    <input type="checkbox" class="" id="beneficio2">
                                </div>
                                <div>
                                    <label for="beneficio3" class="form-label">beneficio</label>
                                    <input type="checkbox" class="" id="beneficio3">
                                </div>
                            </div>
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

    <div class="modal fade" id="updateBenefitModal" tabindex="-1" aria-labelledby="updateBenefitModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-brands fa-slack"></i> Actualizar beneficio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="idBenefit" class="form-label">Id</label>
                            <input type="text" class="form-control" id="idBenefit" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="updateName" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateBenefitDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="updateBenefitDescription"> </textarea>
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

    <div class="modal fade" id="descriptionContent" tabindex="-1" aria-labelledby="descriptionContent" aria-hidden="true">
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
        function updateMembershipHandler(id, level, price, description, benefits) {
            document.querySelector("#updateIdMembership").value = id
            document.querySelector("#updateLevel").value = level
            document.querySelector("#updatePrice").value = description
            for (let d of benefits){
                document.querySelector(`#beneficio${d}`).checked = true;
            }
        }

        function updateBenefitHandler(id, name, description) {
            document.querySelector("#idBenefit").value = id
            document.querySelector("#updateName").value = name
            document.querySelector("#updateBenefitDescription").value = description
        }

        function DeleteMembershipHandler(id) {
            alert(`delete membeship ${id}`)
        }

        function DeleteBenefitHandler(id) {
            alert(`deleter benefit ${id}`)
        }

        function OpenDescriptionHandler(description) {
            document.querySelector("#descriptionContent").innerHTML = description
        }

    </script>
</x-admin.admin_layout>