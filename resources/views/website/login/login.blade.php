@extends('website.master')
@section('title')
    Login | Page
@endsection

@section('content')
    <section class="py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body h-100">
                    <h3>Login Form</h3>
                    <hr/>
                    <form action="" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="" class="col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-outline-success px-5" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body h-100">
                    <h3>Registration Form</h3>
                    <hr/>
                    <form action="" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="" class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-outline-success px-5" value="Login">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
