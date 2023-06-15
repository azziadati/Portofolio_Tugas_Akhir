<?php
$cl = (object) array('product_id' => '');
if (!auth()->check() || !auth()->user() || auth()->user()->status != 'active') {
    echo "<script>alert('Please login to access the system!');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/login'; }, 1000);</script>";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zii Accessories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .adjustment {
            display: flex;
            align-items: flex-start;
        }

        .background {
            position: fixed;
            background-size: cover;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background-image: url('https://images7.alphacoders.com/383/383325.jpg');
            filter: blur(5px);
        }

        .card-border {
            border-style: solid;
            flex-wrap: wrap;
            justify-content: center;
            width: fit-content;
            block-size: fit-content;
            margin-top: 30px;
            margin-bottom: 30px;
            margin-right: auto;
            margin-left: auto;
        }

        .card {
            display: inline-block;
            margin: 10px;

        }

        .hr1 {
            padding: 0;
            margin: 0;
        }

        footer {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .h1-footer {
            color: rgb(152, 255, 200);
            text-align: center;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .text-muted {
            text-align: center;
            color: white;
        }

        img.sosimg {
            height: 20px;
            width: 20px;
            margin-right: 2px;
        }

        .Cart-Container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px auto;
            width: 70%;
            height: 85%;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0px 25px 40px #1687d933;

        }

        #scrollToTopBtn,
        #scrollToBottomBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            width: 40px;
            height: 40px;
            border: none;
            outline: none;
            background-color: #555;
            color: #fff;
            cursor: pointer;
            border-radius: 50%;
            padding: 0;
        }

        #scrollToTopBtn svg,
        #scrollToBottomBtn svg {
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }

        #scrollToTopBtn:hover,
        #scrollToBottomBtn:hover {
            background-color: #777;
        }
    </style>

</head>

<body>
    @php
    $cart = App\Models\Cart::all();
    @endphp
    <div class="background"></div>
    <button onclick="scrollToTop()" id="scrollToTopBtn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
            <path d="M12 2L2 12h5v8h10v-8h5L12 2z" />
        </svg>
    </button>
    <button onclick="scrollToBottom()" id="scrollToBottomBtn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
            <path d="M12 22L22 12h-5V4H7v8H2l10 10z" />
        </svg>
    </button>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <nav class="navbar bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('landing')}}">
                        <img src="{{ URL::asset('https://marketplace.canva.com/EAEzOw_ovvE/1/0/1600w/canva-watercolor-food-logo-0GcpZ9_7Xls.jpg') }}" alt="" width="60" height="55" style="border-radius: 50%;">
                    </a>
                </div>
            </nav>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center text-lg-start">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.index')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('cart.index')}}">Category</a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn nav-link dropdown-toggle" type="button"
                         data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-sun-fill theme-icon-active" 
                            data-theme-icon-active="bi-sun-fill"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li>
                            <button class="dropdown-item d-flex align-items-center" type="button"
                            data-bs-theme-value="light" >
                               <i class="bi bi-sun-fill me-2 opacity-50" data-theme-icon="bi-sun-fill"></i>
                               Light
                           </button>
                          </li>
                          <li>
                            <button class="dropdown-item d-flex align-items-center" type="button"
                            data-bs-theme-value="dark" >
                               <i class="bi bi-moon-stars me-2 opacity-50" data-theme-icon="bi bi-moon-stars"></i>
                               Dark
                           </button>
                          </li>
                          <li>
                            <button class="dropdown-item d-flex align-items-center" type="button"
                            data-bs-theme-value="light" >
                               <i class="bi bi-circle-half me-2 opacity-50" data-theme-icon="bi bi-circle-half1"></i>
                               Auto
                           </button>
                
                        </ul>
                      </div>
                </li>
                </ul>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a href="{{ route('product.show')}}">
                        <i class="fa fa-shopping-cart" style="font-size:36px"></i>
                    </a>
                    &nbsp; &nbsp;
                    <div class="dropdown ml-auto" style="margin-left: auto;">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ URL::asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZzoDeEjIOxYT2dL6zhz9J0RH-T_sNpeucjSd10omQQMSQYjUD5z9vHKjH03Vj1I4Nxwk&usqp=CAU') }}" alt="" width="60" height="55" style="border-radius: 50%;">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right position-relative" aria-labelledby="dropdownMenuButton">
                            @if (auth()->check())
                            <a class="dropdown-item" href="">Hello <b>{{ auth()->user()->username }}</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </nav>


    <div class="Cart-Container">
        <div class="Cart-content" style="display:inline-block;">
            <div class="card-border">
                <?php $total = 0; ?>

                @foreach($cart->where('user_id', auth()->user()->id) as $cl)
                <div class="card" style="width: 18rem;">
                    <img src="{{ URL::asset('images/logo.png'.$cl->product_image) }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cl->product_name }}</h5>
                        <p class="card-text">Rp {{ number_format($cl->product_price, 0, ',', '.') }}.00</p>
                        <p class="card-text">Quantity:
                            <button class="btn btn-sm btn-primary increment-btn" data-product-id="{{$cl->product_id}}">+</button>
                            <span class="quantity">{{$cl->quantity}}</span>
                            <button class="btn btn-sm btn-danger decrement-btn" data-product-id="{{$cl->product_id}}">-</button>
                        </p>

                        <a href="#" class="btn btn-danger delete" data-id="{{ $cl->product_id }} ">Remove</a>
                        <form id="delete-form-{{$cl->product_id}}" action="{{ route('product.destroy', $cl->product_id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                    <?php $total += $cl->product_price * $cl->quantity; ?>
                </div>
                @if(($loop->iteration % 3) == 0)
                <div style="flex-basis: 100%;"></div>
                @endif
                @endforeach
            </div>
            <hr style="background-color:rgb(0,0,0); height:20px;">
            <?php $tax = $total * 0.1; ?>
            <div class="total">
                <h3>Tax&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;= Rp {{ number_format($tax, 0, ',', '.') }}.00</h3>
                <br>
                <?php $total += $tax; ?>
                <h2>Total&nbsp;= Rp {{ number_format($total, 0, ',', '.') }}.00</h2>
                <form action="{{ route('paymentProductCart') }}" method="POST" id="payment-form">
                    @csrf
                    <button type="submit" class="btn btn-success mb-3 Payment">Pay</button>
                </form>
            </div>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {
        $('.increment-btn').click(function(e) {
            e.preventDefault();

            var productId = $(this).data('product-id');
            var quantityElement = $(this).siblings('.quantity');

            $.ajax({
                type: 'POST',
                url: "{{ route('incrementProductCart') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    increment: 1
                },
                success: function(data) {
                    quantityElement.text(data.quantity);
                    location.reload();
                },
                error: function(data) {
                    alert('Error: ' + data.responseJSON.error);
                }
            });
        });

        $('.decrement-btn').click(function(e) {
            e.preventDefault();

            var productId = $(this).data('product-id');
            var quantityElement = $(this).siblings('.quantity');

            $.ajax({
                type: 'POST',
                url: "{{ route('decrementProductCart') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    decrement: 1
                },
                success: function(data) {
                    quantityElement.text(data.quantity);
                    location.reload();
                },
                error: function(data) {
                    alert('Error: ' + data.responseJSON.error);
                }
            });
        });
    });
