@extends('layouts.auth')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"> Payment result</div>

                <div class="card-body">
                    @if ($success)
                    <div class="container" style="margin-top: 40px;">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">BoolBnB S.r.l.</div>
                            <div class="col-md-6 col-xs-6" style="text-align: right;">{{\Carbon\Carbon::parse($data['date'])->setTimezone('Europe/Rome')->format('d M Y, H:m:s') }}</div>
                        </div>
                    </div>

                    <div class="container" style="margin-top: 60px;">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <img style="width: 100px;height: 100px;" src="/images/boolbnb-logo.png" alt="" />
                            </div>
                        </div>
                    </div>

                    <div class="container" style="margin-top: 60px;">
                        <div class="row">
                            <div style="text-align: center; font-size: 30px; font-weight: 300; letter-spacing: 3;"> TRANSACTION RECEIPT </div>
                            <div style="text-align: center; font-size: 16px; font-weight: 500; letter-spacing: 1;"> Transaction Type </div>
                        </div>
                    </div>

                    <div class="container" style="margin-top: 60px;">
                        <div class="row">
                            <div class="title-section" style="font-size: 16px; letter-spacing: 1; border-bottom: 2px #666666 solid; padding-bottom: 10px;"> RECEPIENT DETAILS </div>
                            <table style="width: 100%; margin-top: 20px;">
                                <thead style="letter-spacing: 1; font-weight: 300;">
                                    <tr>
                                        <td style="padding: 10px 0;"> NAME </td>
                                        
                                        <td style="text-align: right;"> APARTMENT NAME </td>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 22px;">
                                    <tr>
                                        <td> {{ $data['name'] }} </td>
                                        
                                        <td style="text-align: right;"> {{ $data['apartment_id'] }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container" style="margin-top: 60px;">
                        <div class="row">
                            <div class="title-section" style="font-size: 16px; letter-spacing: 1; border-bottom: 2px #666666 solid; padding-bottom: 10px;"> TRANSACTION DETAILS </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6 col-xs-6">
                                    <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> START DATE & HOUR </div>
                                    <div style="font-size: 22px; "> {{\Carbon\Carbon::parse($data['date'])->setTimezone('Europe/Rome')->format('d M Y, H:m:s') }} </div>
                                </div>
                                <div class="col-md-6 col-xs-6" style="text-align: right;">
                                    <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> END DATE & HOUR </div>
                                    <div style="font-size: 22px;"> {{\Carbon\Carbon::parse($data['expires'])->setTimezone('Europe/Rome')->format('d M Y, H:m:s')  }} </div>
                                </div>
                               
                            </div>
                            <hr style="border-top: 1px solid #666666;">
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6 col-xs-6">
                                    <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> TRANSACTION AMOUNT </div>
                                    <div style="font-size: 22px;"> {{ $data['amount'] }} € </div>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #666666;">
                        </div>
                    </div>

                    
                    </div>
                   
                    @else
                    <div class="row">
                        <div class="col-12 px-4">
                    <h3>Payment failed</h3>
                    <p>There was a problem processing your payment. Please try again later.</p>
                    @endif
                </div>
                    <div class="col-12 text-center">
                        <a href="{{ route('admin.apartments.index')}}" class="btn btn-home">Torna alla Home</a>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .btn-home{
        background-color: var(--custom-green);
        margin: 30px; 
    }
</style>

@endsection


