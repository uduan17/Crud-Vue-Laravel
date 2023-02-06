<x-app>

<section class="d-flex justify-content-center flex-wrap">

  @foreach ($books as $book)
    <div class="card mx-2 my-2" style="width: 18rem;">
    @if ($book->image)
    <img src="/storage/images/{{$book->image}}" class="card-img-top" alt="...">  
    @else
    <img src="https://images.pexels.com/photos/13036786/pexels-photo-13036786.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="...">  
    @endif
      <div class="card-body text-center">
        <h5 class="card-title">{{$book->title}}</h5>
        <strong>Descripcion:</strong> <br>  {{$book->description}} <br>
        <strong>Cantidad: </strong>{{$book->stock}} <br> <br>
        <a href="#" class="btn btn-outline-dark">Prestar</a>
      </div>
    </div>
  @endforeach
  </section>

</x-app>