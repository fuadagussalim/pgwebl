@extends('layouts.template')
@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h3>Data Point</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>  
                        <th>Description</th>
                        <th>Coordinate</th>
                        <th>Image</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @foreach($points as $p)
                        <tr>
                            <td>
                            {{$no++}}
                            </td>   
                            <td>
                            {{$p->name}}
                            </td>   
                            <td>
                            {{$p->description}}
                            </td>   
                            <td>
                            {{$p->geom}}
                            </td>   
                            <td>
                                <img src="{{asset('storage/images/' . $p->image)}}" alt="" width="200px">
                            </td>
                            <td>
                             {{$p->created_at}}
                            </td>
                            
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
