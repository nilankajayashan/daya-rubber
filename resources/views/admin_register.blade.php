<!doctype html>
<html lang="en">
@include('components.header')
<body>
<div class="container-fluid bg-dark p-3" style="min-height:150px;">
    <div class="row">
        <h3 class="text-light text-left col-lg-5" style="margin-left:50px">Register</h3>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="col-lg-6 m-0 p-0 ">
            <ol class="breadcrumb text-light bg-dark p-0 m-0" style="float: right">
                <li class="breadcrumb-item "><a href="#">Home</a></li>
                <li class="breadcrumb-item  active " aria-current="page">register</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card container " style="top:-60px;" >
    <div class="row">
        <div class="col-lg-7">
            <img src="{{ asset('assets/register.png') }}" alt=""  class="col-12 float-end">
        </div>
        <div class="col-lg-5 p-3">
            <h3>Register [ADMINISTRATOR]</h3>
            <form class="ms-3" method="post" action="{{ route('admin-register-submit') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required="required">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" required="required">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="tel" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile">
                    @error('mobile')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="8" maxlength="32" required="required">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary col-12">Register</button>
            </form>
        </div>
    </div>
</div>
@include('template.message')
</body>
</html>
