@extends('pharmacy.pharamDash')
@section('content')

    <div class="container">

     <h4 class="heading">Pending Prescription</h4>

     <table class="table">
        <thead>
            <tr>
                <th>Note</th>
                <th>Address</th>
                <th>Time</th>
                <th>Image1</th>
                <th>Image2</th>
                <th>Image3</th>
                <th>Image4</th>
                <th>Image5</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @if(count($datas)>0)
            @foreach ($datas as $data)
            <tr>
                <td>{{ $data->note }}</td>
                <td>{{ $data->address }}</td>
                <td>{{ $data->time }}</td>
                <td><img src="{{ asset('Images/'.$data->image1.'') }}" style="width: 50px"></td>
                <td><img src="{{ asset('Images/'.$data->image2.'') }}" style="width: 50px"></td>
                <td><img src="{{ asset('Images/'.$data->image3.'') }}" style="width: 50px"></td>
                <td><img src="{{ asset('Images/'.$data->image4.'') }}" style="width: 50px"></td>
                <td><img src="{{ asset('Images/'.$data->image5.'') }}" style="width: 50px"></td>
                <td><a href="/create-quotations/{{ $data->id }}" class="btn btn-success">Add</a></td>
            </tr>
            @endforeach

            @else
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>No records</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            @endif


        </tbody>
     </table>

    </div>
@endsection
