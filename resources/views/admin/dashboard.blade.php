@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-3 mb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h6>Total Surveys</h6>

                    <h2>0</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h6>Total Responses</h6>

                    <h2>0</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h6>Clients</h6>

                    <h2>0</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h6>Average Rating</h6>

                    <h2>0.0</h2>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection