@extends('admin.layouts.app')
@section('content')
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Screenshot</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('paymentDone')}}" method="post" enctype="multipart/form-data">
                @csrf
         
                <div class="modal-body">
                    <select name="payment_method" id="" class="form-control mb-1">
                        <option value="">Kpay</option>
                        <option value="">Wave pay</option>
                        <option value="">AYA pay</option>
                    </select>
                    <input type="hidden" name = "employer_id" value = '{{ Auth::user()->id }}'>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
        </div>
    </div> --}}

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Payment</h5>
            </div>
            <form action="{{ route('paymentStore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div>
                        <label for="">Payment method</label>
                        <input type="text" name="paymentMethod" class="form-control">
                    </div>
                    <div>
                        <input type="hidden" name = "employer_id" value = '{{ Auth::user()->id }}'>
                        <label for="">Payment Screenshot</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary float-end">Send</button>
                        <button type="button" class="btn btn-secondary float-end me-1">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection