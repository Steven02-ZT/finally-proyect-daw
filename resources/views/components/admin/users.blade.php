<x-admin.admin_layout :title="'Usuarios'">
    <div class="container mt-5">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="search" class="col-form-label fs-3 text-dark-base">Buscar usuario por correo</label>
            </div>
            <div class="col-auto">
                <input type="email" id="search" class="form-control" aria-describedby="searchUser">
            </div>
            <div class="col-auto">
                <button type="button" class="btn bg-dark-base text-light-base"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn bg-blue-base text-light-base" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="fa-solid fa-user-plus"></i> Nuevo usuario</button>
            </div>
        </div>
    </div>
    <div>
        <div class="container mt-5">
            <table class="table table-light table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Membresia</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <th scope="row"><button type="button" class="text-blue-base btn" onclick="UpdateUserHandler('{{$client['id']}}','{{$client['given_name']}}','{{$client['last_name']}}', '{{$client['email']}}', '{{$client['membership_id']}}')" data-bs-toggle="modal" data-bs-target="#updateUserModal">{{$client['id']}}</button></th>
                        <td>{{$client['given_name']}}</td>
                        <td>{{$client['last_name']}}</td>
                        <td>{{$client['email']}}</td>
                        <td>{{$client['membership']['level']}}</td>
                        <td>
                            <form action="{{ route('client.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="text" value="{{$client['id']}}" name="idDelete" id="idDelete" readonly hidden>
                                <button type="submit" type="button" class="btn text-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('client.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user"></i> Agregar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombres</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" require>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Apellidos</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="lastnameHelp" require>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" require>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" require>
                        </div>
                        <div class="mb-3">
                            <label for="membership" class="form-label">Membresía</label>
                            <select class="form-select" id="membership" name="membership" aria-describedby="membershipHelp" require>
                                @foreach ($memberships as $membership)
                                <option value="{{$membership['id']}}">{{$membership['level']}}</option>
                                @endforeach
                            </select>
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

    <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('client.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user"></i> Actualizar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="updateId" class="form-label">Id</label>
                            <input type="int" class="form-control" name="updateId" id="updateId" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateName" class="form-label">Nombres</label>
                            <input type="text" name="updateName" class="form-control" id="updateName" aria-describedby="nameHelp" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateLastNname" class="form-label">Apellidos</label>
                            <input type="text" name="updateLastNname" class="form-control" id="updateLastNname" aria-describedby="lastnameHelp" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateEmail" class="form-label">Correo electrónico</label>
                            <input type="email" name="updateEmail" class="form-control" id="updateEmail" aria-describedby="emailHelp" require>
                        </div>
                        <div class="mb-3">
                            <label for="updateMembership" class="form-label">Membresía</label>
                            <select class="form-control" name="updateMembership" id="updateMembership" aria-describedby="membershipHelp" require>
                                @foreach ($memberships as $membership)
                                <option value="{{$membership['id']}}">{{$membership['level']}}</option>
                                @endforeach
                            </select>
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

    <script>
        function UpdateUserHandler(id, name, last_name, email, membership) {
            document.querySelector("#updateId").value = id
            document.querySelector("#updateName").value = name
            document.querySelector("#updateLastNname").value = last_name
            document.querySelector("#updateEmail").value = email
            document.querySelector("#updateMembership").value = membership
        }

        function DeleteuserHandler(id) {
            alert(`deleter user ${id}`)
        }
    </script>
</x-admin.admin_layout>