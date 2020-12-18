@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Checkout</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container">

        <div class="row">
            <div class="col-md-5 col-lg-4 theiaStickySidebar">

                <!-- Booking Summary -->
                <div class="card booking-card">
                    <div class="card-header">
                        <h4 class="card-title">Booking Summary</h4>
                    </div>
                    <div class="card-body">

                        <!-- Booking Doctor Info -->
                        <div class="booking-doc-info">
                            <a href="doctor-profile.html" class="booking-doc-img">
                                <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                            </a>
                            <div class="booking-info">
                                <h4><a href="doctor-profile.html">Dr. Darren Elder</a></h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">35</span>
                                </div>
                                <div class="clinic-details">
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i>
                                        Newyork, USA</p>
                                </div>
                            </div>
                        </div>
                        <!-- Booking Doctor Info -->

                        <div class="booking-summary">
                            <div class="booking-item-wrap">
                                <ul class="booking-date">
                                    <li>Date <span>16 Nov 2019</span></li>
                                    <li>Time <span>10:00 AM</span></li>
                                </ul>
                                <ul class="booking-fee">
                                    <li>Consulting Fee <span>$100</span></li>
                                    <li>Booking Fee <span>$10</span></li>
                                    <li>Video Call <span>$50</span></li>
                                </ul>
                                <div class="booking-total">
                                    <ul class="booking-total-list">
                                        <li>
                                            <span>Total</span>
                                            <span class="total-cost">$160</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Booking Summary -->
            </div>
            <div class="col-md-7 col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <!-- Checkout Form -->
                        <form action="https://doccure-html.dreamguystech.com/template/booking-success.html">

                            <!-- Personal Information -->
                            <div class="info-widget">
                                <h4 class="card-title">Personal Information</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>First Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Email</label>
                                            <input class="form-control" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Phone</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="exist-customer">Existing Customer? <a href="#">Click here to login</a></div>
                            </div>
                            <!-- /Personal Information -->

                            <div class="payment-widget">
                                <h4 class="card-title">Payment Method</h4>

                                <div class="box-element" id="payment-info">
                                    <div class="mb-2"><small>Paypal Options</small></div>
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                            <!-- Terms Accept -->
                            <!-- <div class="terms-accept">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="terms_accept">
                                    <label for="terms_accept">I have read and accept <a href="#">Terms &amp;
                                            Conditions</a></label>
                                </div>
                            </div> -->
                            <!-- /Terms Accept -->

                        </form>
                        <!-- /Checkout Form -->

                    </div>
                </div>

            </div>


            <script
                src="https://www.paypal.com/sdk/js?client-id=AXXN3ric8FZZ0G0t2GwgRdGH1No0JV1kvjeSCTAcYJGgrbOYrb2RsvN0TPLRKg4r-u99RJBCICoNYMga">
            </script>
            <script>
            var total = 160;

            // Render the PayPal button into #paypal-button-container
            paypal
                .Buttons({
                    // Set up the transaction
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: parseFloat(total).toFixed(2),
                                },
                            }, ],
                        });
                    },

                    // Finalize the transaction
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            // Show a success message to the buyer
                            submitFormData();
                        });
                    },
                })
                .render('#paypal-button-container');
            </script>


        </div>
    </div>

</div>

</div>
<!-- /Page Content -->
@endsection






<script type="text/javascript">
var total = 160;  

var form = document.getElementById('form');
csrftoken = form.getElementsByTagName('input')[0].value;
console.log('Newtoken:', form.getElementsByTagName('input')[0].value);
form.addEventListener('submit', function(e) {
    e.preventDefault();
    console.log('Form submitted');

});

/*	document.getElementById('make-payment').addEventListener('click', function (e) {
	submitFormData();
}); */

function submitFormData() {
    console.log('Payment Button clicked');

    alert('Transaction completed');
    document.cookie = 'cart=' + JSON.stringify(cart) + ';domain=;path=/';
    window.location.href = "{{ url('booking-success') }}";
}
</script>