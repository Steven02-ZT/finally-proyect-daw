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
                    @foreach ($memberships as $membership)
                        <tr>
                            <th scope="row"><button type="button" class="text-blue-base btn" 
                            onclick="updateMembershipHandler('{{$membership['id']}}', '{{$membership['level']}}', '{{$membership['price']}}', '{{$membership['description']}}', '{{$membership['benefits']}}')" data-bs-toggle="modal" data-bs-target="#updateMembershipModal">{{$membership['id']}}</button></th>
                            <td>{{$membership['level']}}</td>
                            <td>${{$membership['price']}}</td>
                            <td><button class="btn text-success" data-bs-toggle="modal" data-bs-target="#descriptionContent" onclick="descriptionContent('{{$membership['description']}}')">Ver descripción</button></td>
                            <td>
                                <ul class="list-group">
                                    @foreach ($membership['benefits'] as $benefit)
                                        <li class="list-item">{{$benefit['name']}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <form action="{{ route('membership.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="int" value="{{$membership['id']}}" name="idMembershipDelete" id="idMembershipDelete" readonly hidden>
                                    <button type="submit" type="button" class="btn text-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <div>
                <h2>Beneficios</h2>
                <div class="col-auto">
                    <button type="button" class="btn bg-blue-base text-light-base" data-bs-toggle="modal" data-bs-target="#addbenefitModal"><i class="fa-solid fa-star"></i> Nuevo beneficio</button>
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
                    @foreach ($benefits as $benefit)
                        <tr>
                            <th scope="row"><button type="button" class="text-blue-base btn" onclick="updateBenefitHandler('{{$benefit['id']}}','{{$benefit['name']}}','{{$benefit['description']}}')" data-bs-toggle="modal" data-bs-target="#updateBenefitModal">{{$benefit['id']}}</button></th>
                            <td>{{$benefit['name']}}</td>
                            <td><button class="btn text-success" data-bs-toggle="modal" data-bs-target="#descriptionContent" onclick="OpenDescriptionHandler('{{$benefit['description']}}')">Ver descripción</button></td>
                            <td>
                                <form action="{{ route('benefit.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="int" value="{{$benefit['id']}}" name="idBenefitDelete" id="idBenefitDelete" readonly hidden>
                                    <button type="submit" type="button" class="btn text-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addClassificationModal" tabindex="-1" aria-labelledby="addClassificationModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('membership.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-credit-card"></i> Agregar membresia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Nivel</label>
                            <input type="text" name="level" class="form-control" id="level" require>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio</label>
                            <input type="int" name="price" class="form-control" id="price" require>
                        </div>
                        <div class="mb-3">
                            <label for="ClassificationDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="ClassificationDescription" id="ClassificationDescription"> </textarea>
                        </div>
                        <div class="mb-3">
                            <p>Beneficios</p>
                            <div class="d-flex gap-2">
                                @foreach ($benefits as $benefit)
                                    <div>
                                        <label for="benefit{{$benefit['id']}}" class="form-label">{{$benefit['name']}}</label>
                                        <input type="checkbox" value="{{$benefit['id']}}" name="benefits[]" id="benefit{{$benefit['id']}}">
                                    </div>
                                @endforeach
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

    <div class="modal fade" id="addbenefitModal" tabindex="-1" aria-labelledby="addbenefitModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('benefit.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-star"></i> Agregar beneficio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" require>
                        </div>
                        <div class="mb-3">
                            <label for="genderDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="genderDescription" id="ClassificationDescription"> </textarea>
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

    <div class="modal fade" id="updateMembershipModal" tabindex="-1" aria-labelledby="updateMembershipModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('membership.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-credit-card"></i> Actualizar membresia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="updateIdMembership" class="form-label">Id</label>
                            <input type="int" class="form-control" name="updateIdMembership" id="updateIdMembership" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateLevel" class="form-label">Nivel</label>
                            <input type="text" class="form-control" name="updateLevel" id="updateLevel" require>
                        </div>
                        <div class="mb-3">
                            <label for="updatePrice" class="form-label">Precio</label>
                            <input type="int" class="form-control" name="updatePrice" id="updatePrice" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateMembershipDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="updateMembershipDescription" id="updateMembershipDescription"> </textarea>
                        </div>
                        <div class="mb-3">
                            <p>Beneficios</p>
                            <div class="d-flex gap-2">
                                @foreach ($benefits as $benefit)
                                <div>
                                    <label for="beneficio{{$benefit['id']}}" class="form-label">{{$benefit['name']}}</label>
                                    <input type="checkbox" value="{{$benefit['id']}}" name="benefitsUpdate[]" id="beneficio{{$benefit['id']}}">
                                </div>
                                @endforeach
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

    <div class="modal fade" id="updateBenefitModal" tabindex="-1" aria-labelledby="updateBenefitModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="post" action="{{ route('benefit.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-brands fa-slack"></i> Actualizar beneficio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="idBenefit" class="form-label">Id</label>
                            <input type="int" class="form-control" name="idBenefit" id="idBenefit" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateName" class="form-label">Name</label>
                            <input type="text" name="updateName" class="form-control" id="updateName" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateBenefitDescription" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="updateBenefitDescription" id="updateBenefitDescription"> </textarea>
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
            document.querySelector("#updatePrice").value = price
            document.querySelector("#updateMembershipDescription").value = description
            let checkboxes = document.querySelectorAll("input[name='benefitsUpdate[]']");
            let benefitsIds = JSON.parse(benefits).map(benefit => benefit.pivot.benefit_id);
            checkboxes.forEach((checkbox) => {
                if(benefitsIds.includes(parseInt(checkbox.value))) {
                    checkbox.checked = true;
                }
            });
        }

        function updateBenefitHandler(id, name, description) {
            document.querySelector("#idBenefit").value = id
            document.querySelector("#updateName").value = name
            document.querySelector("#updateBenefitDescription").value = description
        }

        function OpenDescriptionHandler(description) {
            document.querySelector("#descriptionMovieContent").innerHTML = description
        }

    </script>
</x-admin.admin_layout>