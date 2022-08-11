@extends('users.user_dashboard')
@section('content')
    <div class="container">
        <h4 class="heading"> Approve Quotation</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Note</th>
                    <th>Address</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @if (count($datas) > 0)
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->note }}</td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->time }}</td>
                            <td><button type="button" onclick="edit({{ $data->id }})" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit Status
                                </button></td>
                        </tr>
                    @endforeach
                @else

                <tr>
                    <td></td>
                    <td>No Records</td>
                    <td></td>
                    <td></td>

                </tr>
                @endif




            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/quotations-approve" method="post">
                    @csrf
                    <div class="modal-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Drugs</th>
                                    <th>Unit price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <tbody id="modalTbody">

                            </tbody>
                        </table>

                        <label for="">Status</label>
                        <select class="form-select" name="status">
                            <option value="" disabled selected>Please Select</option>
                            <option value="2">Accepted</option>
                            <option value="3">Rejected</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        function edit(id) {
            console.log("click");

            $.ajax({
                type: "GET",
                url: "/user-Edit/" + id,
                dataType: "json",

                success: function(response) {
                    console.log(response);
                    let html = "";
                    let amount = 0;
                    for (const key in response) {
                        amount += response[key]['amount'];
                        html += `<tr>

                            <td>${response[key]['name']}</td>
                            <td>${response[key]['amount']/response[key]['quantity']}</td>
                            <td>${response[key]['quantity']}</td>
                            <td>${response[key]['amount']}</td>
                            </tr>`
                    }

                    html +=
                        `<tr><td><input type="hidden" name="id" value="${id}"></td><td></td><td>Total</td><td>${amount}</td></tr>`

                    $('#modalTbody').append(html);


                },

                error: function(err) {
                    console.log(err);
                },
            });

        };
    </script>
@endsection
