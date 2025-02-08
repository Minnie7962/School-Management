@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Add Teacher
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.teacher.create')}}" method="POST">
                            @csrf
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">First Name<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="First Name" required value="{{old('first_name')}}">
                            </div>
                            <div class="col-md-3">
                                <label for="inputLastName" class="form-label">Last Name<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Last Name" required value="{{old('last_name')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required value="{{old('email')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword" class="form-label">Password<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="password" class="form-control" id="inputPassword" name="password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="formFile" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                                <div id="previewPhoto"></div>
                                <input type="hidden" id="photoHiddenInput" name="photo" value="">
                            </div>
                            <div class="col-md-12">
                                <label for="inputAddress" class="form-label">Address<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="634 Main St" required value="{{old('address')}}">
                            </div>
                            <div class="col-md-12">
                                <label for="inputAddress2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartment, studio, or floor" value="{{old('address2')}}">
                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">City<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputCity" class="form-select" name="city" required>
                                        <option value="បន្ទាយមានជ័យ">បន្ទាយមានជ័យ</option>
                                        <option value="បាត់ដំបង">បាត់ដំបង</option>
                                        <option value="កំពង់ចាម">កំពង់ចាម</option>
                                        <option value="កំពង់ឆ្នាំង">កំពង់ឆ្នាំង</option>
                                        <option value="កំពង់ស្ពឺ">កំពង់ស្ពឺ</option>
                                        <option value="កំពង់ធំ">កំពង់ធំ</option>
                                        <option value="កំពត">កំពត</option>
                                        <option value="កណ្ដាល">កណ្ដាល</option>
                                        <option value="កែប">កែប</option>
                                        <option value="កោះកុង">កោះកុង</option>
                                        <option value="ក្រចេះ">ក្រចេះ</option>
                                        <option value="មណ្ឌលគីរី">មណ្ឌលគីរី</option>
                                        <option value="ឧត្តរមានជ័យ">ឧត្តរមានជ័យ</option>
                                        <option value="ប៉ៃលិន">ប៉ៃលិន</option>
                                        <option value="ភ្នំពេញ">ភ្នំពេញ</option>
                                        <option value="ព្រះសីហនុ">ព្រះសីហនុ</option>
                                        <option value="ព្រះវិហារ">ព្រះវិហារ</option>
                                        <option value="ព្រៃវែង">ព្រៃវែង</option>
                                        <option value="ពោធិ៍សាត់">ពោធិ៍សាត់</option>
                                        <option value="រតនគីរី">រតនគីរី</option>
                                        <option value="សៀមរាប">សៀមរាប</option>
                                        <option value="ស្ទឹងត្រែង">ស្ទឹងត្រែង</option>
                                        <option value="ស្វាយរៀង">ស្វាយរៀង</option>
                                        <option value="តាកែវ">តាកែវ</option>
                                        <option value="ត្បូងឃ្មុំ">ត្បូងឃ្មុំ</option>
                                    </select>
                                </div>
                            <div class="col-md-4">
                                <label for="inputZip" class="form-label">Zip<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputZip" name="zip" required value="{{old('zip')}}">
                            </div>
                            <div class="col-md-4">
                                <label for="inputPhone" class="form-label">Phone<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+855" required value="{{old('phone')}}">
                            </div>
                            <div class="col-md-4">
                                <label for="inputGender" class="form-label">Gender<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <select id="inputGender" class="form-select" name="gender" required>
                                    <option value="Male" {{old('gender') == 'male' ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{old('gender') == 'female' ? 'selected' : ''}}>Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputNationality" class="form-label">Nationality<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="Khmer" required value="{{old('nationality')}}">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i> Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>

@include('components.photos.photo-input')
@endsection
