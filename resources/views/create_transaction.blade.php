<title> Creat Transection - NiceAdmin Bootstrap Template</title>
</head>

<body>

    @extends('layouts.main')
    @section('main-container')
    

 

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Blank Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-4">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Example Card</h5>
              <p> Name: {{ session('name') }} </p>
                <p>Current Balance: {{session('balance')}}</p>
            </div>
          </div>

        </div>

        <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"> Create Transaction Form</h5>

                    <!-- General Form Elements -->
                    <form action="{{ route('process_transaction') }}" method="post">
                      @csrf
                      <div class="row mb-3">
                          <label for="inputText" class="col-sm-4 col-form-label">User ID: </label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control" name="user_id" value="{{ session('user_id') }}">
                          </div>
                      </div>
                      <fieldset class="row mb-3">
                          <legend class="col-form-label col-sm-4 pt-0">Transaction Type:</legend>
                          <div class="col-sm-8">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" id="gridRadios1" name="transaction_type" value="deposit" required >
                                  <label class="form-check-label" for="gridRadios1">
                                      Deposit
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" id="gridRadios2" name="transaction_type" value="withdrawal" required>
                                  <label class="form-check-label" for="gridRadios2">
                                      Withdrawal
                                  </label>
                              </div>
                          </div>
                      </fieldset>
                      <div class="row mb-3">
                          <label for="amountInput" class="col-sm-4 col-form-label">Amount: </label>
                          <div class="col-sm-8">
                              <input type="number" id="amountInput" name="amount" class="form-control" required>
                          </div>
                      </div>
                     

                      <div class="row mb-3">
                          <label for="feeInput" id="feeLabel" class="col-sm-4 col-form-label">Fee: </label>
                          <div class="col-sm-8">
                              <input type="number" id="feeInput" name="fee" value="0.00" class="form-control" required>
                          </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Reference: </label>
                        <div class="col-sm-8">
                            <input type="text" name="ref" id="ref" class="form-control" required>
                        </div>
                    </div>
                      <hr />                      
                      <div class="row mb-3">
                          <div class="col-sm-12 d-flex justify-content-end">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                  </form><!-- End General Form Elements -->
      
                  </div>
                </div>
                

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const amountInput = document.getElementById('amountInput');
        const feeLabel = document.getElementById('feeLabel');
        const feeInput = document.getElementById('feeInput');

        amountInput.addEventListener('input', function() {
            const amount = parseFloat(this.value);
            if (!isNaN(amount) && document.querySelector('input[name="transaction_type"]:checked').value === 'withdrawal') {
                const withdrawalFee = amount * 0.015;
                feeInput.value = withdrawalFee.toFixed(2);
                feeLabel.style.display = 'block';
            } else {
                feeLabel.style.display = 'none';
            }
        });

        document.querySelectorAll('input[name="transaction_type"]').forEach(function(element) {
            element.addEventListener('change', function() {
                if (this.value === 'withdrawal') {
                    feeLabel.style.display = 'block';
                    feeInput.style.display = 'block';
                } else {
                    feeLabel.style.display = 'none';
                    feeInput.style.display = 'none';
                }
            });
        });

        if (document.querySelector('input[name="transaction_type"]:checked').value === 'deposit') {
            feeInput.value = '0.00';
        }

        document.getElementById('date2').value = new Date().toISOString().slice(0, 19).replace("T", " ");
    });
</script>

  @endsection