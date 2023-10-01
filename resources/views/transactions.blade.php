

<title>Deposit - NiceAdmin Bootstrap Template</title>
</head>

<body>

    @extends('layouts.main')
    @section('main-container')
 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
              
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">fee</th>
                    <th scope="col">Time </th>
                  </tr>
                </thead>                            
      
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $transaction->id }}</th>
                        <td>{{ $transaction->transaction_type }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->fee }}</td>
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                    @endforeach
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection


   
    {{-- @if (session("status") == "logged_in")
    <h1>Welcome {{ session('user_id') }}</h1>
    <h1>Welcome {{ session('name') }}</h1>
    <h1>Welcome {{ session('email') }}</h1>
    <h1>Welcome {{ session('balance') }}</h1>
    <h1>Welcome {{ session('account_type') }}</h1>
    <h1>Welcome {{ session('created_at') }}</h1> 
    @endif --}}


       
        
        
    

