@extends('users.user_dashboard')
@section('content')
    <div class="container box">

        <h4 class="heading">Create Prescription</h4>

        <form action="/store-prescription" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Note</label>
                <textarea class="form-control" name="note" rows="3" placeholder="Enter Your Note..."></textarea>
                <span class="text-danger">
                    @error('note')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label>Delivery Address</label>
                        <input type="text" value="{{ old('address') }}" name="address" class="form-control"
                            placeholder="Enter Your Delivery Address...">
                        <span class="text-danger">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Delivery Time</label>
                        <input class="form-control" name="time" type="time">
                        <span class="text-danger">
                            @error('time')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image1</label>
                        <input class="form-control" name="image1" type="file">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image2</label>
                        <input class="form-control" name="image2" type="file">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image3</label>
                        <input class="form-control" name="image3" type="file">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image4</label>
                        <input class="form-control" name="image4" type="file">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image5</label>
                        <input class="form-control" name="image5" type="file">
                    </div>
                </div>
            </div>











            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