</script>
<script>
    $('.Payment').click(function(e) {
        e.preventDefault();

        var total = <?php echo $total ?>;
        var formattedTotal = total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

        swal({
                title: "Confirmation",
                text: "Total amount to be paid: " + formattedTotal,
                icon: "info",
                buttons: ["Cancel", "Pay"],
                closeOnClickOutside: false,
                closeOnEsc: false,
            })
            .then((willPay) => {
                if (willPay) {
                    $('#payment-form').submit();
                } else {
                    swal("Payment cancelled!");
                }
            });
    });
</script>

<script>
    $('.delete').click(function() {
        var catId = $(this).data('id');
        swal({
                title: "Delete Data?",
                text: "Delete data " + catId + "?\n" + "Once it's deleted, you won't be able to recover this data anymore",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
                closeOnEsc: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $('#delete-form-' + catId).submit();
                } else {
                    swal("Data deletion cancelled!");
                }
            });
    });
    (() => {
  'use strict'

  const storedTheme = localStorage.getItem('theme')

  const getPreferredTheme = () => {
    if (storedTheme) {
      return storedTheme
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  const setTheme = function (theme) {
    if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.documentElement.setAttribute('data-bs-theme', 'dark')
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }
  }

  setTheme(getPreferredTheme())

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector('#bd-theme')

    if (!themeSwitcher) {
      return
    }

    const themeSwitcherText = document.querySelector('#bd-theme-text')
    const activeThemeIcon = document.querySelector('.theme-icon-active use')
    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
    const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href')

    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
      element.classList.remove('active')
      element.setAttribute('aria-pressed', 'false')
    })

    btnToActive.classList.add('active')
    btnToActive.setAttribute('aria-pressed', 'true')
    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
    themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

    if (focus) {
      themeSwitcher.focus()
    }
  }

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    if (storedTheme !== 'light' || storedTheme !== 'dark') {
      setTheme(getPreferredTheme())
    }
  })

  window.addEventListener('DOMContentLoaded', () => {
    showActiveTheme(getPreferredTheme())

    document.querySelectorAll('[data-bs-theme-value]')
      .forEach(toggle => {
        toggle.addEventListener('click', () => {
          const theme = toggle.getAttribute('data-bs-theme-value')
          localStorage.setItem('theme', theme)
          setTheme(theme)
          showActiveTheme(theme, true)
        })
      })
  })
})()
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script>
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scrollToTopBtn").style.display = "block";
        } else {
            document.getElementById("scrollToTopBtn").style.display = "none";
        }

        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            document.getElementById("scrollToBottomBtn").style.display = "none";
        } else {
            document.getElementById("scrollToBottomBtn").style.display = "block";
        }
    }

    function scrollToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    function scrollToBottom() {
        window.scrollTo(0, document.body.scrollHeight);
    }
</script>

</html>