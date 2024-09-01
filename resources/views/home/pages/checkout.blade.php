@extends('home.layouts.master')
@section('content')
<div id="content">
    <div class="page-title bg-dark dark">
        <div class="bg-image bg-parallax"><img src="/assets/soup/img/photos/bg-croissant.jpg" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Checkout</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section bg-light">

        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="cart-details shadow bg-white stick-to-content mb-4">
                        <div class="bg-dark dark p-4"><h5 class="mb-0">You order</h5></div>
                        <table class="cart-table">
                            <tr>
                                <td class="title">
                                    <span class="name"><a href="#product-modal" data-toggle="modal">Pizza Chicked BBQ</a></span>
                                    <span class="caption text-muted">26”, deep-pan, thin-crust</span>
                                </td>
                                <td class="price">$9.82</td>
                                <td class="actions">
                                    <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                                    <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="title">
                                    <span class="name"><a href="#product-modal" data-toggle="modal">Beef Burger</a></span>
                                    <span class="caption text-muted">Large (500g)</span>
                                </td>
                                <td class="price">$9.82</td>
                                <td class="actions">
                                    <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                                    <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="title">
                                    <span class="name"><a href="#product-modal" data-toggle="modal">Extra Burger</a></span>
                                    <span class="caption text-muted">Small (200g)</span>
                                </td>
                                <td class="price text-success">$0.00</td>
                                <td class="actions">
                                    <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                                    <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="title">
                                    <span class="name">Weekend 20% OFF</span>
                                </td>
                                <td class="price text-success">-$8.22</td>
                                <td class="actions"></td>
                            </tr>
                        </table>
                        <div class="cart-summary">
                            <div class="row">
                                <div class="col-7 text-right text-muted">Order total:</div>
                                <div class="col-5"><strong>$<span class="cart-products-total">0.00</span></strong></div>
                            </div>
                            <div class="row">
                                <div class="col-7 text-right text-muted">Delivery:</div>
                                <div class="col-5"><strong>$<span class="cart-delivery">0.00</span></strong></div>
                            </div>
                            <hr class="hr-sm">
                            <div class="row text-lg">
                                <div class="col-7 text-right text-muted">Total:</div>
                                <div class="col-5"><strong>$<span class="cart-total">0.00</span></strong></div>
                            </div>
                        </div>
                        <div class="cart-empty">
                            <i class="ti ti-shopping-cart"></i>
                            <p>Your cart is empty...</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 order-lg-first">
                    <div class="bg-white p-4 p-md-5 mb-4">
                        <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Basic informations</h4>
                        <div class="row mb-5">
                            <div class="form-group col-sm-6">
                                <label for="firstName">First Name:</label>
                                <input type="text" class="form-control" id="firstName">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="lastName">Last Name:</label>
                                <input type="text" class="form-control" id="lastName">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="phoneNumber">Phone number:</label>
                                <input type="text" class="form-control" id="phoneNumber">
                            </div>
                        </div>

                        <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Payment</h4>
                        <div class="row text-lg">
                            <div class="col-md-4 col-sm-6 form-group">
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="payment_type" value="paypal" class="custom-control-input" id="paymentPayPal">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description" for="paymentPayPal">PayPal</span>
                                </label>
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="payment_type" value="credit_card" class="custom-control-input" id="paymentCreditCard">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description" for="paymentCreditCard">Credit Card</span>
                                </label>
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="payment_type" value="cash" class="custom-control-input" id="paymentCash">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description" for="paymentCash">Cash</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-lg" id="checkoutBtn"><span>Order now!</span></button>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
