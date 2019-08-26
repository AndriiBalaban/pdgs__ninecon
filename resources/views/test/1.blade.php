@extends('layouts.layout')

@section('content')
    <div  id="app" class="flex-center position-ref full-height">
        <div class="container">
            <div class="row">
                <div class="col text-right">
                    <h2 class="border-bottom border-success">טופס פתיחת קריאת שרות לגרילים</h2>
                    <test-form-1></test-form-1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('form')
    <form
            @submit="checkForm"
            action="/submit-form"
            method="POST"
            class="form-rtl" novalidate="true">
        <div class="form-group row">
            <label class="col-12 col-form-label font-weight-bold">פרטי לקוח:</label>
        </div>
        <div class="form-group row">
            <label for="fullName" class="col-12 col-md-3 col-lg-2 col-form-label">* שם מלא:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <input type="text" class="form-control" id="fullName" v-model="fullName" required>
                <div class="invalid-feedback">
                    אנא הזן שם מלא:
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-12 col-md-3 col-lg-2 col-form-label">כתובת:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <input type="text" class="form-control" id="address" v-model="address">
            </div>
        </div>
        <div class="form-group row">
            <label for="phoneHome" class="col-12 col-md-3 col-lg-2 col-form-label">טלפון בית:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <input type="tel" class="form-control" id="phoneHome" v-model="phoneHome">
            </div>
        </div>
        <div class="form-group row">
            <label for="phoneMobile" class="col-12 col-md-3 col-lg-2 col-form-label">טלפון נייד:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <input type="tel" class="form-control" id="phoneMobile" v-model="phoneMobile">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-12 col-md-3 col-lg-2 col-form-label">* דואר אלקטרוני:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <input type="email" class="form-control" id="email" v-model="email" required>
                <div class="invalid-feedback">
                    אנא הזן דואר אלקטרוני:
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-12 col-form-label font-weight-bold">פרטי המוצר:</label>
        </div>

        <div class="form-group row">
            <label for="brand" class="col-12 col-md-3 col-lg-2 col-form-label">* משפחה:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <select id="brand" class="form-control" v-model="brand" required>
                    <option v-for="option in brandOptions" :value="option" :selected="option == brand">@{{ option }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="product" class="col-12 col-md-3 col-lg-2 col-form-label">* מוצר:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <select id="product" class="form-control" v-model="product" required>
                    <option v-for="option in productOptions" :value="option" :selected="option == product">@{{ option }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-12 col-md-3 col-lg-2 col-form-label">* תאריך רכישה:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <input type="date" class="form-control" id="date" v-model="date" required>
                <div class="invalid-feedback">
                    אנא הזן תאריך רכישה:
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="file" class="col-12 col-md-3 col-lg-2 col-form-label">* הכנסת חשבונית רכישה:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <input type="file" class="form-control" v-on:change="checkFile($event)" id="file" accept=".jpg, .png">
            </div>
        </div>
        <div class="form-group row">
            <label for="freetext" class="col-12 col-md-3 col-lg-2 col-form-label">* הסבר על התקלה:</label>
            <div class="col-12 col-md-9 col-lg-6">
                <textarea class="form-control" id="freetext" v-model="freetext" required></textarea>
                <div class="invalid-feedback">
                    התקלה:
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary" v-on:click="checkForm">שלח</button>
    </form>
@endsection

<script type="x-template" id="test-form-1">
    @yield('form')
</script>

<script>
    var priorityReady = function () {
        window.isPriorityReady = true;
        $('body').trigger('loginReady')
    }
</script>