@extends('layouts.app')
 
@section('title', 'Admin Profile')
 
@section('content')
    <h1>Admin Profile:</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"><input type="text" name="dba" placeholder="Wrtite DBA"></div>
            <div class="col-sm-4"><input type="text" placeholder="Company / Legal Name"></div>
            <div class="col-sm-4"><input type="text" placeholder="Registration / National ID"></div>
        </div>


        <div class="row">
            <input type="text" placeholder="VAT">
            <input type="text" placeholder="Website">
            <input type="text" placeholder="Account Email">
            <input type="text" placeholder="Password">
            <input type="text" placeholder="Billing/Finance email">
            <input type="text" placeholder="Reporting Email">
            <input type="text" placeholder="Address Line 1">
            <input type="text" placeholder="Address :Line 2">
            <input type="text" placeholder="City">
            <input type="text" placeholder="State / Province">
            <input type="text" placeholder="Zip / Postal Code">
            <input type="text" placeholder="Country">
            
            <h6>Account Manager Contact Info:</h6>
            <input type="text" placeholder="AM first name">
            <input type="text" placeholder="AM last name">
            <input type="text" placeholder="AM email">
            <input type="text" placeholder="AM phone">
            <input type="text" placeholder="AM skype">
            <input type="text" placeholder="AM linkedin">

            <h6>Payment Methods:</h6>
            <input type="text" placeholder="Bank Account Details">
            <input type="text" placeholder="Payoneer">
            <input type="text" placeholder="Paypal">

            <h5>Document Download:</h5>
            <input type="text" placeholder="Documents (file name, file format - pdf or jpg, max file size-5mb)">
        </div>
    </div>
@endsection







