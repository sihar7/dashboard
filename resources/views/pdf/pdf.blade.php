<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 PDF File Download using JQuery Ajax Request Example</title>
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>


         @page {
           margin-top: 0;
           margin-bottom: 0;
         }
      *,
        ::after,
        ::before {
            box-sizing: border-box
        }

        html {
            font-family: sans-serif;
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent
        }


        body {
            margin: 0;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;

        }


        html {
            scroll-behavior: smooth
        }

        .wrapper,
        body,
        html {
            min-height: 100%,
        }

        .wrapper {
            position: relative
        }

        .wrapper .content-wrapper {
            min-height: calc(100vh - calc(3.5rem + 1px) - calc(3.5rem + 1px))
        }

        .layout-boxed .wrapper {
            box-shadow: 0 0 10 rgba(0, 0, 0, .3)
        }

        .layout-boxed .wrapper,
        .layout-boxed .wrapper::before {
            margin: 0 auto;
            max-width: 1250px
        }


        .container-fluid {
            width: 100%;
            padding-right: 7.5px;
            padding-left: 7.5px;
            margin-right: auto;
            margin-left: auto
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px
        }

        .col-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }


        @media print {

            .main-header,
            .no-print {
                display: none !important
            }

            .content-wrapper,
            .main-footer {
                -webkit-transform: translate(0, 0);
                transform: translate(0, 0);
                margin-left: 0 !important;
                min-height: 0 !important
            }

            .layout-fixed .content-wrapper {
                padding-top: 0 !important
            }

            .invoice {
                border: 0;
                margin: 0;
                padding: 0;
                width: 100%
            }

            .invoice-col {
                float: left;
                width: 33.3333333%
            }

            .table-responsive {
                overflow: auto
            }

            .table-responsive>.table tr td,
            .table-responsive>.table tr th {
                white-space: normal !important
            }
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .05)
        }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, .075)
        }

        .lead {
            font-size: 1.25rem;
            font-weight: 300
        }

        img {
            vertical-align: middle;
            border-style: none
        }


        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent
        }

        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6
        }

        .table-sm td,
        .table-sm th {
            padding: .3rem
        }


        .col-2 {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%
        }

        .col-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .col-sm-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .contentC:last-child {
             page-break-after: auto;
        }
  </style>
</head>
<body>
    <section class="content">
      <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3" id="contentC">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info" style="height: 20%">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice" style="margin-left: auto; margin-right: auto;" >
                  To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="float: right;">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive" style="position: relative; max-width:100% margin: auto; ">
                  <table class="table table-striped" >
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal A</th>
                      <th>Subtotal ABCD</th>
                      <th>Subtotal EFGH</th>
                      <th>Subtotal IJKL</th>
                      <th>Subtotal MNKOP</th>
                      <th>Subtotal LOOOO</th>
                      <th>Subtotal APPPL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Call of Duty</td>
                      <td>455-981-221</td>
                      <td>El snort testosterone trophy driving gloves handsome</td>
                      <td>$64.50</td>
                      <td>$64.50</td>
                      <td>$64.50</td>
                      <td>$64.50</td>
                      <td>$64.50</td>
                      <td>$64.50</td>
                      <td>$64.50</td>
                      
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Need for Speed IV</td>
                      <td>247-925-726</td>
                      <td>Wes Anderson umami biodiesel</td>
                      <td>$50.00</td>
                      <td>$50.00</td>
                      <td>$50.00</td>
                      <td>$50.00</td>
                      <td>$50.00</td>
                      <td>$50.00</td>
                      <td>$50.00</td>
                        
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Monsters DVD</td>
                      <td>735-845-642</td>
                      <td>Terry Richardson helvetica tousled street art master</td>
                      <td>$10.70</td>
                      <td>$10.70</td>
                      <td>$10.70</td>
                      <td>$10.70</td>
                      <td>$10.70</td>
                      <td>$10.70</td>
                      <td>$10.70</td>
                      
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Grown Ups Blue Ray</td>
                      <td>422-568-642</td>
                      <td>Tousled lomo letterpress</td>
                      <td>$25.99</td>
                      <td>$25.99</td>
                      <td>$25.99</td>
                      <td>$25.99</td>
                      <td>$25.99</td>
                      <td>$25.99</td>
                      <td>$25.99</td>
                        
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <div class="container">
                <div class="col-6" style="float: left;">
                  <p class="lead">Payment Methods:</p>
                 <img src="https://logos-download.com/wp-content/uploads/2016/06/Mandiri_logo.png" alt="Mandiri" width="102" height="42">
                      <img src="https://us.123rf.com/450wm/putracetol/putracetol1808/putracetol180801763/106806143-money-logo-icon-design.jpg?ver=6" alt="Cash" width="70" height="70" style="bottom: 20px">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 8px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6" style="float: right;">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>
</html>


