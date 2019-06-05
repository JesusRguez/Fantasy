<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>STIMEY - Fantasy Project</title>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
  <script src="{{ asset ('jquery/jquery.min.js') }}"></script>
  <script src="{{ asset ('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('jquery/jquery-ui.min.js') }}"></script>
  <script src="{{ asset ('jquery/jquery.ui.touch-punch.min.js') }}"></script>
  <script src="{{ asset ('/jquery/jscolor.js') }}"></script>

  <link href="{{ asset ('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('jquery/jquery-ui css/jquery-ui.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('jquery/jquery-ui css/jquery-ui.structure.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('jquery/jquery-ui css/jquery-ui.theme.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <meta name="csrf-token" content="{{ csrf_token() }}">



  <!-- Bootstrap core CSS -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- NUESTROS CSS -->
  <link href="{{ asset ('css/modern-business.css') }}" rel="stylesheet">
  <link href="{{ asset ('css/stimey.css') }}" rel="stylesheet">

  <link href="{{ asset ('css/modal.css') }}" rel="stylesheet">

  <link href="{{ asset ('css/modales.css') }}" rel="stylesheet">



  <!-- Quill -->
  <script src="{{asset ('quill/quill.js')}}"></script>
  <script src="{{asset ('quill/quill.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset ('quill/quill.snow.css')}}">

  <!-- Katex -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.10.1/dist/katex.min.css" integrity="sha384-dbVIfZGuN1Yq7/1Ocstc1lUEm+AT+/rCkibIcC/OmWo5f0EA48Vf8CytHzGrSwbQ" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/katex@0.10.1/dist/katex.min.js" integrity="sha384-2BKqo+exmr9su6dir+qCw08N2ZKRucY4PrGQPPWU1A7FtlCGjmEGFqXCv5nyM5Ij" crossorigin="anonymous"></script>

  <!-- HightLight -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/default.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- Resizeable and draggable  -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  

</head>
