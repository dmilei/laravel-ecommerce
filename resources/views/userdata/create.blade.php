@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h2>Contact Info and Shipping Address</h2>
                </div>

                <div class="panel-body">
                    <form action="{{ route('userdata.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                          <label for="inputName" class="col-2 col-lg-1 col-form-label text-left">Name:</label>
                          <div class="col-10 col-lg-11">
                            <input id="inputName" required placeholder="Name" class="form-control" name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPhone" class="col-2 col-lg-1 col-form-label text-left">Phone:</label>
                          <div class="col-10 col-lg-11">
                            <input id="inputPhone" required placeholder="Phone" class="form-control" name="phone">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-lg-4">
                            <div class="form-group row">
                              <label for="inputCountry" class="col-2 col-lg-3 col-form-label text-left">Country:</label>
                              <div class="col-10 col-lg-9">
                                <input id="inputCountry" required placeholder="Country" class="form-control" name="country">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-4">
                            <div class="form-group row">
                              <label for="inputCity" class="col-2 col-lg-3 col-form-label text-left">City:</label>
                              <div class="col-10 col-lg-9">
                                <input id="inputCity" required pZiplaceholder="City" class="form-control" name="city">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-4">
                            <div class="form-group row">
                              <label for="inputZip" class="col-2 col-lg-3 col-form-label text-left">Zip:</label>
                              <div class="col-10 col-lg-9">
                                <input id="inputZip" required placeholder="Zip" class="form-control" name="zip">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAddress" class="col-2 col-lg-1 col-form-label text-left">Address:</label>
                          <div class="col-10 col-lg-11">
                            <input id="inputAddress" placeholder="Address" class="form-control" name="address">
                          </div>
                        </div>
                        <div class="form-group save-contact">
                              <button class="form-control btn btn-info">Save Contact Info</button>
                        </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
