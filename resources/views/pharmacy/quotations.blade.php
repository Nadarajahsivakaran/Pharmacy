@extends('pharmacy.pharamDash')
@section('content')

    <div class="container quoation">
        quoation


        <div class="row">

            <div class="col-4">
                <div class="row">
                    <img src="{{ asset('Images/' . $data->image1 . '') }}">
                </div>
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset('Images/' . $data->image1 . '') }}" style="width: 50px">
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('Images/' . $data->image1 . '') }}" style="width: 50px">
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('Images/' . $data->image1 . '') }}" style="width: 50px">
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('Images/' . $data->image1 . '') }}" style="width: 50px">
                    </div>

                </div>
            </div>


            <div class="col-8">
                <form action="/store-quotations" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="display: none">id</th>
                                <th>Drugs</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                            </tr>
                        </thead>


                        <tbody>

                        </tbody>


                    </table>

                    <div class="amount">

                        <div class="mb-3">
                            <label>total</label>
                            <input type="text" name="total" id="total" value="0.00">
                        </div>

                        <div class="mb-3">
                            <label>Drugs</label>
                            <select name="drugs" id="drugs">
                                <option value="" disabled selected>Please Select</option>
                                @foreach ($drugs as $item)
                                    <option value="{{ $item->name }},{{ $item->unit_price }},{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Quantity</label>
                            <input  type="text" name="quantity" id="quantity">
                        </div>

                        <button class="btn btn-primary" id="add">Add</button>
                        <button class="btn btn-success" type="submit">Send</button>

                    </div>



                    <input type="hidden" name="id" value="{{ $data->id }}">








                </form>
            </div>


        </div>






    </div>

    <script>
        let subTotal = [];

        $('#add').on('click', function(e) {
            e.preventDefault();
            let total = 0;
            console.log("click");
            let drugs = $('#drugs').val();
            let quantity = $('#quantity').val();
            let myArray = drugs.split(",");

            let unitPrice = parseInt(myArray[1]).toFixed(2);
            subTotal.push(unitPrice * quantity);
            console.log(subTotal);

            subTotal.forEach(element => {
                console.log(element);
                total += element;
            });
            console.log(total);
            let html = "";
            html += `<tr>
                    <td><input type="hidden" readonly class="form-control" name="drug_id[]" value="${myArray[2]}"></td>
                    <td><input type="text" readonly class="form-control" name="drug_name[]" value="${myArray[0]}"></td>
                    <td><input type="text" readonly class="form-control" name="drug_unit_price[]" value="${unitPrice}"></td>
                    <td><input type="text" readonly class="form-control" name="drug_quantity[]" value="${quantity}"></td>
                    <td><input type="text" readonly class="form-control" name="drug_total[]"  value="${(quantity*unitPrice).toFixed(2)}"></td>

                </tr>`
            $('tbody').append(html);
            $("#total").empty().val(total);
        });
    </script>
@endsection
