<x-app>
  <div class=" d-flex justify-content-center">
    <div class="card w-50">
      <div class="card-header">
        <h3>Crear Usuario</h3>
      </div>
      <div class="card-body">
        <form class="text-center border p-3" method="post" action="{{route('user.create.post')}}">
          @csrf
          <x-user.form-user :roles="$roles" />
        </form>
      </div>
    </div>
  </div>
</x-app>