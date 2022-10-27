@extends('template')
@section('title', 'Food')
@section('content')
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center my-5">Food Menu</h2>
            @guest
            @else
                @if (Auth::user()->email == '123@123.123')
                    <a href="/add-foods" class="btn btn-primary my-5">Add Menu</a>
                @endif
            @endguest
            <div class="row">

                @foreach ($foods as $food)
                    <div class="col-md-6">
                        <!--  -->
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <img width="80%" height="80%" src="{{ $food->image }}"
                                        class="img-fluid rounded-start m-4" alt="...">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h4>{{ $food->name }}</h4>
                                        <p class="food-price">{{ $food->price }}</p>
                                        <p class="food-detail">
                                            {{ $food->description }}
                                        </p>
                                        <a href="https://api.whatsapp.com/send?phone=6282331157233&text=Halo%20lapak%20food%20Saya%20Mau%20Beli%20 {{ $food->name }}"
                                            class="btn btn-danger">Order Now</a>
                                        @guest
                                        @else
                                            @if (Auth::user()->email == '123@123.123')
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/food/destroy/{{ $food->id }}" type="button"
                                                        class="btn btn-warning">Delete</a>
                                                    <a href="/food/edit/{{ $food->id }}" type="button"
                                                        class="btn btn-success">Edit</a>
                                                </div>
                                            @endif
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                @endforeach

            </div>

            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a class="text-danger text-decoration-none" href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
@endsection
