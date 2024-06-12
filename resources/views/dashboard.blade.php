<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!-- 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->

    <div class="container py-12">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title">
                    Data
                </h3>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">

                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-location-dot"></i>
                            Total Points
                            <p style="font-size: 28pt">{{$total_points}}</p>
                        </div>
                        <!-- <div class="alert alert-secondary" role="alert">
                        A simple secondary alert—check it out!
                      </div>
                      <div class="alert alert-success" role="alert">
                        A simple success alert—check it out!
                      </div>
                      <div class="alert alert-danger" role="alert">
                        A simple danger alert—check it out!
                      </div>
                      <div class="alert alert-warning" role="alert">
                        A simple warning alert—check it out!
                      </div>
                      <div class="alert alert-info" role="alert">
                        A simple info alert—check it out!
                      </div>
                      <div class="alert alert-light" role="alert">
                        A simple light alert—check it out!
              
                    </div> -->
                    </div>
                    <div class="col">
                        <div class="alert alert-secondary" role="alert">


                            <i class="fa-solid fa-route"></i>
                            Total Polylines
                            <p style="font-size: 28pt">{{$total_polylines}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-draw-polygon"></i>
                            Total Poligons
                            <p style="font-size: 28pt">{{$total_polygons}}</p>
                        </div>


                    </div>
                </div>
                <hr />
                <p>Anda login sebagai <span class="fw-bold">
                        {{Auth::user()->name}}
                    </span> dengan email <span class="fst-italic">{{Auth::user()->email}}</span>
                </p>
            </div>
        </div>
    </div>

</x-app-layout>