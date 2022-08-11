@extends('pharmacy.pharamDash')
@section('content')
    <div class="container">

        <h4 class="heading"> All Prescription</h4>


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
                    <th>Status</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->note }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->time }}</td>
                        <td><img src="{{ asset('Images/' . $data->image1 . '') }}" style="width: 50px"></td>
                        <td><img src="{{ asset('Images/' . $data->image2 . '') }}" style="width: 50px"></td>
                        <td><img src="{{ asset('Images/' . $data->image3 . '') }}" style="width: 50px"></td>
                        <td><img src="{{ asset('Images/' . $data->image4 . '') }}" style="width: 50px"></td>
                        <td><img src="{{ asset('Images/' . $data->image5 . '') }}" style="width: 50px"></td>
                        <td>
                            @if ($data->status == 2)
                                <button class="btn btn-success">Accepted</button>
                            @elseif ($data->status == 3)
                                <button class="btn btn-danger">Rejected</button>
                            @elseif ($data->status == 0)
                                <button class="btn btn-secondary">Pending</button>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
