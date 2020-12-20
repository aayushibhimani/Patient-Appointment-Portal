@extends('layouts.app')
<style>
body {
    background-color: #f8f9fa !important;
}
</style>
@section('content')


<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="invoice-content">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <h1 style="color:#15558d;">Patient Appointment Portal</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text">Invoice From</strong>
                                    <p class="invoice-details invoice-details-two">
                                        Dr. Rishi Gupta<br>
                                        40043 br road<br>
                                        Mumbai, Maharashtra <br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Invoice To</strong>
                                    <p class="invoice-details">
                                        Rishi Gupta<br>
                                        40056,Kalbadevi<br>
                                        Mumbai<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->


                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>General Consultation</td>
                                                <td class="text-right">Rs.160</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 ml-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                            <tr>
                                                <th>Subtotal:</th>
                                                <td><span>Rs.160</span></td>
                                            </tr>
                                            <tr>
                                                <th>Total Amount:</th>
                                                <td><span>Rs.160</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@endsection
